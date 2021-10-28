<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_posts', function (Blueprint $table) {
            $table->increments('website_post_id');
            $table->integer('website_id')->unsigned(); 
            $table->foreign('website_id')->references('website_id')->on('websites'); 
            $table->string('post_title');
            $table->text('description');
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_posts');
    }
}
