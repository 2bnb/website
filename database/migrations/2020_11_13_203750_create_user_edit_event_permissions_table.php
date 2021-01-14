<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEditEventPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_edit_event_permissions', function (Blueprint $table) {
            $table->uuid('user_uuid');
            $table->foreignId('event_id');

            $table->primary(['event_id', 'user_uuid']);

            $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('user_edit_event_permissions');
        Schema::enableForeignKeyConstraints();
    }
}
