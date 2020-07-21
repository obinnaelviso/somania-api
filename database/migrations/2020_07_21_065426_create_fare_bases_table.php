<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFareBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fare_bases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passengers_data_id')->constrained()->on('passengers_data')->onDelete('cascade');

            $table->unsignedBigInteger('fare_basis_serial');
            $table->string('section_label');
            $table->string('fare_section_indicator');
            $table->string('itinerary_index_number');
            $table->string('fare_basis_code');
            $table->string('segment_value');
            $table->string('not_valid_before_date');
            $table->string('not_valid_after_date');
            $table->string('segment_ticket_designator');

            $table->string('complete_fare_basis_code');
            $table->string('endorsement');
            $table->string('baggage_allowance');

            $table->string('full_endorsement');
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
        Schema::dropIfExists('fare_bases');
    }
}
