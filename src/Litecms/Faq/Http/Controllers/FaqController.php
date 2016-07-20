<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;

class FaqController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Faq\Interfaces\FaqRepositoryInterface $faq
     *
     * @return type
     */
    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->middleware('web');
        $this->setupTheme(config('theme.themes.public.theme'), config('theme.themes.public.layout'));
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
        $this->repository->pushCriteria(new \Litecms\Faq\Repositories\Criteria\FaqPublicCriteria());
        $faqs = $this->repository->scopeQuery(function ($query) {
            return $query->orderBy('question');
        })->all();

        return $this->theme->of('faq::public.faq.index', compact('faqs'))->render();
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
        $faq = $this->repository->scopeQuery(function ($query) use ($slug) {
            return $query->orderBy('id', 'DESC')
                ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('faq::public.faq.show', compact('faq'))->render();
    }
}
