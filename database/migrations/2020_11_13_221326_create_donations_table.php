<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
			$table->id();
			$table->uuid('donator_uuid')->nullable();
			$table->text('description')->nullable();
			$table->decimal('amount', 6, 2);
			$table->string('paypal_transaction_id')->nullable();
			$table->timestamps();

            $table->foreign('donator_uuid')->references('uuid')->on('users');
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
        Schema::dropIfExists('donations');
        Schema::enableForeignKeyConstraints();
    }
}
