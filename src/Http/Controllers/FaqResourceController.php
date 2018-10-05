<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Faq\Http\Requests\FaqRequest;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litecms\Faq\Models\Faq;

/**
 * Resource controller class for faq.
 */
class FaqResourceController extends BaseController
{

    /**
     * Initialize faq resource controller.
     *
     * @param type FaqRepositoryInterface $faq
     *
     * @return null
     */
    public function __construct(FaqRepositoryInterface $faq)
    {
        parent::__construct();
        $this->repository = $faq;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Faq\Repositories\Criteria\FaqResourceCriteria::class);
    }

    /**
     * Display a list of faq.
     *
     * @return Response
     */
    public function index(FaqRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Faq\Repositories\Presenter\FaqPresenter::class)
                ->$function();
        }

        $faqs = $this->repository->paginate();

        return $this->response->title(trans('faq::faq.names'))
            ->view('faq::faq.index', true)
            ->data(compact('faqs'))
            ->output();
    }

    /**
     * Display faq.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return Response
     */
    public function show(FaqRequest $request, Faq $faq)
    {

        if ($faq->exists) {
            $view = 'faq::faq.show';
        } else {
            $view = 'faq::faq.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('faq::faq.name'))
            ->data(compact('faq'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new faq.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(FaqRequest $request)
    {

        $faq = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('faq::faq.name')) 
            ->view('faq::faq.create', true) 
            ->data(compact('faq'))
            ->output();
    }

    /**
     * Create new faq.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FaqRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $faq                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('faq::faq.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('faq/faq/' . $faq->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/faq/faq'))
                ->redirect();
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
    public function edit(FaqRequest $request, Faq $faq)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('faq::faq.name'))
            ->view('faq::faq.edit', true)
            ->data(compact('faq'))
            ->output();
    }

    /**
     * Update the faq.
     *
     * @param Request $request
     * @param Model   $faq
     *
     * @return Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        try {
            $attributes = $request->all();

            $faq->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('faq::faq.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('faq/faq/' . $faq->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('faq/faq/' . $faq->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the faq.
     *
     * @param Model   $faq
     *
     * @return Response
     */
    public function destroy(FaqRequest $request, Faq $faq)
    {
        try {

            $faq->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('faq::faq.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('faq/faq/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('faq/faq/' . $faq->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple faq.
     *
     * @param Model   $faq
     *
     * @return Response
     */
    public function delete(FaqRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('faq::faq.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('faq/faq'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/faq/faq'))
                ->redirect();
        }

    }

    /**
     * Restore deleted faqs.
     *
     * @param Model   $faq
     *
     * @return Response
     */
    public function restore(FaqRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('faq::faq.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/faq/faq'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/faq/faq/'))
                ->redirect();
        }

    }

}
