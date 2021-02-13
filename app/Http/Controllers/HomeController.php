<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use App\Presenters\PostPresenter;
use App\Presenters\RegionPresenter;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;

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
        return inertia('Home/New', compact('regions', 'post_types'));
    }

    public function test()
    {
        return 'test';
    }
}
