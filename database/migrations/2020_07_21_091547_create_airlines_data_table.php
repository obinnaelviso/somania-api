<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_detail_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('airline_data_serial');
            $table->string('section_label');
            $table->string('itinerary_index_number');
            $table->string('airline_code');
            $table->string('airline_number');
            $table->string('airline_name');
            $table->string('flight_number');
            $table->string('booked_class');
            $table->string('status_code');
            $table->string('departure_date');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('next_day_arrival_indicator');
            $table->string('origin_city_information');
            $table->string('destination_city_information');
            $table->string('domestic_international_indicator');
            $table->string('seat_indicator');
            $table->string('meal_codes');
            $table->string('stopover_indicator');
            $table->string('number_of_stops');
            $table->string('baggage_allowance');
            $table->string('aircraft_type');
            $table->string('departure_terminal');
            $table->string('nautical_miles');
            $table->string('flight_coupon_indicator');
            $table->string('segment_identifier');

            // Optional fields
            $table->string('change_of_guage_data')->nullable();
            $table->string('group_control_record_locator')->nullable();
            $table->string('affiliated_carrier_name')->nullable();
            $table->string('frequent_flyer_miles')->nullable();
            $table->string('ticketed_indicator')->nullable();
            $table->string('total_journey_time')->nullable();
            $table->string('airline_name_long')->nullable();
            $table->string('affiliated_carrier_name_long')->nullable();
            $table->string('departure_date_long')->nullable();

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
        Schema::dropIfExists('airlines_data');
    }
}
