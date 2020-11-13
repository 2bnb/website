<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_slots', function (Blueprint $table) {
			$table->id();
			$table->uuid('user_uuid')->nullable();
			$table->string('username')->nullable();
			$table->foreignId('slot_id');
			$table->foreignId('event_slot_group_id');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('slot_id')->references('id')->on('slots');
			$table->foreign('event_slot_group_id')->references('id')->on('event_slot_groups');
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
        Schema::dropIfExists('event_slots');
		Schema::enableForeignKeyConstraints();
    }
}
