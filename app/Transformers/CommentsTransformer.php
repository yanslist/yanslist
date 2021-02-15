<?php

namespace App\Transformers;

use App\Models\Comments;
use League\Fractal\TransformerAbstract;

/**
 * Class CommentsTransformer.
 *
 * @package namespace App\Transformers;
 */
class CommentsTransformer extends TransformerAbstract
{
    /**
     * Transform the Comments entity.
     *
     * @param  \App\Models\Comments  $model
     *
     * @return array
     */
    public function transform(Comments $model)
    {
        return [
            'id' => (int) $model->id,
            'text' => (string) $model->text,
            'contact' => (string) $model->contact,
            'op_like' => (boolean) $model->op_like,
            'created_at' => $model->created_at,
        ];
    }
}
