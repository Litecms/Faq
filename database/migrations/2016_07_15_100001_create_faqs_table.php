<?php

use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: faqs
         */
        Schema::create('faqs', function ($table) {
            $table->increments('id');
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['show', 'hide'])->default('hide')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });

        /*
         * Table: categories
         */
        Schema::create('faq_categories', function ($table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['show', 'hide'])->default('hide')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });

    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('faqs');

        Schema::drop('faq_categories');
    }
}
