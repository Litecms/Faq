<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Faq\Http\Requests\FaqAdminRequest;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litecms\Faq\Models\Faq;

/**
 * Admin web controller class.
 */
class FaqAdminController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    public $guard = 'admin.web';

    
    /**
     * Initialize faq controller.
     *
     * @param type FaqRepositoryInterface $faq
     *
     * @return type
     */
    public $home = 'admin';

    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->middleware('web');
        $this->middleware('auth:admin.web');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
         $this->repository = $faq;
        parent::__construct();
    }

    /**
     * Display a list of faq.
     *
     * @return Response
     */
    public function index(FaqAdminRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        if ($request->wantsJson()) {
            $faqs = $this->repository
                ->setPresenter('\\Litecms\\Faq\\Repositories\\Presenter\\FaqListPresenter')
                ->scopeQuery(function ($query) {
                    return $query->orderBy('question');
                })->paginate($pageLimit);

            $faqs['recordsTotal'] = $faqs['meta']['pagination']['total'];
            $faqs['recordsFiltered'] = $faqs['meta']['pagination']['total'];
            $faqs['request'] = $request->all();
            return response()->json($faqs, 200);

        }

        $this->theme->prependTitle(trans('faq::faq.names') . ' :: ');
        return $this->theme->of('faq::admin.faq.index')->render();
    }

    /**
     * Display faq.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return Response
     */
    public function show(FaqAdminRequest $request, Faq $faq)
    {

        if (!$faq->exists) {
            return response()->view('faq::admin.faq.new', compact('faq'));
        }

        Form::populate($faq);
        return response()->view('faq::admin.faq.show', compact('faq'));
    }

    /**
     * Show the form for creating a new faq.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(FaqAdminRequest $request)
    {

        $faq = $this->repository->newInstance([]);

        Form::populate($faq);

        return response()->view('faq::admin.faq.create', compact('faq'));

    }

    /**
     * Create new faq.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FaqAdminRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id('admin.web');
            $faq = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('faq::faq.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/faq/faq/' . $faq->getRouteKey()),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
        }

    }

    /**
     * Show faq for editing.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return Response
     */
    public function edit(FaqAdminRequest $request, Faq $faq)
    {
        Form::populate($faq);
        return response()->view('faq::admin.faq.edit', compact('faq'));
    }

    /**
     * Update the faq.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return Response
     */
    public function update(FaqAdminRequest $request, Faq $faq)
    {
        try {

            $attributes = $request->all();

            $faq->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('faq::faq.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/faq/faq/' . $faq->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/faq/faq/' . $faq->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Remove the faq.
     *
     * @param Model   $faq
     *
     * @return Response
     */
    public function destroy(FaqAdminRequest $request, Faq $faq)
    {

        try {

            $t = $faq->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('faq::faq.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/faq/faq/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/faq/faq/' . $faq->getRouteKey()),
            ], 400);
        }

    }

}
