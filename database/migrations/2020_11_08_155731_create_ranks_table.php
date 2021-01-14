<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->text('description')->nullable();
			$table->foreignId('group_id')->nullable();
			$table->foreignId('icon_id')->nullable();
			$table->smallInteger('level')->default(0);
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('group_id')->references('id')->on('rank_groups');
			$table->foreign('icon_id')->references('id')->on('resources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks');
    }
}
