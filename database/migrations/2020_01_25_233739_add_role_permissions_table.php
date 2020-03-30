<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->bigIncrements('role_id');
            $table->unsignedInteger('permission_id');

            $table->primary(['role_id', 'permission_id']);

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('permission_id')->references('id')->on('preferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}
