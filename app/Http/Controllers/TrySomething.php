<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TrySomething extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $encryptedValue = Crypt::encryptString('Hello world.');
//        dd($encryptedValue);
        $decrypted = Crypt::decryptString($encryptedValue);
        dd($decrypted);
    }
}
