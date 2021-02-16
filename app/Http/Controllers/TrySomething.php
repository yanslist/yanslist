<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrySomething extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Inertia\Response|\Inertia\ResponseFactory
     */
    public function __invoke(Request $request)
    {
        return inertia('Home/Test');
    }
}
