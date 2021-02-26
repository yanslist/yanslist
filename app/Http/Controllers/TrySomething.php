<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrySomething extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    public function __invoke(Request $request)
    {
        return 1;
    }
}
