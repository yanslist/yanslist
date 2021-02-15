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
            'location' => $model->location,
            'duration' => $model->duration,
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
