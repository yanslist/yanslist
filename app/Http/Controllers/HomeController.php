<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use App\Models\Region;
use App\Presenters\PostPresenter;
use App\Presenters\RegionPresenter;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;
use ElementaryFramework\FireFS\FireFS;
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
        $posts = $postRepo->all();
        return inertia('Home/Index', compact('regions', 'post_types', 'posts'));
    }

    public function search(Request $request)
    {
        dd($request->all());
    }

    public function new()
    {
        return inertia('Home/New');
    }

    public function test()
    {
        return 'test';
    }
}
