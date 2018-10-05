<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for category in faq package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  category module in faq package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Category',
    'names'         => 'Categories',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Categories',
        'sub'   => 'Categories',
        'list'  => 'List of categories',
        'edit'  => 'Edit category',
        'create'    => 'Create new category'
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
        'name'                       => 'Please enter name',
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
        'name'                       => 'Name',
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
        'name'                       => ['name' => 'Name', 'data-column' => 1, 'checked'],
        'status'                     => ['name' => 'Status', 'data-column' => 2, 'checked'],
        'created_at'                 => ['name' => 'Created', 'data-column' => 3, 'checked'],
        'updated_at'                 => ['name' => 'Updated', 'data-column' => 4, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Categories',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
