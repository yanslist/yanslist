<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $file = '1.png';
        $qr = QrCode::size(300)
            ->gradient(29, 29, 80, 141, 131, 237, 'radial')
            ->format('png')
            ->generate('Hello Yan!', storage_path('app/public/qrcodes/'.$file));
//        return inertia('Home/Test');
    }
}
