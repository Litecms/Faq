<?php

namespace Litecms\Faq\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CategoryListTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Faq\Models\Category $category)
    {
        return [
            'id'                => $category->getRouteKey(),
            'name'              => $category->name,
            'status'            => $category->status,
        ];
    }
}