<?php

namespace App\Http\Controllers;

use App\Models\ExpireOption;
use App\Models\Post;
use App\Models\PostType;
use App\Presenters\PostPresenter;
use App\Presenters\RegionPresenter;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;
use App\Transformers\PostTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

/**
 * Class HomeController.
 *
 * @package namespace App\Http\Controllers;
 */
class HomeController extends Controller
{
    protected $postRepo;

    protected $regionRepo;

    protected $postType;

    public function __construct(PostRepository $postRepo, RegionRepository $regionRepo, PostType $postType)
    {
        $this->postRepo = $postRepo;
        $this->regionRepo = $regionRepo;
        $this->postType = $postType;
    }

    public function home()
    {
        $this->regionRepo->setPresenter(new RegionPresenter());
        $regions = $this->regionRepo->all();
        $post_types = $this->postType->choices();

        $this->postRepo->setPresenter(new PostPresenter());
        $posts = $this->postRepo->orderBy('created_at', 'desc')->all();

        return inertia('Home/Index', compact('regions', 'post_types', 'posts'));
    }

    public function new()
    {
        $this->regionRepo->setPresenter(new RegionPresenter());
        $regions = $this->regionRepo->all();

        $post_types = $this->postType->choices();
        $default_post_type = $this->postType->defaultValue();

        $expire_options = ExpireOption::choices();
        $default_expire_option = ExpireOption::defaultValue();

        do {
            $token = makeToken();
        } while (Post::where('token', $token)->first());
        $token = (config('app.env') === 'local') ? 'password' : $token;

        return inertia(
            'Home/New',
            compact(
                'regions',
                'post_types',
                'default_post_type',
                'expire_options',
                'default_expire_option',
                'token'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'is_offer' => 'required',
            'title' => 'required',
            'body' => 'required',
            'region_id' => 'required',
            'township_id' => 'required',
            'token' => 'required',
            'recaptcha_token' => 'required'
        ]);

        if (config('app.env') === 'local') {
            $captcha_result = ['success' => true];
        } else {
            $captcha_result = $this->captcha($request->recaptcha_token);
        }

        if ($captcha_result['success']) {
            $inputs = $request->all();
            $inputs['token'] = Hash::make($inputs['token']);
            $inputs['user_id'] = 1;
            $inputs['expire_at'] = Carbon::now()->add($inputs['expire_at']);

            Post::create($inputs);

            $route = 'home';
            $flash = flashMsg('success', 'Successfully posted.');
        } else {
            $route = 'new';
            $flash = flashMsg('danger', 'Something wrong, please try again.');
        }

        return redirect()->route($route)->with($flash);
    }

    public function view(Post $post)
    {
        $post_types = $this->postType->choices();

        $this->postRepo->setPresenter(new PostPresenter());
        $postTransformer = new PostTransformer();
        $post = $postTransformer->transform($post);

        return inertia(
            'Home/View',
            compact(
                'post_types',
                'post'
            )
        );
    }

    /**
     * Submit recaptcha to google api.
     *
     * @param  String  $token
     * @return array|mixed
     */
    protected function captcha(string $token)
    {
        $response = Http::asForm()->post(config('services.recaptcha.domain'), [
            'secret' => config('services.recaptcha.secret'),
            'response' => $token,
        ]);

        return $response->json();
    }

}
