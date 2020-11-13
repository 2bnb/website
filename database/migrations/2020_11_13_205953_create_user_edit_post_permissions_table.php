<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEditPostPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_edit_post_permissions', function (Blueprint $table) {
            $table->uuid('user_uuid');
            $table->foreignId('post_id');

            $table->primary(['post_id', 'user_uuid']);

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_uuid')->references('uuid')->on('users');
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
        Schema::dropIfExists('user_edit_post_permissions');
        Schema::enableForeignKeyConstraints();
    }
}
