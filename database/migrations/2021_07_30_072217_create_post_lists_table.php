<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('task');
            $table->dateTime('start_time');
            $table->dateTime('finish_time');
            $table->timestamps();
        });
        Schema::table('post_lists', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_lists');
    }
}
