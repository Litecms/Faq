<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.faq.faq.model.table'))->insert([
            ['id' => '1', 'question' => 'How does Google protect my privacy and keep my information secure?', 'answer' => 'We know security and privacy are important to you – and they are important to us, too. We make it a priority to provide strong security and give you confidence that your information is safe and accessible when you need it.

We’re constantly working to ensure strong security, protect your privacy, and make Google even more effective and efficient for you. We spend hundreds of millions of dollars every year on security, and employ world-renowned experts in data security to keep your information safe. We also built easy-to-use privacy and security tools like Google Dashboard, 2-step verification and Ads Settings. So when it comes to the information you share with Google, you’re in control.

You can learn more about safety and security online, including how to protect yourself and your family online, at the Google Safety Center.

Learn more about how we keep your personal information private and safe — and put you in control.', 'category_id' => '3', 'slug' => '', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:52:20', 'updated_at' => '2018-09-21 09:52:20'],
            ['id' => '2', 'question' => 'How can I remove information about myself from Google\'s search results?', 'answer' => 'Google search results are a reflection of the content publicly available on the web. Search engines can’t remove content directly from websites, so removing search results from Google wouldn’t remove the content from the web. If you want to remove something from the web, you should contact the webmaster of the site the content is posted on and ask him or her to make a change. Once the content has been removed and Google has noted the update, the information will no longer appear in Google’s search results. If you have an urgent removal request, you can also visit our help page for more information.', 'category_id' => '3', 'slug' => '-2', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:52:47', 'updated_at' => '2018-09-21 09:52:47'],
            ['id' => '3', 'question' => 'How do I filter the options in a select field?', 'answer' => 'This also applies to: select2, select2_multiple, select2_from_ajax, select2_from_ajax_multiple.

There are 3 possible solutions:

If there will be few options (dozens), the easiest way would be to use select_from_array or select2_from_array instead. Since you tell it what the options are, you can do any filtering you want there.
If there are a lot of options (100+), best to use select2_from_ajax instead. You\'ll be able to filter the results any way you want in the controller method (the one that responds with the results to the AJAX call).
If you can\'t use select2_from_array for select2_from_ajax, you can create another model and add a global scope to it. For example, say you only want to show the users that belong to the user\'s company. You can create App\\Models\\CompanyUser and use that in your select2 field instead of App\\Models\\User:', 'category_id' => '1', 'slug' => '-3', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:53:23', 'updated_at' => '2018-09-21 09:53:23'],
            ['id' => '4', 'question' => 'What’s the purpose of an FAQ page?', 'answer' => 'To address frequently asked questions about your business, of course.

Actually, that’s only part of it.

An FAQ section done right can be an effective addition to your website that serves several functions, from:

Alleviating purchasing anxieties that your product page copy doesn’t directly address.
Relieving some of the burden on customer support by publicly answering common questions.
Improving SEO and site navigation.
Earning trust by demonstrating product expertise and explaining your business model.
Delighting customers by creatively answering their questions.
If you\'re not using your FAQ page to its full potential, here are some of the questions you should be asking to get the most out of this often-forgotten section of most websites.', 'category_id' => '2', 'slug' => '-4', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-09-21 09:55:03', 'updated_at' => '2018-09-21 09:55:03'],

        ]);

        DB::table(config('litecms.faq.category.model.table'))->insert([
            ['id' => '1', 'name' => 'General', 'slug' => 'general', 'status' => 'show', 'user_type' => 'App\\User', 'user_id' => '1', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-01-30 10:05:48', 'updated_at' => '2018-01-30 10:05:54'],
            ['id' => '2', 'name' => 'Standard', 'slug' => 'standard', 'status' => 'show', 'user_type' => 'App\\User', 'user_id' => '1', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-01-30 10:06:05', 'updated_at' => '2018-01-30 10:06:05'],
            ['id' => '3', 'name' => 'Basic', 'slug' => 'basic', 'status' => 'show', 'user_type' => 'App\\User', 'user_id' => '1', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-01-30 10:06:12', 'updated_at' => '2018-01-30 10:06:12'],
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
                'url'         => 'admin/faq/faq',
                'name'        => 'Faq',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
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
                'parent_id'   => 4,
                'key'         => null,
                'url'         => 'faq',
                'name'        => 'Faq',
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
        'module'    => 'Faq',
        'user_type' => null,
        'user_id'   => null,
        'key'       => 'faq.faq.key',
        'name'      => 'Some name',
        'value'     => 'Some value',
        'type'      => 'Default',
        'control'   => 'text',
        ],
         */
        ]);
    }
}
