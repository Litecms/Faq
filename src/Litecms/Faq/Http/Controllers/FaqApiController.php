<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litecms\Faq\Repositories\Presenter\FaqItemTransformer;

/**
 * Pubic API controller class.
 */
class FaqApiController extends BaseController
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
        $this->middleware('api');
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
            ->setPresenter('\\Litecms\\Faq\\Repositories\\Presenter\\FaqListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $faqs['code'] = 2000;
        return response()->json($faqs)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $faq = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($faq)) {
            $faq         = $this->itemPresenter($module, new FaqItemTransformer);
            $faq['code'] = 2001;
            return response()->json($faq)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
