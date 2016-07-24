<?php

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('faqs')->insert([

            [
                'user_id'     => '1',
                'question'    => 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET ?',
                'slug'        => '',
                'answer'      => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.',
                'category_id' => '3',
                'status'      => 'show',
                'created_at'  => '2016-07-19 10:22:52',
                'updated_at'  => '2016-07-19 10:22:52',
                'deleted_at'  => null,
            ],
            [
                'user_id'     => '1',
                'question'    => 'DUIS AUTE IRURE DOLOR IN REPREHENDERIT IN VOLUPTATE ?',
                'slug'        => '',
                'answer'      => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.',
                'category_id' => '3',
                'status'      => 'show',
                'created_at'  => '2016-07-19 15:56:36',
                'updated_at'  => '2016-07-19 10:26:36',
                'deleted_at'  => null,
            ],
            [
                'user_id'     => '1',
                'question'    => 'DUIS AUTE IRURE DOLOR IN REPREHENDE',
                'slug'        => '',
                'answer'      => 'gfhft',
                'category_id' => '3',
                'status'      => 'show',
                'created_at'  => '2016-07-19 15:54:37',
                'updated_at'  => '2016-07-19 10:24:37',
                'deleted_at'  => '2016-07-19 10:24:37',
            ],
            [
                'user_id'     => '1',
                'question'    => 'EXCEPTEUR SINT OCCAECAT CUPIDATAT NON PROIDENT, SUNT IN CULPA QUI OFFICIA DESERUNT ?',
                'slug'        => '',
                'answer'      => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.',
                'category_id' => '3',
                'status'      => 'show',
                'created_at'  => '2016-07-19 10:25:19',
                'updated_at'  => '2016-07-19 10:25:19',
                'deleted_at'  => null,
            ],

        ]);

        DB::table('faq_categories')->insert([

            [
                'user_id'    => '1',
                'name'       => 'LOREM',
                'slug'       => 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-sed-do-eiusmod-tempor-incididunt-ut-labore-et',
                'status'     => 'hide',
                'created_at' => '2016-07-19 15:51:51',
                'updated_at' => '2016-07-19 10:21:51',
                'deleted_at' => '2016-07-19 10:21:51',
            ],
            [
                'user_id'    => '1',
                'name'       => 'DUIS AUTE IRURE DOLOR IN REPREHENDERIT IN VOLUPTAT',
                'slug'       => 'duis-aute-irure-dolor-in-reprehenderit-in-voluptate',
                'status'     => 'show',
                'created_at' => '2016-07-19 15:51:28',
                'updated_at' => '2016-07-19 10:21:28',
                'deleted_at' => '2016-07-19 10:21:28',
            ],
            [
                'user_id'    => '1',
                'name'       => 'BASIC',
                'slug'       => 'basic',
                'status'     => 'show',
                'created_at' => '2016-07-19 10:22:14',
                'updated_at' => '2016-07-19 10:22:14',
                'deleted_at' => null,
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/faq',
                'name'        => 'Faq',
                'description' => null,
                'icon'        => 'fa fa-question-circle',
                'target'      => null,
                'order'       => 150,
                'status'      => 1,
            ],

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/faq/faq',
                'name'        => 'Faqs',
                'description' => null,
                'icon'        => 'fa fa-question-circle',
                'target'      => null,
                'order'       => 151,
                'status'      => 1,
            ],

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/faq/category',
                'name'        => 'Categories',
                'description' => null,
                'icon'        => 'fa fa-bars',
                'target'      => null,
                'order'       => 152,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'faq',
                'name'        => 'Faqs',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 150,
                'status'      => 1,
            ],

        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'faq.faq.view',
                'name' => 'View Faq',
            ],
            [
                'slug' => 'faq.faq.create',
                'name' => 'Create Faq',
            ],
            [
                'slug' => 'faq.faq.edit',
                'name' => 'Update Faq',
            ],
            [
                'slug' => 'faq.faq.delete',
                'name' => 'Delete Faq',
            ],

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

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'key'      => 'faq.faq.key',
        'name'     => 'Some name',
        'value'    => 'Some value',
        'type'     => 'Default',
        ],
         */
        ]);
    }
}
