<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Presenters\PostPresenter;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Transformers\CommentTransformer;
use Illuminate\Http\Request;

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
    public function comment(Post $post, Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        $result = $this->commentRepo->create(
            [
                'post_id' => $post->id,
                'text' => encrypt($request->text)
            ]
        );

        $commentTransformer = new CommentTransformer();
        $comment = $commentTransformer->transform($result);

        return response()->json($comment);
    }
}
