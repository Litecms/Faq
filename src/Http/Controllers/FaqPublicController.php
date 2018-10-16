<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;

class FaqPublicController extends BaseController
{
    // use FaqWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Faq\Interfaces\FaqRepositoryInterface $faq
     *
     * @return type
     */
    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->repository = $faq;
        parent::__construct();
    }

    /**
     * Show faq's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $faqs = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('faq::faq.names'))
            ->view('faq::faq.index')
            ->data(compact('faqs'))
            ->output();
    }

    /**
     * Show faq's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $faqs = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('faq::faq.names'))
            ->view('faq::faq.index')
            ->data(compact('faqs'))
            ->output();
    }

    /**
     * Show faq.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $faq = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->setMetaTitle($faq->name . trans('faq::faq.name'))
            ->view('faq::faq.show')
            ->data(compact('faq'))
            ->output();
    }



}