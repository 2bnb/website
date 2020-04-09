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
            $table->integer('avatar_resource_id')->unsigned()->nullable();
            $table->date('date_of_birth');
            $table->smallInteger('country')->unsigned()->zerofill()->nullable();
            $table->string('timezone', 9)->default('UTC+00:00');
            $table->json('data');
            $table->integer('rank_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
