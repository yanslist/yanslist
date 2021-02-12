<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use App\Presenters\PostPresenter;
use App\Presenters\RegionPresenter;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $regionRepo = app(RegionRepository::class);
        $region = $regionRepo->with('townships')->find(13);
        $township_ids = Arr::pluck($region->townships, 'id');
        dd($township_ids);
//        return 'test';
    }
}
