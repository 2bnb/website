<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('award_requirements', function (Blueprint $table) {
            $table->foreignId('award_id');
            $table->foreignId('requirement_id');

            $table->primary(['award_id', 'requirement_id']);

            $table->foreign('award_id')->references('id')->on('awards');
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
        Schema::dropIfExists('award_requirements');
        Schema::enableForeignKeyConstraints();
    }
}
