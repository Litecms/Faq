<?php

namespace Litecms\Faq\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class FaqTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Faq\Models\Faq $faq)
    {
        return [
            'id'                => $faq->getRouteKey(), 
            'question'          => $faq->question,
            'answer'            => $faq->answer,
            'category_id'       => @$faq->category->name,
            'slug'              => $faq->slug,
            'status'            => $faq->status,
            'user_id'           => $faq->user_id,
            'user_type'         => $faq->user_type,
            'upload_folder'     => $faq->upload_folder,
            'deleted_at'        => $faq->deleted_at,
            'created_at'        => $faq->created_at,
            'updated_at'        => $faq->updated_at,
            'url'              => [
                'public' => trans_url('faq/'.$faq->getPublicKey()),
                'user'   => guard_url('faq/faq/'.$faq->getRouteKey()),
            ], 
            'status'            => trans('app.'.$faq->status),
            'created_at'        => format_date($faq->created_at),
            'updated_at'        => format_date($faq->updated_at),
        ];
    }
}