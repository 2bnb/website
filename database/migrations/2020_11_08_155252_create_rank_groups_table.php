<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_groups', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->text('description')->nullable();
			$table->foreignId('icon_id')->nullable();
			$table->timestamps();
			$table->softDeletes();

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
        Schema::dropIfExists('rank_groups');
    }
}
