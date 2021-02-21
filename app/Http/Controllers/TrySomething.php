<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $endpoint = config('services.polr.domain').'/api/v2/action/shorten';
        $response = Http::post($endpoint, [
            'key' => config('services.polr.key'),
            'url' => 'https://facebook.com',
        ]);
        dd($response->body());
    }
}
