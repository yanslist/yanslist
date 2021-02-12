<?php

namespace App\Transformers;

use App\Models\Region;
use League\Fractal\TransformerAbstract;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        $name = (LaravelLocalization::getCurrentLocale() == 'my') ? $model->name_mm : $model->name;
        return [
            'id' => (int) $model->id,
            'name' => (string) $name
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
