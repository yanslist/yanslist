<?php

namespace App\Transformers;

use App\Models\Township;
use League\Fractal\TransformerAbstract;

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
        return [
            'id' => (int) $model->id,
            'name' => (string) $model->localized_name,
        ];
    }
}
