<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Presenters\CommentPresenter;
use App\Presenters\PostPresenter;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegionController.
 *
 * @package namespace App\Http\Controllers\Api;
 */
class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $postRepo;

    /**
     * @var CommentRepository
     */
    protected $commentRepo;

    /**
     * RegionController constructor.
     *
     * @param  PostRepository  $postRepo
     * @param  CommentRepository  $commentRepo
     */
    public function __construct(PostRepository $postRepo, CommentRepository $commentRepo)
    {
        $this->postRepo = $postRepo;
        $this->postRepo->setPresenter(new PostPresenter());

        $this->commentRepo = $commentRepo;
    }

    /**
     * @param  Post  $post
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function comments(Post $post, Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'token' => 'required',
        ]);

        $result = false;

        if (Hash::check($request->token, $post->token)) {
            // token match
            $this->commentRepo->setPresenter(new CommentPresenter());
            $result = $this->commentRepo->orderBy('created_at', 'desc')->findByField('post_id', $post->id);
        }
        return response()->json($result);
    }
}
