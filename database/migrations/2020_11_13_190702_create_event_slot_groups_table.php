<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSlotGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_slot_groups', function (Blueprint $table) {
			$table->id();
			$table->foreignId('slot_group_id');
			$table->foreignId('event_id');
			$table->string('unit')->nullable();
			$table->json('public_data')->nullable();
			$table->smallInteger('position')->default(0);
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('slot_group_id')->references('id')->on('slot_groups');
			$table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('event_slot_groups');
		Schema::enableForeignKeyConstraints();
    }
}
