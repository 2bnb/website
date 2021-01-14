<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('description')->nullable();
			$table->string('type');
			$table->json('media');
			$table->uuid('uploader_uuid');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('uploader_uuid')->references('uuid')->on('users');
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
        Schema::dropIfExists('resources');
        Schema::enableForeignKeyConstraints();
    }
}
