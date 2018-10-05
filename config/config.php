<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'litecms',

    /*
     * Package.
     */
    'package'   => 'faq',

    /*
     * Modules.
     */
    'modules'   => ['faq', 
'category'],

    'faq'       => [
        'model' => [
            'model'                 => \Litecms\Faq\Models\Faq::class,
            'table'                 => 'faqs',
            'presenter'             => \Litecms\Faq\Repositories\Presenter\FaqPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at', 'created_at', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'question',  'answer',  'category_id',  'slug',  'status',  'user_id',  'user_type',  'upload_folder',  'deleted_at',  'created_at',  'updated_at'],
            'translatables'         => [],
            'upload_folder'         => 'faq/faq',
            'uploads'               => [
            
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            
            ],

            'casts'                 => [
            
                'images'    => 'array',
                'file'      => 'array',
            
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Faq',
            'module'    => 'Faq',
        ],

    ],

    'category'       => [
        'model' => [
            'model'                 => \Litecms\Faq\Models\Category::class,
            'table'                 => 'faq_categories',
            'presenter'             => \Litecms\Faq\Repositories\Presenter\CategoryPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at', 'created_at', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'name',  'slug',  'status',  'user_id',  'user_type',  'upload_folder',  'deleted_at',  'created_at',  'updated_at'],
            'translatables'         => [],
            'upload_folder'         => 'faq/category',
            'uploads'               => [
            
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            
            ],

            'casts'                 => [
            
                'images'    => 'array',
                'file'      => 'array',
            
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Faq',
            'module'    => 'Category',
        ],

    ],
];
