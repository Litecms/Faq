<?php

namespace Litecms\Faq\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class FaqListTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Faq\Models\Faq $faq)
    {
        return [
            'id'          => $faq->getRouteKey(),
            'question'    => ucfirst($faq->question),
            'answer'      => ucfirst($faq->answer),
            'category_id' => ucfirst($faq->category['name']),
            'status'      => $faq->status,
        ];
    }
}
