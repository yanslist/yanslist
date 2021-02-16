<?php

namespace App\Transformers;

use App\Models\Comment;
use League\Fractal\TransformerAbstract;

/**
 * Class CommentTransformer.
 *
 * @package namespace App\Transformers;
 */
class CommentTransformer extends TransformerAbstract
{
    /**
     * Transform the Comment entity.
     *
     * @param  \App\Models\Comment  $model
     *
     * @return array
     */
    public function transform(Comment $model)
    {
        return [
            'id' => (int) $model->id,
            'text' => (string) decrypt($model->text),
            'created_at' => $model->created_at,
        ];
    }
}
