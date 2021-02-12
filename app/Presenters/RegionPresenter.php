<?php

namespace App\Presenters;

use App\Transformers\RegionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PostPresenter.
 *
 * @package namespace App\Presenters;
 */
class RegionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return RegionTransformer
     */
    public function getTransformer(): RegionTransformer
    {
        return new RegionTransformer();
    }
}
