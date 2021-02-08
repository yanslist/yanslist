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
            $table->string('title');
            $table->string('slug');
            $table->text('ihave');
            $table->text('ineed');
            $table->string('contact');
            $table->char('status', 20)->default(\App\Models\PostStatus::defaultValue());
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
