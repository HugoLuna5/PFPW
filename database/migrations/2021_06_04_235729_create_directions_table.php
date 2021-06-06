<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->unsignedBigInteger('device_id')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->text('street')->nullable();
            $table->text('colony')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('cp')->nullable();
            $table->text('reference_dir')->nullable();
            $table->text('direction_complete')->nullable();
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
        Schema::dropIfExists('directions');
    }
}
