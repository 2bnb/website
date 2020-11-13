<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_requirements', function (Blueprint $table) {
            $table->foreignId('slot_id');
            $table->foreignId('requirement_id');

            $table->primary(['slot_id', 'requirement_id']);

            $table->foreign('slot_id')->references('id')->on('slots');
            $table->foreign('requirement_id')->references('id')->on('awards');
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
        Schema::dropIfExists('slot_requirements');
        Schema::enableForeignKeyConstraints();
    }
}
