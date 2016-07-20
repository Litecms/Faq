<?php

namespace Litecms\Faq\Repositories\Eloquent;

use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class FaqRepository extends BaseRepository implements FaqRepositoryInterface
{
    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('package.faq.faq.search');
        return config('package.faq.faq.model');
    }
}
