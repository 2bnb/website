<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisbehavioursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misbehaviours', function (Blueprint $table) {
			$table->id();
			$table->string('type');
			$table->string('method');
			$table->uuid('user_uuid');
			$table->uuid('issuer_uuid');
			$table->text('description');
			$table->foreignId('event_id')->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_uuid')->references('uuid')->on('users');
			$table->foreign('issuer_uuid')->references('uuid')->on('users');
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
        Schema::dropIfExists('misbehaviours');
        Schema::enableForeignKeyConstraints();
    }
}
