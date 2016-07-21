<?php

return [

    /**
     * Provider.
     */
    'provider' => 'litecms',

    /*
     * Package.
     */
    'package'  => 'faq',

    /*
     * Modules.
     */
    'modules'  => ['faq',
        'category'],

    'faq'      => [
        'model'         => 'Litecms\Faq\Models\Faq',
        'table'         => 'faqs',
        'presenter'     => \Litecms\Faq\Repositories\Presenter\FaqItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'question', 'answer', 'category_id', 'status','upload_folder'],
        'translate'     => [],

        'upload-folder' => '/uploads/faq/faq',
        'uploads'       => [
            'single'   => [],
            'multiple' => [],
        ],
        'casts'         => [
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],
    ],
    'category' => [
        'model'         => 'Litecms\Faq\Models\Category',
        'table'         => 'faq_categories',
        'presenter'     => \Litecms\Faq\Repositories\Presenter\CategoryItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'name', 'status'.'upload_folder'],
        'translate'     => [],

        'upload-folder' => '/uploads/faq/category',
        'uploads'       => [
            'single'   => [],
            'multiple' => [],
        ],
        'casts'         => [
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],
    ],
];
