<?php

namespace App\Criteria;

use Carbon\Carbon;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ActivePostCriteria.
 *
 * @package namespace App\Criteria;
 */
class ActivePostCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param  string  $model
     * @param  RepositoryInterface  $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('expire_at', '>=', Carbon::now());
    }
}
