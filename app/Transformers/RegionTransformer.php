<?php

namespace App\Transformers;

use App\Models\Region;
use League\Fractal\TransformerAbstract;

/**
 * Class PostTransformer.
 *
 * @package namespace App\Transformers;
 */
class RegionTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['townships'];

    /**
     * Transform the Post entity.
     *
     * @param  Region  $model
     *
     * @return array
     */
    public function transform(Region $model): array
    {
        return [
            'id' => (int) $model->id,
            'name' => (string) $model->localized_name
        ];
    }

    public function includeTownships(Region $model)
    {
        if ($model->townships) {
            return $this->collection($model->townships, new TownshipTransformer());
        } else {
            return null;
        }
    }
}
