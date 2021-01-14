<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->foreignId('award_type_id');
			$table->text('description')->nullable();
			$table->string('document_link')->nullable();
			$table->foreignId('icon_id')->nullable();
			$table->uuid('owner_uuid')->nullable();
			$table->timestamps();
			$table->softDeletes();


            $table->foreign('owner_uuid')->references('uuid')->on('users');
			$table->foreign('icon_id')->references('id')->on('resources');
			$table->foreign('award_type_id')->references('id')->on('award_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awards');
    }
}
