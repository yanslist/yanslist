<?php

namespace App\Http\Controllers;

use App\Models\ExpireOption;
use App\Models\Post;
use App\Models\PostType;
use App\Presenters\CommentPresenter;
use App\Presenters\PostPresenter;
use App\Presenters\RegionPresenter;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;
use App\Transformers\PostTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Jorenvh\Share\ShareFacade as Share;

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

    protected $commentRepo;

    public function __construct(
        PostRepository $postRepo,
        RegionRepository $regionRepo,
        PostType $postType,
        CommentRepository $commentRepo
    ) {
        $this->postRepo = $postRepo;
        $this->regionRepo = $regionRepo;
        $this->postType = $postType;
        $this->commentRepo = $commentRepo;
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

        return inertia(
            'Home/New',
            compact(
                'regions',
                'post_types',
                'default_post_type',
                'expire_options',
                'default_expire_option'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => ['required'],
            'is_offer' => ['boolean'],
            'region_id' => ['required'],
            'township_id' => ['required'],
            'title' => ['required', 'min:20', 'max:200'],
            'body' => ['required', 'min:20'],
            'email' => ['required', 'email'],
            'recaptcha_token' => ['required']
        ]);

        if (config('app.env') === 'local') {
            $captcha_result = ['success' => true];
        } else {
            $captcha_result = $this->captcha($request->recaptcha_token);
        }

        if ($captcha_result['success']) {
            $inputs = $request->all();
            $inputs['email'] = encrypt($inputs['email']);
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

        // assign comments first using Post Model object
        $this->commentRepo->setPresenter(new CommentPresenter());
        $comments = $this->commentRepo->orderBy('created_at', 'desc')->findByField('post_id', $post->id);

        // transform Post Model object
        $this->postRepo->setPresenter(new PostPresenter());
        $postTransformer = new PostTransformer();
        $post = $postTransformer->transform($post);

        $share_links = Share::currentPage()->facebook()
            ->twitter()
            ->getRawLinks();

        return inertia(
            'Home/View',
            compact(
                'post_types',
                'post',
                'comments',
                'share_links'
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
