<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use App\Models\Region;

/**
 * Class HomeController.
 *
 * @package namespace App\Http\Controllers;
 */
class HomeController extends Controller
{
    public function home()
    {
        $regions = Region::with('townships')->get();
        $post_types = PostType::choices();
        return view('index', compact('regions', 'post_types'));
    }

    public function test()
    {
        return 'test';
    }
}
