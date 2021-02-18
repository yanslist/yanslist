<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

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
        Mail::raw('sample message', function (Message $message) {
            $message->subject('New message for ');
            $message->to('ylt@mail.com');
        });
        return inertia('Home/Test');
    }
}
