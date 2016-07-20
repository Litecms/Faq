<?php

namespace Litecms\Faq\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class FaqListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FaqListTransformer();
    }
}