<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bot_logs', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->uuid('bot_uuid');
			$table->json('data');
			$table->timestamps();

			$table->foreign('bot_uuid')->references('uuid')->on('bots');
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
		Schema::dropIfExists('bot_logs');
		Schema::enableForeignKeyConstraints();
    }
}
