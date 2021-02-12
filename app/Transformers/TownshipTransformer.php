<?php

namespace App\Transformers;

use App\Models\Township;
use League\Fractal\TransformerAbstract;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class PostTransformer.
 *
 * @package namespace App\Transformers;
 */
class TownshipTransformer extends TransformerAbstract
{

    /**
     * Transform the Post entity.
     *
     * @param  Township  $model
     *
     * @return array
     */
    public function transform(Township $model): array
    {
        $name = (LaravelLocalization::getCurrentLocale() == 'my') ? $model->name_mm : $model->name;
        return [
            'id' => (int) $model->id,
            'name' => (string) $name,
        ];
    }
}
