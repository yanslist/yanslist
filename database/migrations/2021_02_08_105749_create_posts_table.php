<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePostsTable.
 */
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
            $table->uuid('id')->primary();
            $table->char('type', 20)->default(\App\Models\PostType::defaultValue());
            $table->boolean('is_offer')->default(true);
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('image')->nullable();
            $table->string('contact')->nullable();
            $table->integer('region_id')->unsigned();
            $table->integer('township_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->char('status', 20)->default(\App\Models\PostStatus::defaultValue());
            $table->string('token');
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
        Schema::drop('posts');
    }
}
