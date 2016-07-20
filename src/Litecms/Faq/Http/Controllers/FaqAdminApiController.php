<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Faq\Http\Requests\FaqAdminApiRequest;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litecms\Faq\Models\Faq;

/**
 * Admin API controller class.
 */
class FaqAdminApiController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'admin.api';
    /**
     * Initialize faq controller.
     *
     * @param type FaqRepositoryInterface $faq
     *
     * @return type
     */

    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->middleware('api');
        $this->middleware('jwt.auth:admin.api');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        $this->repository = $faq;
        parent::__construct();
    }

    /**
     * Display a list of faq.
     *
     * @return json
     */
    public function index(FaqAdminApiRequest $request)
    {
        $faqs  = $this->repository
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
    public function show(FaqAdminApiRequest $request, Faq $faq)
    {
        $faq         = $faq->presenter();
        $faq['code'] = 2001;
        return response()->json($faq)
                         ->setStatusCode(200, 'SHOW_SUCCESS');;

    }

    /**
     * Show the form for creating a new faq.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(FaqAdminApiRequest $request, Faq $faq)
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
    public function store(FaqAdminApiRequest $request)
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
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
;
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
    public function edit(FaqAdminApiRequest $request, Faq $faq)
    {
        $faq         = $faq->presenter();
        $faq['code'] = 2003;
        return response()-> json($faq)
                        ->setStatusCode(200, 'EDIT_SUCCESS');;
    }

    /**
     * Update the faq.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return json
     */
    public function update(FaqAdminApiRequest $request, Faq $faq)
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
    public function destroy(FaqAdminApiRequest $request, Faq $faq)
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
