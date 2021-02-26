<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class TrySomething extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|int
     */
    public function __invoke(Request $request)
    {
        $message = Comment::findOrFail(5);
        return view('emails.new-message')
            ->with([
                'postTitle' => $message->post->title,
                'postUrl' => route('view', ['post' => $message->post]),
                'message' => decrypt($message->text),
            ]);
    }
}
