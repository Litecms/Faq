<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for faq in faq package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  faq module in faq package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Frequently Asked Questions',
    'sub_name'      => 'Here are answers to most common questions. Cant find an answer? Call us!',
    'names'         => 'Faqs',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Faqs',
        'sub'   => 'Faqs',
        'list'  => 'List of faqs',
        'edit'  => 'Edit faq',
        'create'    => 'Create new faq'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
           'status'              => ['show'=>'show','hide'=>'hide'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'question'                   => 'Please enter question',
        'answer'                     => 'Please enter answer',
        'category_id'                => 'Please enter category id',
        'slug'                       => 'Please enter slug',
        'status'                     => 'Please select status',
        'user_id'                    => 'Please enter user id',
        'user_type'                  => 'Please enter user type',
        'upload_folder'              => 'Please enter upload folder',
        'deleted_at'                 => 'Please select deleted',
        'created_at'                 => 'Please select created',
        'updated_at'                 => 'Please select updated',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'question'                   => 'Question',
        'answer'                     => 'Answer',
        'category_id'                => 'Category',
        'slug'                       => 'Slug',
        'status'                     => 'Status',
        'user_id'                    => 'User id',
        'user_type'                  => 'User type',
        'upload_folder'              => 'Upload folder',
        'deleted_at'                 => 'Deleted',
        'created_at'                 => 'Created',
        'updated_at'                 => 'Updated',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'question'                   => ['name' => 'Question', 'data-column' => 1, 'checked'],
        'answer'                     => ['name' => 'Answer', 'data-column' => 2, 'checked'],
        'category_id'                => ['name' => 'Category', 'data-column' => 3, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Faqs',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
