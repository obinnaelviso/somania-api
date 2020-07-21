<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFareValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fare_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passengers_data_id')->constrained()->on('passengers_data')->onDelete('cascade');

            $table->unsignedBigInteger('fare_serial');
            $table->string('section_label');
            $table->string('fare_section_indicator');
            $table->string('base_fare_currency_code');
            $table->string('base_fare_amount');
            $table->string('total_amount_currency_code');
            $table->string('total_amount');
            $table->string('equivalent_amount_currency_code');
            $table->string('equivalent_amount');

            $table->string('net_remit_amount');
            $table->string('taxes_currency_code');
            $table->string('tax1_amount');
            $table->string('tax1_code');
            $table->string('tax2_amount');
            $table->string('tax2_code');
            $table->string('tax3_amount');
            $table->string('tax3_code');
            $table->string('tax4_amount');
            $table->string('tax4_code');
            $table->string('tax5_amount');
            $table->string('tax5_code');

            $table->string('xt_tax_details');
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
        Schema::dropIfExists('fare_values');
    }
}
