<?php

namespace Litecms\Faq;

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
        \Litecms\Faq\Interfaces\CategoryRepositoryInterface                        $category) {
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
    public function count($type)
    {
        $data = $this->$type->all();
        return count($data);
    }

    /**
     * Returns count of faq.
     * @return int
     */
    public function getCategory()
    {
        $array = [];
        $categories = $this->category->scopeQuery(function ($query) {
            return $query->orderBy('name')->whereStatus('show');
        })->all();

        foreach ($categories as $key => $category) {
            $array[$category['id']] = ucfirst($category['name']);
        }

        return $array;

    }

}
