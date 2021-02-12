<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use App\Models\Region;
use ElementaryFramework\FireFS\FireFS;

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
        return inertia('Home/Index', compact('regions', 'post_types'));
    }

    public function new()
    {
        return inertia('Home/New');
    }

    public function test()
    {
        $firefs = new FireFS();

        $path = '../resources/lang';

        $internalPath = $firefs->toInternalPath($path);
        dd($internalPath);

        if (!$this->isRemote($path) && !is_readable($internalPath)) {
            throw $this->accessDeniedException($path, 'read');
        }


    }
}
