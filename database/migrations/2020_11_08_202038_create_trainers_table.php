<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->uuid('user_uuid');
            $table->foreignId('award_id');
            $table->boolean('trial')->default(true);
			$table->timestamps();
			$table->softDeletes();

            $table->primary(['user_uuid', 'award_id']);

            $table->foreign('user_uuid')->references('uuid')->on('users');
            $table->foreign('award_id')->references('id')->on('awards');
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
        Schema::dropIfExists('trainers');
        Schema::enableForeignKeyConstraints();
    }
}
