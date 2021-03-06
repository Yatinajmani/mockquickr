<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('image_path');
            $table->longText('description');
            $table->integer('Starting_bid');
            $table->unsignedTinyInteger('is_sold')->default('0');
            $table->integer('buyer_id')->unsigned()->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('buyer_id')
                    ->references('id')->on('users')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
