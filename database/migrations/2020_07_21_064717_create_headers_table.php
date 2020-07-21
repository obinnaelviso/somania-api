<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_detail_id')->constrained()->onDelete('cascade');

            $table->string('header_id');
            $table->string('transmitting_system');
            $table->string('accounting_code');
            $table->string('mir_type_indicator');
            $table->string('total_record_size');
            $table->string('mir_sequence_number');
            $table->string('mir_creation_date_time');
            $table->string('issuing_airline_data');
            $table->string('first_travel_date');
            $table->string('gtids_follow');

            $table->string('booking_agency_account_code');
            $table->string('issuing_agency_account_code');
            $table->string('agency_account_number');
            $table->string('record_locator');
            $table->string('record_locator_owning_airline');
            $table->string('other_crs_code');
            $table->string('auto_manual_indicator');
            $table->string('booking_agent_sign');
            $table->string('service_bureau_indicator');
            $table->string('issuing_agent_data');
            $table->string('booking_file_creation_date');
            $table->string('elapsed_booking_file_handling_time');
            $table->string('date_last_change_to_booking');
            $table->string('number_of_changes_to_booking_file');

            $table->string('currency_party_fare');
            $table->string('party_fare');
            $table->string('number_of_decimals_in_currency');
            $table->string('currency_taxes_and_comm');
            $table->string('first_tax_amount');
            $table->string('first_tax_code');
            $table->string('second_tax_amount');
            $table->string('second_tax_code');
            $table->string('third_tax_amount');
            $table->string('third_tax_code');
            $table->string('fourth_tax_amount');
            $table->string('fourth_tax_code');
            $table->string('fifth_tax_amount');
            $table->string('fifth_tax_code');
            $table->string('pax_comm_data');
            $table->string('tour_code');

            $table->string('indicator_bytes');
            $table->string('dual_mir_identifier');
            $table->string('sender_target_indicator');
            $table->string('pseudo_city_code');
            $table->string('dual_mir_seq_number');
            $table->string('dual_mir_gtid');
            $table->string('stp_identifier');
            $table->string('host_pseudo_city_code');
            $table->string('home_pseudo_city_code');

            $table->string('item_count');

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
        Schema::dropIfExists('headers');
    }
}
