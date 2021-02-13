<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostType;
use App\Presenters\PostPresenter;
use App\Presenters\RegionPresenter;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;

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
        ]);

        do {
            $bytes = random_bytes(4);
            $token = bin2hex($bytes);
        } while (Post::where('token', $token)->first());
        $inputs = $request->all();
        $inputs['token'] = $token;
        $inputs['user_id'] = 1;

        Post::create($inputs);

        return redirect()->route('home');
    }

    public function test()
    {
        $bytes = random_bytes(4);
        $token = bin2hex($bytes);
        $result = Post::where('token', '75331680')->first();
        dd(['token' => $token, 'result' => $result]);
    }
}
