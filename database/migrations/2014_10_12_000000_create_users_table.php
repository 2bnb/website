<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->uuid('uuid')->primary();
			$table->string('name');
			$table->date('join_date')->nullable();
			$table->string('discord_id')->unique();
			$table->string('discord_access_token')->nullable();
			$table->bigInteger('avatar_resource_id')->unsigned();
			$table->date('date_of_birth');
			$table->smallInteger('country')->unsigned()->zerofill()->nullable();
			$table->string('timezone', 9)->default('UTC+00:00');
			$table->json('data')->default(new Expression('(JSON_ARRAY())'));
			$table->tinyInteger('status_id')->unsigned();
			$table->smallInteger('rank_id')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
