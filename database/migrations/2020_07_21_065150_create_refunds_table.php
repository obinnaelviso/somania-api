<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_detail_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('refund_serial');
            $table->string('section_label', 30);
            $table->string('refund_ticket_number_range', 30);
            $table->string('refunded_document_issue_date', 30);
            $table->string('invoice_number', 30);
            $table->string('passenger_name', 30);
            $table->string('crs_derived_indicator', 30);

            $table->string('refunded_coupons', 30);

            $table->string('original_issue_document_number', 30);
            $table->string('original_place_of_issue', 30);
            $table->string('original_date_of_issue', 30);
            $table->string('original_iata_number', 30);

            $table->string('base_or_equivalent_fare_and_taxes_currency_code', 30);
            $table->string('original_issue_base_fare_amount', 30);
            $table->string('tax1_amount', 30);
            $table->string('tax1_code', 30);
            $table->string('tax2_amount', 30);
            $table->string('tax2_code', 30);
            $table->string('tax3_amount', 30);
            $table->string('tax3_code', 30);

            $table->string('pfc_tax_amounts', 30);

            $table->string('individual_tax_details', 30);

            $table->string('airline_refund_authority', 30);

            $table->string('commission_rate', 30);
            $table->string('returned_commission_amount', 30);

            $table->string('penalty_fee_amount', 30);
            $table->string('commission_percent_on_penalty_fee', 30);
            $table->string('commission_amount_on_penalty_fee', 30);

            $table->string('cash_fare_amount_used', 30);
            $table->string('cash_fare_amount_refundable', 30);
            $table->string('credit_fare_amount_used', 30);
            $table->string('credit_fare_amount_refundable', 30);
            $table->string('refund_amount_currency_code', 30);
            $table->string('refund_amount_total_including_taxes', 30);

            $table->string('refund_fop1_credit_card_code', 30);
            $table->string('refund_fop1_credit_card_number', 30);
            $table->string('refund_fop1_credit_card_expiry_date', 30);
            $table->string('refund_fop1_refund_amount', 30);

            $table->string('refund_fop2_credit_card_code', 30);
            $table->string('refund_fop2_credit_card_number', 30);
            $table->string('refund_fop2_credit_card_expiry_date', 30);
            $table->string('refund_fop2_refund_amount', 30);

            $table->string('refund_fop3_credit_card_code', 30);
            $table->string('refund_fop3_credit_card_number', 30);
            $table->string('refund_fop3_credit_card_expiry_date', 30);
            $table->string('refund_fop3_refund_amount', 30);

            $table->string('miscellaneous_fee_amount', 30);

            $table->string('base_or_equivalent_fare_and_taxes_large_currency_code', 30);
            $table->string('original_issue_base_fare_large_currency_amount', 30);
            $table->string('tax1_large_currency_amount', 30);
            $table->string('tax1_large_currency_code', 30);
            $table->string('tax2_large_currency_amount', 30);
            $table->string('tax2_large_currency_code', 30);
            $table->string('tax3_large_currency_amount', 30);
            $table->string('tax3_large_currency_code', 30);
            $table->string('refund_waiver_code', 30);

            $table->string('cash_fare_amount_large_currency_used', 30);
            $table->string('cash_fare_amount_large_currency_refundable', 30);
            $table->string('credit_fare_amount_large_currency_used', 30);
            $table->string('credit_fare_amount_large_currency_refundable', 30);
            $table->string('refund_amount_large_currency_code', 30);
            $table->string('refund_large_currency_amount_total_including_taxes', 30);

            $table->string('refund_fop1_credit_card_code_large_currency', 30);
            $table->string('refund_fop1_credit_card_number_large_currency', 30);
            $table->string('refund_fop1_credit_card_expiry_date_large_currency', 30);
            $table->string('refund_fop1_refund_large_currency_amount', 30);

            $table->string('refund_fop2_credit_card_code_large_currency', 30);
            $table->string('refund_fop2_credit_card_number_large_currency', 30);
            $table->string('refund_fop2_credit_card_expiry_date_large_currency', 30);
            $table->string('refund_fop2_refund_large_currency_amount', 30);

            $table->string('refund_fop3_credit_card_code_large_currency', 30);
            $table->string('refund_fop3_credit_card_number_large_currency', 30);
            $table->string('refund_fop3_credit_card_expiry_date_large_currency', 30);
            $table->string('refund_fop3_refund_large_currency_amount', 30);

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
        Schema::dropIfExists('refunds');
    }
}
