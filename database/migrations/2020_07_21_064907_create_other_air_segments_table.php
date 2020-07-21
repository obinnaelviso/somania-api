<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherAirSegmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_air_segments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_detail_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('other_air_segment_serial');
            $table->string('section_label');
            $table->string('itinerary_index_number');
            $table->string('airline_code');
            $table->string('airline_number');
            $table->string('airline_name');
            $table->string('flight_number');
            $table->string('class_of_service');
            $table->string('status_code');
            $table->string('departure_date');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('next_day_arrival_indicator');
            $table->string('origin_city_information');
            $table->string('destination_city_information');
            $table->string('meal_codes');
            $table->string('stopover_indicator');
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
        Schema::dropIfExists('other_air_segments');
    }
}
