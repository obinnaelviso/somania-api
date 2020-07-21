<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_detail_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('passenger_serial');
            $table->string('section_label');
            $table->string('passenger_name');
            $table->string('transaction_number');
            $table->string('ticket_and_invoice_numbers');
            $table->string('passenger_identification_code_description');
            $table->string('associated_fare_item_number');
            $table->string('associated_exchange_item_number');
            $table->string('multiple_filed_fares_indicator');

            $table->string('name_field_remarks');
            $table->string('passenger_title');
            $table->string('passenger_age');
            $table->string('passenger_gender');
            $table->string('passenger_smoking_preference');
            $table->string('passenger_citizenship_country_code');
            $table->string('passenger_passport_number');
            $table->string('passenger_passport_expiration_date');
            $table->string('stock_control_data');
            $table->string('fare_quote_status_code');
            $table->string('passenger_expanded_name');
            $table->string('pricing_modifier');
            $table->string('purchase_ticket_last_date');
            $table->string('category_35_indicator');
            $table->string('ticket_issue_date');

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
        Schema::dropIfExists('passengers_data');
    }
}
