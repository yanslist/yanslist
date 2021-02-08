<?php

namespace App\Http\Controllers;

use App\Models\PostType;

/**
 * Class HomeController.
 *
 * @package namespace App\Http\Controllers;
 */
class HomeController extends Controller
{
    public function test()
    {
        dd(PostType::defaultValue());
    }
}
