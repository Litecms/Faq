<?php

namespace Litecms\Faq\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class FaqPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FaqTransformer();
    }
}