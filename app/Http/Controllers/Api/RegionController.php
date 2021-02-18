<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Presenters\RegionPresenter;
use App\Repositories\RegionRepository;

/**
 * Class RegionController.
 *
 * @package namespace App\Http\Controllers\Api;
 */
class RegionController extends Controller
{
    /**
     * @var RegionRepository
     */
    protected $repository;

    /**
     * RegionController constructor.
     *
     * @param  RegionRepository  $repository
     */
    public function __construct(RegionRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->setPresenter(new RegionPresenter());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $regions = $this->repository->all();
        return response()->json($regions);
    }
}
