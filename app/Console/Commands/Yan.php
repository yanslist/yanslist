<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Yan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for development purpose';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $posts = Post::all();
//        foreach ($posts as $post) {
//            do {
//                $unique_code = makeToken(3);
//            } while (Post::where('qrcode', $unique_code.'.png')->first());
//            $url = route('view', ['post' => $post]);
//            $post->qrcode = saveQrcode($url, $unique_code);
//            $post->short_url = shortenUrl($url, $unique_code);
//            $post->save();
//        }
//        $this->info('Generating qrcode and short url finished');
        return 0;
    }
}
