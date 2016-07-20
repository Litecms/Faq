<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Faq\Http\Requests\FaqUserApiRequest;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litecms\Faq\Models\Faq;

/**
 * User API controller class.
 */
class FaqUserApiController extends BaseController
{
/**
     * Initialize faq controller.
     *
     * @param type FaqRepositoryInterface $faq
     *
     * @return type
     */
    protected $guard = 'api';

    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->middleware('api');
        $this->middleware('jwt.auth:api');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
         $this->repository = $faq;
        parent::__construct();
    }

    /**
     * Display a list of faq.
     *
     * @return json
     */
    public function index(FaqUserApiRequest $request)
    {
        $faqs  = $this->repository
            ->pushCriteria(new \Lavalite\Faq\Repositories\Criteria\FaqUserCriteria())
            ->setPresenter('\\Litecms\\Faq\\Repositories\\Presenter\\FaqListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $faqs['code'] = 2000;
        return response()->json($faqs) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display faq.
     *
     * @param Request $request
     * @param Model   Faq
     *
     * @return Json
     */
    public function show(FaqUserApiRequest $request, Faq $faq)
    {

        if ($faq->exists) {
            $faq         = $faq->presenter();
            $faq['code'] = 2001;
            return response()->json($faq)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new faq.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(FaqUserApiRequest $request, Faq $faq)
    {
        $faq         = $faq->presenter();
        $faq['code'] = 2002;
        return response()->json($faq)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new faq.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(FaqUserApiRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $faq          = $this->repository->create($attributes);
            $faq          = $faq->presenter();
            $faq['code']  = 2004;

            return response()->json($faq)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show faq for editing.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return json
     */
    public function edit(FaqUserApiRequest $request, Faq $faq)
    {
        if ($faq->exists) {
            $faq         = $faq->presenter();
            $faq['code'] = 2003;
            return response()-> json($faq)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the faq.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return json
     */
    public function update(FaqUserApiRequest $request, Faq $faq)
    {
        try {

            $attributes = $request->all();

            $faq->update($attributes);
            $faq         = $faq->presenter();
            $faq['code'] = 2005;

            return response()->json($faq)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the faq.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return json
     */
    public function destroy(FaqUserApiRequest $request, Faq $faq)
    {

        try {

            $t = $faq->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('faq::faq.name')]),
                'code'     => 2006
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
