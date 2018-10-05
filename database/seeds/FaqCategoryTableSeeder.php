<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class FaqCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.faq.category.model.table'))->insert([
            ['id' => '1', 'name' => 'General', 'slug' => 'general', 'status' => 'show', 'user_type' => 'App\\User', 'user_id' => '1', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-01-30 10:05:48', 'updated_at' => '2018-01-30 10:05:54'],
            ['id' => '2', 'name' => 'Standard', 'slug' => 'standard', 'status' => 'show', 'user_type' => 'App\\User', 'user_id' => '1', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-01-30 10:06:05', 'updated_at' => '2018-01-30 10:06:05'],
            ['id' => '3', 'name' => 'Basic', 'slug' => 'basic', 'status' => 'show', 'user_type' => 'App\\User', 'user_id' => '1', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-01-30 10:06:12', 'updated_at' => '2018-01-30 10:06:12'],
        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'faq.category.view',
                'name' => 'View Category',
            ],
            [
                'slug' => 'faq.category.create',
                'name' => 'Create Category',
            ],
            [
                'slug' => 'faq.category.edit',
                'name' => 'Update Category',
            ],
            [
                'slug' => 'faq.category.delete',
                'name' => 'Delete Category',
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/faq/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/faq/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'pacakge'   => 'Faq',
        'module'    => 'Category',
        'user_type' => null,
        'user_id'   => null,
        'key'       => 'faq.category.key',
        'name'      => 'Some name',
        'value'     => 'Some value',
        'type'      => 'Default',
        'control'   => 'text',
        ],
         */
        ]);
    }
}
