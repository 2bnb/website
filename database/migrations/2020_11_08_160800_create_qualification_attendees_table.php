<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_attendees', function (Blueprint $table) {
            $table->uuid('attendee_uuid');
            $table->foreignId('qualification_id');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['attendee_uuid', 'qualification_id']);

            $table->foreign('attendee_uuid')->references('uuid')->on('users');
            $table->foreign('qualification_id')->references('id')->on('qualifications');
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
        Schema::dropIfExists('qualification_attendees');
        Schema::enableForeignKeyConstraints();
    }
}
