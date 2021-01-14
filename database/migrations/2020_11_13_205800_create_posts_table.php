<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->id();
			$table->string('name');
			$table->text('description')->nullable();
			$table->uuid('author_uuid');
			$table->foreignId('minimum_role_to_view')->nullable();
			$table->string('type');
			$table->json('custom_attributes')->nullable();
			$table->boolean('allow_comments')->default(true);
			$table->boolean('freeze_comments')->default(false);

			$table->timestamp('published_at')->nullable();
            $table->timestamps();
			$table->softDeletes();

			$table->foreign('minimum_role_to_view')->references('id')->on('roles');
            $table->foreign('author_uuid')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('posts');
        Schema::enableForeignKeyConstraints();
    }
}
