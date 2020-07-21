<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFareConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fare_constructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passengers_data_id')->constrained()->on('passengers_data')->onDelete('cascade');

            $table->unsignedBigInteger('fare_construction_serial');
            $table->string('section_label');
            $table->string('fare_section_indicator');
            $table->string('type');
            $table->string('fare_construction_detail');
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
        Schema::dropIfExists('fare_constructions');
    }
}
