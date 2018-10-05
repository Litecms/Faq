<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

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
        Schema::create(config('litecms.faq.faq.model.table'), function ($table) {
            $table->increments('id');
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['show','hide'])->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type', 100)->nullable();
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
        Schema::drop(config('litecms.faq.faq.model.table'));
    }
}
