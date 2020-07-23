<!doctype html>
<html lang="en">
  <head>
    <title>API Frontend</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>FILE NAME >> {{ $file_detail->mir_filename }}</h1><hr>
        {{-- Headers --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Headers</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">header_id</th>
                              <th scope="col">transmitting_system</th>
                              <th scope="col">accounting_code</th>
                              <th scope="col">mir_type_indicator</th>
                              <th scope="col">total_record_size</th>
                              <th scope="col">mir_sequence_number</th>
                              <th scope="col">mir_creation_date_time</th>
                              <th scope="col">issuing_airline_data</th>
                              <th scope="col">first_travel_date</th>
                              <th scope="col">gtids_follow</th>

                              <th scope="col">booking_agency_account_code</th>
                              <th scope="col">issuing_agency_account_code</th>
                              <th scope="col">agency_account_number</th>
                              <th scope="col">record_locator</th>
                              <th scope="col">record_locator_owning_airline</th>
                              <th scope="col">other_crs_code</th>
                              <th scope="col">auto_manual_indicator</th>
                              <th scope="col">booking_agent_sign</th>
                              <th scope="col">service_bureau_indicator</th>
                              <th scope="col">issuing_agent_data</th>
                              <th scope="col">booking_file_creation_date</th>
                              <th scope="col">elapsed_booking_file_handling_time</th>
                              <th scope="col">date_last_change_to_booking</th>
                              <th scope="col">number_of_changes_to_booking_file</th>

                              <th scope="col">currency_party_fare</th>
                              <th scope="col">party_fare</th>
                              <th scope="col">number_of_decimals_in_currency</th>
                              <th scope="col">currency_taxes_and_comm</th>
                              <th scope="col">first_tax_amount</th>
                              <th scope="col">first_tax_code</th>
                              <th scope="col">second_tax_amount</th>
                              <th scope="col">second_tax_code</th>
                              <th scope="col">third_tax_amount</th>
                              <th scope="col">third_tax_code</th>
                              <th scope="col">fourth_tax_amount</th>
                              <th scope="col">fourth_tax_code</th>
                              <th scope="col">fifth_tax_amount</th>
                              <th scope="col">fifth_tax_code</th>
                              <th scope="col">pax_comm_data</th>
                              <th scope="col">tour_code</th>

                              <th scope="col">indicator_bytes</th>
                              <th scope="col">dual_mir_identifier</th>
                              <th scope="col">sender_target_indicator</th>
                              <th scope="col">pseudo_city_code</th>
                              <th scope="col">dual_mir_seq_number</th>
                              <th scope="col">dual_mir_gtid</th>
                              <th scope="col">stp_identifier</th>
                              <th scope="col">host_pseudo_city_code</th>
                              <th scope="col">home_pseudo_city_code</th>

                              <th scope="col">item_count</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>{{ $header->header_id }}</td>
                                <td>{{ $header->transmitting_system }}</td>
                                <td>{{ $header->accounting_code }}</td>
                                <td>{{ $header->mir_type_indicator }}</td>
                                <td>{{ $header->total_record_size }}</td>
                                <td>{{ $header->mir_sequence_number }}</td>
                                <td>{{ $header->mir_creation_date_time }}</td>
                                <td>{{ $header->issuing_airline_data }}</td>
                                <td>{{ $header->first_travel_date }}</td>
                                <td>{{ $header->gtids_follow }}</td>

                                <td>{{ $header->booking_agency_account_code }}</td>
                                <td>{{ $header->issuing_agency_account_code }}</td>
                                <td>{{ $header->agency_account_number }}</td>
                                <td>{{ $header->record_locator }}</td>
                                <td>{{ $header->record_locator_owning_airline }}</td>
                                <td>{{ $header->otder_crs_code }}</td>
                                <td>{{ $header->auto_manual_indicator }}</td>
                                <td>{{ $header->booking_agent_sign }}</td>
                                <td>{{ $header->service_bureau_indicator }}</td>
                                <td>{{ $header->issuing_agent_data }}</td>
                                <td>{{ $header->booking_file_creation_date }}</td>
                                <td>{{ $header->elapsed_booking_file_handling_time }}</td>
                                <td>{{ $header->date_last_change_to_booking }}</td>
                                <td>{{ $header->number_of_changes_to_booking_file }}</td>

                                <td>{{ $header->currency_party_fare }}</td>
                                <td>{{ $header->party_fare }}</td>
                                <td>{{ $header->number_of_decimals_in_currency }}</td>
                                <td>{{ $header->currency_taxes_and_comm }}</td>
                                <td>{{ $header->first_tax_amount }}</td>
                                <td>{{ $header->first_tax_code }}</td>
                                <td>{{ $header->second_tax_amount }}</td>
                                <td>{{ $header->second_tax_code }}</td>
                                <td>{{ $header->tdird_tax_amount }}</td>
                                <td>{{ $header->tdird_tax_code }}</td>
                                <td>{{ $header->fourtd_tax_amount }}</td>
                                <td>{{ $header->fourtd_tax_code }}</td>
                                <td>{{ $header->fiftd_tax_amount }}</td>
                                <td>{{ $header->fiftd_tax_code }}</td>
                                <td>{{ $header->pax_comm_data }}</td>
                                <td>{{ $header->tour_code }}</td>

                                <td>{{ $header->indicator_bytes }}</td>
                                <td>{{ $header->dual_mir_identifier }}</td>
                                <td>{{ $header->sender_target_indicator }}</td>
                                <td>{{ $header->pseudo_city_code }}</td>
                                <td>{{ $header->dual_mir_seq_number }}</td>
                                <td>{{ $header->dual_mir_gtid }}</td>
                                <td>{{ $header->stp_identifier }}</td>
                                <td>{{ $header->host_pseudo_city_code }}</td>
                                <td>{{ $header->home_pseudo_city_code }}</td>

                                <td>{{ $header->item_count }}</td>
                            </tr>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br><br>

        {{-- Passengers Data --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Passengers Data <small>(click on link to view other passengers data such as: <i>frequent_flyers, fare_values, fare_bases, fare_constructions</i>)</small></h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">passenger_serial</th>
                              <th scope="col">section_label</th>
                              <th scope="col">passenger_name</th>
                              <th scope="col">transaction_number</th>
                              <th scope="col">ticket_and_invoice_numbers</th>
                              <th scope="col">passenger_identification_code_description</th>
                              <th scope="col">associated_fare_item_number</th>
                              <th scope="col">associated_exchange_item_number</th>
                              <th scope="col">multiple_filed_fares_indicator</th>

                              <th scope="col">name_field_remarks</th>
                              <th scope="col">passenger_title</th>
                              <th scope="col">passenger_age</th>
                              <th scope="col">passenger_gender</th>
                              <th scope="col">passenger_smoking_preference</th>
                              <th scope="col">passenger_citizenship_country_code</th>
                              <th scope="col">passenger_passport_number</th>
                              <th scope="col">passenger_passport_expiration_date</th>
                              <th scope="col">stock_control_data</th>
                              <th scope="col">fare_quote_status_code</th>
                              <th scope="col">passenger_expanded_name</th>
                              <th scope="col">pricing_modifier</th>
                              <th scope="col">purchase_ticket_last_date</th>
                              <th scope="col">category_35_indicator</th>
                              <th scope="col">ticket_issue_date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                @foreach($passengers_data as $passenger_data)
                                    <td><a href="{{ route('passenger-data', [$file_detail->id, $passenger_data->id]) }}">{{ $passenger_data->passenger_serial }}</a></td>
                                    <td><a href="{{ route('passenger-data', [$file_detail->id, $passenger_data->id]) }}">{{ $passenger_data->section_label }}</a></td>
                                    <td><a href="{{ route('passenger-data', [$file_detail->id, $passenger_data->id]) }}">{{ $passenger_data->passenger_name }}</a></td>
                                    <td>{{ $passenger_data->transaction_number }}</td>
                                    <td>{{ $passenger_data->ticket_and_invoice_numbers }}</td>
                                    <td>{{ $passenger_data->passenger_identification_code_description }}</td>
                                    <td>{{ $passenger_data->associated_fare_item_number }}</td>
                                    <td>{{ $passenger_data->associated_exchange_item_number }}</td>
                                    <td>{{ $passenger_data->multiple_filed_fares_indicator }}</td>

                                    <td>{{ $passenger_data->name_field_remarks }}</td>
                                    <td>{{ $passenger_data->passenger_title }}</td>
                                    <td>{{ $passenger_data->passenger_age }}</td>
                                    <td>{{ $passenger_data->passenger_gender }}</td>
                                    <td>{{ $passenger_data->passenger_smoking_preference }}</td>
                                    <td>{{ $passenger_data->passenger_citizenship_country_code }}</td>
                                    <td>{{ $passenger_data->passenger_passport_number }}</td>
                                    <td>{{ $passenger_data->passenger_passport_expiration_date }}</td>
                                    <td>{{ $passenger_data->stock_control_data }}</td>
                                    <td>{{ $passenger_data->fare_quote_status_code }}</td>
                                    <td>{{ $passenger_data->passenger_expanded_name }}</td>
                                    <td>{{ $passenger_data->pricing_modifier }}</td>
                                    <td>{{ $passenger_data->purchase_ticket_last_date }}</td>
                                    <td>{{ $passenger_data->category_35_indicator }}</td>
                                    <td>{{ $passenger_data->ticket_issue_date }}</td>
                                @endforeach
                            </tr>
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <br><br>

        {{-- Airlines Data --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Airlines Data</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">airline_data_serial</th>
                              <th scope="col">section_label</th>
                              <th scope="col">itinerary_index_number</th>
                              <th scope="col">airline_code</th>
                              <th scope="col">airline_number</th>
                              <th scope="col">airline_name</th>
                              <th scope="col">flight_number</th>
                              <th scope="col">booked_class</th>
                              <th scope="col">status_code</th>
                              <th scope="col">departure_date</th>
                              <th scope="col">departure_time</th>
                              <th scope="col">arrival_time</th>
                              <th scope="col">next_day_arrival_indicator</th>
                              <th scope="col">origin_city_information</th>
                              <th scope="col">destination_city_information</th>
                              <th scope="col">domestic_international_indicator</th>
                              <th scope="col">seat_indicator</th>
                              <th scope="col">meal_codes</th>
                              <th scope="col">stopover_indicator</th>
                              <th scope="col">number_of_stops</th>
                              <th scope="col">baggage_allowance</th>
                              <th scope="col">aircraft_type</th>
                              <th scope="col">departure_terminal</th>
                              <th scope="col">nautical_miles</th>
                              <th scope="col">flight_coupon_indicator</th>
                              <th scope="col">segment_identifier</th>
                              <th scope="col">change_of_guage_data</th>
                              <th scope="col">group_control_record_locator</th>
                              <th scope="col">affiliated_carrier_name</th>
                              <th scope="col">frequent_flyer_miles</th>
                              <th scope="col">ticketed_indicator</th>
                              <th scope="col">total_journey_time</th>
                              <th scope="col">airline_name_long</th>
                              <th scope="col">affiliated_carrier_name_long</th>
                              <th scope="col">departure_date_long</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($airlines_data as $airline_data)
                                <tr>
                                    <td>{{ $airline_data->airline_data_serial }}</td>
                                    <td>{{ $airline_data->section_label }}</td>
                                    <td>{{ $airline_data->itinerary_index_number }}</td>
                                    <td>{{ $airline_data->airline_code }}</td>
                                    <td>{{ $airline_data->airline_number }}</td>
                                    <td>{{ $airline_data->airline_name }}</td>
                                    <td>{{ $airline_data->flight_number }}</td>
                                    <td>{{ $airline_data->booked_class }}</td>
                                    <td>{{ $airline_data->status_code }}</td>
                                    <td>{{ $airline_data->departure_date }}</td>
                                    <td>{{ $airline_data->departure_time }}</td>
                                    <td>{{ $airline_data->arrival_time }}</td>
                                    <td>{{ $airline_data->next_day_arrival_indicator }}</td>
                                    <td>{{ $airline_data->origin_city_information }}</td>
                                    <td>{{ $airline_data->destination_city_information }}</td>
                                    <td>{{ $airline_data->domestic_international_indicator }}</td>
                                    <td>{{ $airline_data->seat_indicator }}</td>
                                    <td>{{ $airline_data->meal_codes }}</td>
                                    <td>{{ $airline_data->stopover_indicator }}</td>
                                    <td>{{ $airline_data->number_of_stops }}</td>
                                    <td>{{ $airline_data->baggage_allowance }}</td>
                                    <td>{{ $airline_data->aircraft_type }}</td>
                                    <td>{{ $airline_data->departure_terminal }}</td>
                                    <td>{{ $airline_data->nautical_miles }}</td>
                                    <td>{{ $airline_data->flight_coupon_indicator }}</td>
                                    <td>{{ $airline_data->segment_identifier }}</td>
                                    <td>{{ $airline_data->change_of_guage_data }}</td>
                                    <td>{{ $airline_data->group_control_record_locator }}</td>
                                    <td>{{ $airline_data->affiliated_carrier_name }}</td>
                                    <td>{{ $airline_data->frequent_flyer_miles }}</td>
                                    <td>{{ $airline_data->ticketed_indicator }}</td>
                                    <td>{{ $airline_data->total_journey_time }}</td>
                                    <td>{{ $airline_data->airline_name_long }}</td>
                                    <td>{{ $airline_data->affiliated_carrier_name_long }}</td>
                                    <td>{{ $airline_data->departure_date_long }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <br><br>

        {{-- Other Air Segment --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Other Air Segment</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">other_air_segment_serial</th>
                              <th scope="col">section_label</th>
                              <th scope="col">itinerary_index_number</th>
                              <th scope="col">airline_code</th>
                              <th scope="col">airline_number</th>
                              <th scope="col">airline_name</th>
                              <th scope="col">flight_number</th>
                              <th scope="col">class_of_service</th>
                              <th scope="col">status_code</th>
                              <th scope="col">departure_date</th>
                              <th scope="col">departure_time</th>
                              <th scope="col">arrival_time</th>
                              <th scope="col">next_day_arrival_indicator</th>
                              <th scope="col">origin_city_information</th>
                              <th scope="col">destination_city_information</th>
                              <th scope="col">meal_codes</th>
                              <th scope="col">stopover_indicator</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($other_air_segments as $other_air_segment)
                                <tr>
                                    <td>{{ $other_air_segment->other_air_segment_serial }}</td>
                                    <td>{{ $other_air_segment->section_label }}</td>
                                    <td>{{ $other_air_segment->itinerary_index_number }}</td>
                                    <td>{{ $other_air_segment->airline_code }}</td>
                                    <td>{{ $other_air_segment->airline_number }}</td>
                                    <td>{{ $other_air_segment->airline_name }}</td>
                                    <td>{{ $other_air_segment->flight_number }}</td>
                                    <td>{{ $other_air_segment->class_of_service }}</td>
                                    <td>{{ $other_air_segment->status_code }}</td>
                                    <td>{{ $other_air_segment->departure_date }}</td>
                                    <td>{{ $other_air_segment->departure_time }}</td>
                                    <td>{{ $other_air_segment->arrival_time }}</td>
                                    <td>{{ $other_air_segment->next_day_arrival_indicator }}</td>
                                    <td>{{ $other_air_segment->origin_city_information }}</td>
                                    <td>{{ $other_air_segment->destination_city_information }}</td>
                                    <td>{{ $other_air_segment->meal_codes }}</td>
                                    <td>{{ $other_air_segment->stopover_indicator }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <br><br>

        {{-- Forms Of Payment --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Forms Of Payment</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">form_of_payment_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">type</th>
                                <th scope="col">collected_or_refunded_amount</th>
                                <th scope="col">refund_indicator</th>
                                <th scope="col">credit_card_code</th>
                                <th scope="col">credit_card_number</th>
                                <th scope="col">credit_card_expiration_date</th>
                                <th scope="col">credit_card_approval_code</th>
                                <th scope="col">payment_plan_options</th>

                                <th scope="col">address_verification_indicator</th>
                                <th scope="col">check_verification_indicator</th>
                                <th scope="col">passenger_number</th>
                                <th scope="col">free_text_data</th>
                                <th scope="col">customer_file_reference</th>
                                <th scope="col">credit_card_customer_order_number</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($forms_of_payments as $forms_of_payment)
                                <tr>
                                    <td>{{ $forms_of_payment->form_of_payment_serial }}</td>
                                    <td>{{ $forms_of_payment->section_label }}</td>
                                    <td>{{ $forms_of_payment->type }}</td>
                                    <td>{{ $forms_of_payment->collected_or_refunded_amount }}</td>
                                    <td>{{ $forms_of_payment->refund_indicator }}</td>
                                    <td>{{ $forms_of_payment->credit_card_code }}</td>
                                    <td>{{ $forms_of_payment->credit_card_number }}</td>
                                    <td>{{ $forms_of_payment->credit_card_expiration_date }}</td>
                                    <td>{{ $forms_of_payment->credit_card_approval_code }}</td>
                                    <td>{{ $forms_of_payment->payment_plan_options }}</td>

                                    <td>{{ $forms_of_payment->address_verification_indicator }}</td>
                                    <td>{{ $forms_of_payment->check_verification_indicator }}</td>
                                    <td>{{ $forms_of_payment->passenger_number }}</td>
                                    <td>{{ $forms_of_payment->free_text_data }}</td>
                                    <td>{{ $forms_of_payment->customer_file_reference }}</td>
                                    <td>{{ $forms_of_payment->credit_card_customer_order_number }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <br><br>

        {{-- Phones --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Phones</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">phone_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">city_code</th>
                                <th scope="col">location_type</th>
                                <th scope="col">free_form_phone_data</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($phones as $phone)
                                <tr>
                                    <td>{{ $phone->phone_serial }}</th>
                                    <td>{{ $phone->section_label }}</th>
                                    <td>{{ $phone->city_code }}</th>
                                    <td>{{ $phone->location_type }}</th>
                                    <td>{{ $phone->free_form_phone_data }}</th>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <br><br>

        {{-- Addresses --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Addresses</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">address_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">address_type</th>
                                <th scope="col">free_form_address_data</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <td>{{ $address->address_serial }}</td>
                                    <td>{{ $address->section_label }}</td>
                                    <td>{{ $address->address_type }}</td>
                                    <td>{{ $address->free_form_address_data }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <br><br>

        {{-- Ticket Remarks --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Ticket Remarks</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">remark_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">free_form_remark</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($ticket_remarks as $ticket_remark)
                                <tr>
                                    <td>{{ $ticket_remark->remark_serial }}</td>
                                    <td>{{ $ticket_remark->section_label }}</td>
                                    <td>{{ $ticket_remark->free_form_remark }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <br><br>

        {{-- Refunds --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Refunds</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">refund_serial</th>
                                <th scope="col">section_label</th>
                                <th scope="col">refund_ticket_number_range</th>
                                <th scope="col">refunded_document_issue_date</th>
                                <th scope="col">invoice_number</th>
                                <th scope="col">passenger_name</th>
                                <th scope="col">crs_derived_indicator</th>

                                <th scope="col">refunded_coupons</th>

                                <th scope="col">original_issue_document_number</th>
                                <th scope="col">original_place_of_issue</th>
                                <th scope="col">original_date_of_issue</th>
                                <th scope="col">original_iata_number</th>

                                <th scope="col">base_or_equivalent_fare_and_taxes_currency_code</th>
                                <th scope="col">original_issue_base_fare_amount</th>
                                <th scope="col">tax1_amount</th>
                                <th scope="col">tax1_code</th>
                                <th scope="col">tax2_amount</th>
                                <th scope="col">tax2_code</th>
                                <th scope="col">tax3_amount</th>
                                <th scope="col">tax3_code</th>

                                <th scope="col">pfc_tax_amounts</th>

                                <th scope="col">individual_tax_details</th>

                                <th scope="col">airline_refund_authority</th>

                                <th scope="col">commission_rate</th>
                                <th scope="col">returned_commission_amount</th>

                                <th scope="col">penalty_fee_amount</th>
                                <th scope="col">commission_percent_on_penalty_fee</th>
                                <th scope="col">commission_amount_on_penalty_fee</th>

                                <th scope="col">cash_fare_amount_used</th>
                                <th scope="col">cash_fare_amount_refundable</th>
                                <th scope="col">credit_fare_amount_used</th>
                                <th scope="col">credit_fare_amount_refundable</th>
                                <th scope="col">refund_amount_currency_code</th>
                                <th scope="col">refund_amount_total_including_taxes</th>

                                <th scope="col">refund_fop1_credit_card_code</th>
                                <th scope="col">refund_fop1_credit_card_number</th>
                                <th scope="col">refund_fop1_credit_card_expiry_date</th>
                                <th scope="col">refund_fop1_refund_amount</th>

                                <th scope="col">refund_fop2_credit_card_code</th>
                                <th scope="col">refund_fop2_credit_card_number</th>
                                <th scope="col">refund_fop2_credit_card_expiry_date</th>
                                <th scope="col">refund_fop2_refund_amount</th>

                                <th scope="col">refund_fop3_credit_card_code</th>
                                <th scope="col">refund_fop3_credit_card_number</th>
                                <th scope="col">refund_fop3_credit_card_expiry_date</th>
                                <th scope="col">refund_fop3_refund_amount</th>

                                <th scope="col">miscellaneous_fee_amount</th>

                                <th scope="col">base_or_equivalent_fare_and_taxes_large_currency_code</th>
                                <th scope="col">original_issue_base_fare_large_currency_amount</th>
                                <th scope="col">tax1_large_currency_amount</th>
                                <th scope="col">tax1_large_currency_code</th>
                                <th scope="col">tax2_large_currency_amount</th>
                                <th scope="col">tax2_large_currency_code</th>
                                <th scope="col">tax3_large_currency_amount</th>
                                <th scope="col">tax3_large_currency_code</th>
                                <th scope="col">refund_waiver_code</th>

                                <th scope="col">cash_fare_amount_large_currency_used</th>
                                <th scope="col">cash_fare_amount_large_currency_refundable</th>
                                <th scope="col">credit_fare_amount_large_currency_used</th>
                                <th scope="col">credit_fare_amount_large_currency_refundable</th>
                                <th scope="col">refund_amount_large_currency_code</th>
                                <th scope="col">refund_large_currency_amount_total_including_taxes</th>

                                <th scope="col">refund_fop1_credit_card_code_large_currency</th>
                                <th scope="col">refund_fop1_credit_card_number_large_currency</th>
                                <th scope="col">refund_fop1_credit_card_expiry_date_large_currency</th>
                                <th scope="col">refund_fop1_refund_large_currency_amount</th>

                                <th scope="col">refund_fop2_credit_card_code_large_currency</th>
                                <th scope="col">refund_fop2_credit_card_number_large_currency</th>
                                <th scope="col">refund_fop2_credit_card_expiry_date_large_currency</th>
                                <th scope="col">refund_fop2_refund_large_currency_amount</th>

                                <th scope="col">refund_fop3_credit_card_code_large_currency</th>
                                <th scope="col">refund_fop3_credit_card_number_large_currency</th>
                                <th scope="col">refund_fop3_credit_card_expiry_date_large_currency</th>
                                <th scope="col">refund_fop3_refund_large_currency_amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($refunds as $refund)
                                <tr>
                                    <td>{{ $refund->refund_serial }}</td>
                                    <td>{{ $refund->section_label }}</td>
                                    <td>{{ $refund->refund_ticket_number_range }}</td>
                                    <td>{{ $refund->refunded_document_issue_date }}</td>
                                    <td>{{ $refund->invoice_number }}</td>
                                    <td>{{ $refund->passenger_name }}</td>
                                    <td>{{ $refund->crs_derived_indicator }}</td>

                                    <td>{{ $refund->refunded_coupons }}</td>

                                    <td>{{ $refund->original_issue_document_number }}</td>
                                    <td>{{ $refund->original_place_of_issue }}</td>
                                    <td>{{ $refund->original_date_of_issue }}</td>
                                    <td>{{ $refund->original_iata_number }}</td>

                                    <td>{{ $refund->base_or_equivalent_fare_and_taxes_currency_code }}</td>
                                    <td>{{ $refund->original_issue_base_fare_amount }}</td>
                                    <td>{{ $refund->tax1_amount }}</td>
                                    <td>{{ $refund->tax1_code }}</td>
                                    <td>{{ $refund->tax2_amount }}</td>
                                    <td>{{ $refund->tax2_code }}</td>
                                    <td>{{ $refund->tax3_amount }}</td>
                                    <td>{{ $refund->tax3_code }}</td>

                                    <td>{{ $refund->pfc_tax_amounts }}</td>

                                    <td>{{ $refund->individual_tax_details }}</td>

                                    <td>{{ $refund->airline_refund_authority }}</td>

                                    <td>{{ $refund->commission_rate }}</td>
                                    <td>{{ $refund->returned_commission_amount }}</td>

                                    <td>{{ $refund->penalty_fee_amount }}</td>
                                    <td>{{ $refund->commission_percent_on_penalty_fee }}</td>
                                    <td>{{ $refund->commission_amount_on_penalty_fee }}</td>

                                    <td>{{ $refund->cash_fare_amount_used }}</td>
                                    <td>{{ $refund->cash_fare_amount_refundable }}</td>
                                    <td>{{ $refund->credit_fare_amount_used }}</td>
                                    <td>{{ $refund->credit_fare_amount_refundable }}</td>
                                    <td>{{ $refund->refund_amount_currency_code }}</td>
                                    <td>{{ $refund->refund_amount_total_including_taxes }}</td>

                                    <td>{{ $refund->refund_fop1_credit_card_code }}</td>
                                    <td>{{ $refund->refund_fop1_credit_card_number }}</td>
                                    <td>{{ $refund->refund_fop1_credit_card_expiry_date }}</td>
                                    <td>{{ $refund->refund_fop1_refund_amount }}</td>

                                    <td>{{ $refund->refund_fop2_credit_card_code }}</td>
                                    <td>{{ $refund->refund_fop2_credit_card_number }}</td>
                                    <td>{{ $refund->refund_fop2_credit_card_expiry_date }}</td>
                                    <td>{{ $refund->refund_fop2_refund_amount }}</td>

                                    <td>{{ $refund->refund_fop3_credit_card_code }}</td>
                                    <td>{{ $refund->refund_fop3_credit_card_number }}</td>
                                    <td>{{ $refund->refund_fop3_credit_card_expiry_date }}</td>
                                    <td>{{ $refund->refund_fop3_refund_amount }}</td>

                                    <td>{{ $refund->miscellaneous_fee_amount }}</td>

                                    <td>{{ $refund->base_or_equivalent_fare_and_taxes_large_currency_code }}</td>
                                    <td>{{ $refund->original_issue_base_fare_large_currency_amount }}</td>
                                    <td>{{ $refund->tax1_large_currency_amount }}</td>
                                    <td>{{ $refund->tax1_large_currency_code }}</td>
                                    <td>{{ $refund->tax2_large_currency_amount }}</td>
                                    <td>{{ $refund->tax2_large_currency_code }}</td>
                                    <td>{{ $refund->tax3_large_currency_amount }}</td>
                                    <td>{{ $refund->tax3_large_currency_code }}</td>
                                    <td>{{ $refund->refund_waiver_code }}</td>

                                    <td>{{ $refund->cash_fare_amount_large_currency_used }}</td>
                                    <td>{{ $refund->cash_fare_amount_large_currency_refundable }}</td>
                                    <td>{{ $refund->credit_fare_amount_large_currency_used }}</td>
                                    <td>{{ $refund->credit_fare_amount_large_currency_refundable }}</td>
                                    <td>{{ $refund->refund_amount_large_currency_code }}</td>
                                    <td>{{ $refund->refund_large_currency_amount_total_including_taxes }}</td>

                                    <td>{{ $refund->refund_fop1_credit_card_code_large_currency }}</td>
                                    <td>{{ $refund->refund_fop1_credit_card_number_large_currency }}</td>
                                    <td>{{ $refund->refund_fop1_credit_card_expiry_date_large_currency }}</td>
                                    <td>{{ $refund->refund_fop1_refund_large_currency_amount }}</td>

                                    <td>{{ $refund->refund_fop2_credit_card_code_large_currency }}</td>
                                    <td>{{ $refund->refund_fop2_credit_card_number_large_currency }}</td>
                                    <td>{{ $refund->refund_fop2_credit_card_expiry_date_large_currency }}</td>
                                    <td>{{ $refund->refund_fop2_refund_large_currency_amount }}</td>

                                    <td>{{ $refund->refund_fop3_credit_card_code_large_currency }}</td>
                                    <td>{{ $refund->refund_fop3_credit_card_number_large_currency }}</td>
                                    <td>{{ $refund->refund_fop3_credit_card_expiry_date_large_currency }}</td>
                                    <td>{{ $refund->refund_fop3_refund_large_currency_amount }}</td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
