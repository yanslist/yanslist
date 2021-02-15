<?php

namespace App\Repositories;

use App\Models\Comments;
use App\Validators\CommentsValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CommentsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CommentsRepositoryEloquent extends BaseRepository implements CommentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comments::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
