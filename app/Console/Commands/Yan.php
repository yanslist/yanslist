<?php

namespace App\Console\Commands;

use App\Models\Post;
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
        $posts = Post::all();
        foreach ($posts as $post) {
            $qrfile = saveQrcode(route('view', ['post' => $post]));
            $post->qrcode = $qrfile;
            $post->save();
        }
        $this->info('Command finished');
        return 0;
    }
}
