<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostType;
use App\Presenters\PostPresenter;
use App\Presenters\RegionPresenter;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Class HomeController.
 *
 * @package namespace App\Http\Controllers;
 */
class HomeController extends Controller
{
    public function home()
    {
        $regionRepo = app(RegionRepository::class);
        $regionRepo->setPresenter(new RegionPresenter());
        $regions = $regionRepo->all();
        $post_types = PostType::choices();

        $postRepo = app(PostRepository::class);
        $postRepo->setPresenter(new PostPresenter());
        $posts = $postRepo->orderBy('created_at', 'desc')->all();
        return inertia('Home/Index', compact('regions', 'post_types', 'posts'));
    }

    public function new()
    {
        $regionRepo = app(RegionRepository::class);
        $regionRepo->setPresenter(new RegionPresenter());
        $regions = $regionRepo->all();
        $post_types = PostType::choices();

        $default_post_type = PostType::defaultValue();
        return inertia('Home/New', compact('regions', 'post_types', 'default_post_type'));
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
            'recaptcha_token' => 'required'
        ]);

        $captcha_result = $this->captcha($request->recaptcha_token);

        if ($captcha_result['success']) {
            do {
                $bytes = random_bytes(4);
                $token = bin2hex($bytes);
            } while (Post::where('token', $token)->first());
            $inputs = $request->all();
            $inputs['token'] = $token;
            $inputs['user_id'] = 1;

            Post::create($inputs);

            $route = 'home';
            $flash['type'] = 'success';
            $flash['message'] = 'Successfully posted.';
        } else {
            $route = 'new';
            $flash['type'] = 'danger';
            $flash['message'] = 'Something wrong. Please try again.';
        }

        return redirect()->route($route)->with($flash);
    }

    public function test()
    {
        $bytes = random_bytes(4);
        $token = bin2hex($bytes);
        $result = Post::where('token', '75331680')->first();
        dd(['token' => $token, 'result' => $result]);
    }

    /**
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
