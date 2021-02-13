<?php

namespace App\Presenters;

use App\Transformers\TownshipTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PostPresenter.
 *
 * @package namespace App\Presenters;
 */
class TownshipPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return TownshipTransformer
     */
    public function getTransformer(): TownshipTransformer
    {
        return new TownshipTransformer();
    }
}
