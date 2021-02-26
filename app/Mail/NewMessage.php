<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The post instance.
     *
     * @var \App\Models\Post
     */
    protected $post;

    protected $msg;

    /**
     * Create a new message instance.
     *
     * @param  Post  $post
     * @param  String  $msg
     */
    public function __construct(Post $post, string $msg)
    {
        $this->post = $post;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-message')
            ->subject('New message for '.$this->post->title)
            ->with([
                'postTitle' => $this->post->title,
                'postUrl' => route('view', ['post' => $this->post]),
                'msg' => $this->msg,
            ]);
    }
}
