<?php

namespace App\Http\Controllers;

use App\Presenters\RegionPresenter;
use App\Repositories\RegionRepository;

/**
 * Class RegionsController.
 *
 * @package namespace App\Http\Controllers\Api;
 */
class RegionsController extends Controller
{
    /**
     * @var RegionRepository
     */
    protected $repository;

    /**
     * RegionsController constructor.
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
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $regions = $this->repository->all();
        return response()->json($regions);
    }
}
