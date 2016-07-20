<?php

namespace Litecms\Faq\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Faq\Http\Requests\CategoryUserRequest;
use Litecms\Faq\Interfaces\CategoryRepositoryInterface;
use Litecms\Faq\Models\Category;

class CategoryUserController extends BaseController
{
   

     /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'web';
/**
     * Initialize category controller.
     *
     * @param type CategoryRepositoryInterface $category
     *
     * @return type
     */
    protected $home = 'home';

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->middleware('web');
        $this->middleware('auth:web');
        $this->middleware('auth.active:web');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
         $this->repository = $category;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CategoryUserRequest $request)
    {
        $this->repository->pushCriteria(new \Lavalite\Faq\Repositories\Criteria\CategoryUserCriteria());
        $categories = $this->repository->scopeQuery(function ($query) {
            return $query->orderBy('name');
        })->paginate();

        $this->theme->prependTitle(trans('faq::category.names') . ' :: ');

        return $this->theme->of('faq::user.category.index', compact('categories'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     */
    public function show(CategoryUserRequest $request, Category $category)
    {
        Form::populate($category);

        return $this->theme->of('faq::user.category.show', compact('category'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CategoryUserRequest $request)
    {

        $category = $this->repository->newInstance([]);
        Form::populate($category);

        return $this->theme->of('faq::user.category.create', compact('category'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CategoryUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $category = $this->repository->create($attributes);

            return redirect(trans_url('/user/faq/category'))
                ->with('message', trans('messages.success.created', ['Module' => trans('faq::category.name')]))
                ->with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     */
    public function edit(CategoryUserRequest $request, Category $category)
    {

        Form::populate($category);

        return $this->theme->of('faq::user.category.edit', compact('category'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     */
    public function update(CategoryUserRequest $request, Category $category)
    {
        try {
            $this->repository->update($request->all(), $category->getRouteKey());

            return redirect(trans_url('/user/faq/category'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('faq::category.name')]))
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
    public function destroy(CategoryUserRequest $request, Category $category)
    {
        try {
            $this->repository->delete($category->getRouteKey());
            return redirect(trans_url('/user/faq/category'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('faq::category.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
