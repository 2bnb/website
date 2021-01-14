<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
			$table->id();
			$table->foreignId('award_id');
			$table->timestamp('qualification_time');
			$table->uuid('trainer_uuid');
			$table->uuid('supervisor_uuid')->nullable();
			$table->smallInteger('max_attendees')->default(2);
			$table->timestamps();
			$table->softDeletes();

            $table->foreign('trainer_uuid')->references('uuid')->on('users');
            $table->foreign('supervisor_uuid')->references('uuid')->on('users');
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
        Schema::dropIfExists('qualifications');
        Schema::enableForeignKeyConstraints();
    }
}
