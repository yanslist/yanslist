<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

/**
 * Class PostTransformer.
 *
 * @package namespace App\Transformers;
 */
class PostTransformer extends TransformerAbstract
{
//    protected $defaultIncludes = ['region'];

    /**
     * Transform the Post entity.
     *
     * @param  \App\Models\Post  $model
     *
     * @return array
     */
    public function transform(Post $model)
    {
        return [
            'type' => $model->type->value(),
            'is_offer' => $model->is_offer,
            'title' => $model->title,
            'slug' => $model->slug,
            'body' => $model->body,
            'region_id' => $model->region_id,
            'region' => $model->region,
            'township_id' => $model->township_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

//    public function includeRegion(Post $model)
//    {
//        if ($model->region) {
//            return $this->item($model->region, new RegionTransformer());
//        } else {
//            return null;
//        }
//    }
}
