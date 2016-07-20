<?php

namespace Litecms\Faq\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class FaqItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FaqItemTransformer();
    }
}