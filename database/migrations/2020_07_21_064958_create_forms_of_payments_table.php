<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsOfPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_of_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_detail_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('form_of_payment_serial');
            $table->string('section_label');
            $table->string('type');
            $table->string('collected_or_refunded_amount');
            $table->string('refund_indicator');
            $table->string('credit_card_code');
            $table->string('credit_card_number');
            $table->string('credit_card_expiration_date');
            $table->string('credit_card_approval_code');
            $table->string('payment_plan_options');

            $table->string('address_verification_indicator');
            $table->string('check_verification_indicator');
            $table->string('passenger_number');
            $table->string('free_text_data');
            $table->string('customer_file_reference');
            $table->string('credit_card_customer_order_number');
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
        Schema::dropIfExists('forms_of_payments');
    }
}
