<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequentFlyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequent_flyers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passengers_data_id')->constrained()->on('passengers_data')->onDelete('cascade');

            $table->unsignedBigInteger('frequent_flyer_serial');
            $table->string('section_label');
            $table->string('frequent_flyer_passenger_name');
            $table->string('frequent_flyer_carrier_code');
            $table->string('frequent_flyer_number');
            $table->string('cross_accrual_indicator');
            $table->string('cross_accrual_carrier_list');
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
        Schema::dropIfExists('frequent_flyers');
    }
}
