<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsCreateRequest;
use App\Http\Requests\CommentsUpdateRequest;
use App\Repositories\CommentsRepository;
use App\Validators\CommentsValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class CommentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CommentsController extends Controller
{
    /**
     * @var CommentsRepository
     */
    protected $repository;

    /**
     * @var CommentsValidator
     */
    protected $validator;

    /**
     * CommentsController constructor.
     *
     * @param  CommentsRepository  $repository
     * @param  CommentsValidator  $validator
     */
    public function __construct(CommentsRepository $repository, CommentsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $comments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comments,
            ]);
        }

        return view('comments.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CommentsCreateRequest  $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CommentsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $comment = $this->repository->create($request->all());

            $response = [
                'message' => 'Comments created.',
                'data' => $comment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comment,
            ]);
        }

        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = $this->repository->find($id);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CommentsUpdateRequest  $request
     * @param  string  $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CommentsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $comment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Comments updated.',
                'data' => $comment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Comments deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Comments deleted.');
    }
}
