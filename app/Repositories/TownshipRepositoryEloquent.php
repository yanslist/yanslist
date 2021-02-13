<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TownshipRepository;
use App\Models\Township;
use App\Validators\TownshipValidator;

/**
 * Class TownshipRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TownshipRepositoryEloquent extends BaseRepository implements TownshipRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Township::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
