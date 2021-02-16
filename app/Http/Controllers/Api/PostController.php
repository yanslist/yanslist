<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Presenters\CommentPresenter;
use App\Presenters\PostPresenter;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function comments(Post $post): \Illuminate\Http\JsonResponse
    {
        $this->commentRepo->setPresenter(new CommentPresenter());
        $comments = $this->commentRepo->orderBy('created_at', 'desc')->findByField('post_id', $post->id);
        return response()->json($comments);
    }
}
