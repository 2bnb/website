<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->uuid('user_uuid');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->primary(['user_uuid', 'role_id']);

            $table->foreign('user_uuid')->references('uuid')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('user_roles');
        Schema::enableForeignKeyConstraints();
    }
}
