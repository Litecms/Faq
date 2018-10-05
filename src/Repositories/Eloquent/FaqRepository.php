<?php

namespace Litecms\Faq\Repositories\Eloquent;

use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class FaqRepository extends BaseRepository implements FaqRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.faq.faq.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.faq.faq.model.model');
    }
}
