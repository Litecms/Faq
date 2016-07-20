<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Faq\Http\Requests\FaqUserRequest;
use Litecms\Faq\Interfaces\FaqRepositoryInterface;
use Litecms\Faq\Models\Faq;

class FaqUserController extends BaseController
{
    

     /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'web';

    /**
     * The home page route of user.
     *
     * @var string
     */
    protected $home = 'home';

    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->middleware('web');
        $this->middleware('auth:web');
        $this->middleware('auth.active:web');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
         $this->repository = $faq;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(FaqUserRequest $request)
    {
        $this->repository->pushCriteria(new \Litecms\Faq\Repositories\Criteria\FaqUserCriteria());
        $faqs = $this->repository->scopeQuery(function ($query) {
            return $query->orderBy('question');
        })->paginate();

        $this->theme->prependTitle(trans('faq::faq.names') . ' :: ');

        return $this->theme->of('faq::user.faq.index', compact('faqs'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Faq $faq
     *
     * @return Response
     */
    public function show(FaqUserRequest $request, Faq $faq)
    {
        Form::populate($faq);

        return $this->theme->of('faq::user.faq.show', compact('faq'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(FaqUserRequest $request)
    {

        $faq = $this->repository->newInstance([]);
        Form::populate($faq);

        return $this->theme->of('faq::user.faq.create', compact('faq'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(FaqUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $faq = $this->repository->create($attributes);

            return redirect(trans_url('/user/faq/faq'))
                ->with('message', trans('messages.success.created', ['Module' => trans('faq::faq.name')]))
                ->with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Faq $faq
     *
     * @return Response
     */
    public function edit(FaqUserRequest $request, Faq $faq)
    {

        Form::populate($faq);

        return $this->theme->of('faq::user.faq.edit', compact('faq'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Faq $faq
     *
     * @return Response
     */
    public function update(FaqUserRequest $request, Faq $faq)
    {
        try {
            $this->repository->update($request->all(), $faq->getRouteKey());

            return redirect(trans_url('/user/faq/faq'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('faq::faq.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(FaqUserRequest $request, Faq $faq)
    {
        try {
            $this->repository->delete($faq->getRouteKey());
            return redirect(trans_url('/user/faq/faq'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('faq::faq.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
