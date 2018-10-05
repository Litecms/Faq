<?php

namespace Litecms\Faq;

use User;

class Faq
{
    /**
     * $faq object.
     */
    protected $faq;
    /**
     * $category object.
     */
    protected $category;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Faq\Interfaces\FaqRepositoryInterface $faq,
        \Litecms\Faq\Interfaces\CategoryRepositoryInterface $category)
    {
        $this->faq = $faq;
        $this->category = $category;
    }

    /**
     * Returns count of faq.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.faq.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->faq->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\FaqUserCriteria());
        }

        $faq = $this->faq->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('faq::' . $view, compact('faq'))->render();
    }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget1($view = 'admin.category.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->category->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\CategoryUserCriteria());
        }

        $category = $this->category->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('faq::' . $view, compact('category'))->render();
    }

     public function selectCategories()
    {
        $temp = [];
        $category = $this->category->scopeQuery(function ($query) {
            return $query->whereStatus('show')->orderBy('name', 'ASC');

        })->all();

        foreach ($category as $key => $value) { 
            $temp[$value->id] = ucfirst($value->name);
       }

        return $temp;
    }

    public function selectQuestions($category_id)
    {

        $temp = [];
        $qst = $this->faq->scopeQuery(function ($query) use ($category_id) {
            return $query->where('category_id',$category_id);

        })->all();
        return $qst;
    }
}
