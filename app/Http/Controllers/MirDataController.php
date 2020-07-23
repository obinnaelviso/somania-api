<?php

namespace App\Http\Controllers;

use App\Http\Requests\MirRequest;
use App\Model\Address;
use App\Model\AirlinesData;
use App\Model\FareBasis;
use App\Model\FareConstruction;
use App\Model\FareValue;
use App\Model\FileDetail;
use App\Model\FormsOfPayment;
use App\Model\FrequentFlyer;
use App\Model\Header;
use App\Model\OtherAirSegment;
use App\Model\PassengersData;
use App\Model\Phone;
use App\Model\Refund;
use App\Model\TicketRemark;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MirDataController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function parseJson(MirRequest $request) {
        // 'http://ec2-13-229-181-76.ap-southeast-1.compute.amazonaws.com/json/sample.json'
        $output_json = json_decode(file_get_contents($request->file_url));
        // $output_json = json_decode(file_get_contents($request->json_url));
        // return $output_json->header->accountingCode;
        // if($output_json != null && !empty($output_json)) {
        //     return $this->storeRefunds($output_json->refunds);
        // // }
        // if($output_json != null && !empty($output_json)) {
        //     foreach($output_json->passengersData as $passengersData) {
        //         return $this->storeFareConstructions($passengersData->fareConstructions);
        //     }
        // }
        /// Array for Logging Progress
        $json_log = [];

        if($output_json != null && !empty($output_json)) {
            $file_detail_id = $this->storeFileDetail($output_json);
            if ($file_detail_id > 0) {

                // Log File Details
                array_push($json_log, ['json_file_name_log' => $output_json->mirFileName]);

                // Store Header;
                array_push($json_log, ['header_log' => $this->errorCodeCheck($this->storeHeader($output_json->header, $file_detail_id))]);

                // Store Passengers Data
                $passengers_data_id = $this->storePassengersData($output_json->passengersData, $file_detail_id);
                // Check if passengers data is valid to store passengers sub arrays
                if ($passengers_data_id > 0) {
                    foreach($output_json->passengersData as $passengersData) {
                        // Log Passengers Data
                        array_push($json_log, ['passengers_data_log'=> $this->errorCodeCheck($passengers_data_id)]);
                        // Store Frequent Flyers
                        array_push($json_log, ['passengers_data_frequent_flyers'=> $this->errorCodeCheck($this->storeFrequentFlyers($passengersData->frequentFlyers, $passengers_data_id))]);
                        // Store Fare Values
                        array_push($json_log, ['passengers_data_fare_balues'=> $this->errorCodeCheck($this->storeFareValues($passengersData->fareValues, $passengers_data_id))]);
                        // Store Fare Bases
                        array_push($json_log, ['passengers_data_fare_bases_log'=> $this->errorCodeCheck($this->storeFareBases($passengersData->fareBases, $passengers_data_id))]);
                        // Store Fare Constructions
                        array_push($json_log, ['passengers_data_fare constructions_log'=> $this->errorCodeCheck($this->storeFareConstructions($passengersData->fareConstructions, $passengers_data_id))]);
                    }
                } else array_push($json_log, ['passengers_data_log'=> $this->errorCodeCheck($passengers_data_id)]);

                // Store Airlines Data
                array_push($json_log, ['airlines_data_log' => $this->errorCodeCheck($this->storeAirlinesData($output_json->airlinesData, $file_detail_id))]);

                // Store Other Air Segments
                array_push($json_log, ['other_air_segments_log'=> $this->errorCodeCheck($this->storeOtherAirSegments($output_json->otherAirSegments, $file_detail_id))]);

                // Store Forms Of Payment
                array_push($json_log, ['forms_of_payments_log'=> $this->errorCodeCheck($this->storeFormsOfPayment($output_json->formsOfPayment, $file_detail_id))]);

                // Store Phones
                array_push($json_log, ['phones_log'=> $this->errorCodeCheck($this->storePhones($output_json->phones, $file_detail_id))]);

                // Store Addresses
                array_push($json_log, ['addresses_log'=> $this->errorCodeCheck($this->storeAddresses($output_json->addresses, $file_detail_id))]);

                // Store Ticket Remarks
                array_push($json_log, ['ticket_remarks_log: '=> $this->errorCodeCheck($this->storeTicketRemarks($output_json->ticketRemarks, $file_detail_id))]);

                // Store Refunds
                array_push($json_log, ['refunds_log'=> $this->errorCodeCheck($this->storeRefunds($output_json->refunds, $file_detail_id))]);

                array_push($json_log, ['status_log'=> 'JSON Data Storage Successful!']);
            } else {

                array_push($json_log, ['status_log'=> 'File Detail JSON empty or NULL!']);
                return response([
                    'status' => 'failed',
                    'message' => 'File Detail JSON empty or NULL!',
                    'log' => $json_log
                ], Response::HTTP_OK);
            }

        } else {
            array_push($json_log, ['status_log'=> 'JSON empty or NULL!']);
            return response([
                'status' => 'failed',
                'message' => 'JSON empty or NULL!',
                'log' => $json_log
            ], Response::HTTP_OK);
        }
        return response([
            'status' => 'success',
            'message' => 'JSON file parsed successfully!',
            'log' => $json_log
        ], Response::HTTP_OK);
        // return $output;
    }

    public function errorCodeCheck(int $error_code) {
        if ($error_code > 0) {
            return "Data Added!";
        }
        else if ($error_code == -1) {
            return "No New Data!";
        } else if($error_code == -2){
            return "No New JSON Data!";
        } else if($error_code == -3){
            return "Invalid File Detail ID!";
        } else {
            return "N/A";
        }
    }

    public function storeFileDetail($json) {
        /**
         * Store @param file_detail json Object in database
         */
        if($json != null || !$json->empty()) {
            $file_detail = FileDetail::where('file_id', $json->id)->first();
            if($file_detail == null) {
                $file_detail = FileDetail::create(
                    ['file_id' => $json->id, 'mir_filename' => $json->mirFileName]
                );
                return $file_detail->id;
            } else return $file_detail->id;
        } else return -2;
    }

    public function storeHeader($json, int $file_detail_id) {
        /**
         * Store @param header json Object in database
         */
        if($file_detail_id > 0) {
            // dd($file_detail);
            if($json != null || !$json->empty()) {
                $header = Header::where('header_id', $json->headerId)->first();
                if($header == null) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $header = $file_detail->headers()->create(
                        [
                            'header_id' => $json->headerId,
                            'transmitting_system' => $json->transmittingSystem,
                            'accounting_code' => $json->accountingCode,
                            'mir_type_indicator' => $json->mirTypeIndicator,
                            'total_record_size' => $json->totalRecordSize,
                            'mir_sequence_number' => $json->mirSequenceNumber,
                            'mir_creation_date_time' => $json->mirCreationDateTime,
                            'issuing_airline_data' => $json->issuingAirlineData,
                            'first_travel_date' => $json->firstTravelDate,
                            'gtids_follow' => $json->gtidsFollow,
                            'booking_agency_account_code' => $json->bookingAgencyAccountCode,
                            'issuing_agency_account_code' => $json->issuingAgencyAccountCode,
                            'agency_account_number' => $json->agencyAccountNumber,
                            'record_locator' => $json->recordLocator,
                            'record_locator_owning_airline' => $json->recordLocatorOwningAirline,
                            'other_crs_code' => $json->otherCrsCode,
                            'auto_manual_indicator' => $json->autoManualIndicator,
                            'booking_agent_sign' => $json->bookingAgentSign,
                            'service_bureau_indicator' => $json->serviceBureauIndicator,
                            'issuing_agent_data' => $json->issuingAgentData,
                            'booking_file_creation_date' => $json->bookingFileCreationDate,
                            'elapsed_booking_file_handling_time' => $json->elapsedBookingFileHandlingTime,
                            'date_last_change_to_booking' => $json->dateLastChangeToBooking,
                            'number_of_changes_to_booking_file' => $json->numberOfChangesToBookingFile,
                            'currency_party_fare' => $json->currencyPartyFare,
                            'party_fare' => $json->partyFare,
                            'number_of_decimals_in_currency' => $json->numberOfDecimalsInCurrency,
                            'currency_taxes_and_comm' => $json->currencyTaxesAndComm,
                            'first_tax_amount' => $json->firstTaxAmount,
                            'first_tax_code' => $json->firstTaxCode,
                            'second_tax_amount' => $json->secondTaxAmount,
                            'second_tax_code' => $json->secondTaxCode,
                            'third_tax_amount' => $json->thirdTaxAmount,
                            'third_tax_code' => $json->thirdTaxCode,
                            'fourth_tax_amount' => $json->fourthTaxAmount,
                            'fourth_tax_code' => $json->fourthTaxCode,
                            'fifth_tax_amount' => $json->fifthTaxAmount,
                            'fifth_tax_code' => $json->fifthTaxCode,
                            'pax_comm_data' => $json->paxCommData,
                            'tour_code' => $json->tourCode,
                            'indicator_bytes' => $json->indicatorBytes,
                            'dual_mir_identifier' => $json->dualMirIdentifier,
                            'sender_target_indicator' => $json->senderTargetIndicator,
                            'pseudo_city_code' => $json->pseudoCityCode,
                            'dual_mir_seq_number' => $json->dualMirSeqNumber,
                            'dual_mir_gtid' => $json->dualMirGtid,
                            'stp_identifier' => $json->stpIdentifier,
                            'host_pseudo_city_code' => $json->hostPseudoCityCode,
                            'home_pseudo_city_code' => $json->homePseudoCityCode,
                            'item_count' => $json->itemCount
                        ]
                    );
                    return $header->id;
                } else return-1;
            } else return -2;
        } else return -3;
    }

    public function storePassengersData($json_array, int $file_detail_id) {
        /**
         * Store @param passengers_data json Object in database
         */
        if($file_detail_id > 0) {
            // dd($json_array);

            if($json_array != null && !empty($json_array)) {
                $db_records = [];
                foreach($json_array as $json) {
                    $passengers_data = PassengersData::where('passenger_serial', $json->passengerSerial)->first();
                    if($passengers_data == null) {
                        array_push($db_records,
                            [
                                'passenger_serial' => $json->passengerSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'passenger_name' => $json->passengerName ?: '',
                                'transaction_number' => $json->transactionNumber ?: '',
                                'ticket_and_invoice_numbers' => $json->ticketAndInvoiceNumbers ?: '',
                                'passenger_identification_code_description' => $json->passengerIdentificationCodeDescription ?: '',
                                'associated_fare_item_number' => $json->associatedFareItemNumber ?: '',
                                'associated_exchange_item_number' => $json->associatedExchangeItemNumber ?: '',
                                'multiple_filed_fares_indicator' => $json->multipleFiledFaresIndicator ?: '',
                                'name_field_remarks' => $json->nameFieldRemarks ?: '',
                                'passenger_title' => $json->passengerTitle ?: '',
                                'passenger_age' => $json->passengerAge ?: '',
                                'passenger_gender' => $json->passengerGender ?: '',
                                'passenger_smoking_preference' => $json->passengerSmokingPreference ?: '',
                                'passenger_citizenship_country_code' => $json->passengerCitizenshipCountryCode ?: '',
                                'passenger_passport_number' => $json->passengerPassportNumber ?: '',
                                'passenger_passport_expiration_date' => $json->passengerPassportExpirationDate ?: '',
                                'stock_control_data' => $json->stockControlData ?: '',
                                'fare_quote_status_code' => $json->fareQuoteStatusCode ?: '',
                                'passenger_expanded_name' => $json->passengerExpandedName ?: '',
                                'pricing_modifier' => $json->pricingModifier ?: '',
                                'purchase_ticket_last_date' => $json->purchaseTicketLastDate ?: '',
                                'category_35_indicator' => $json->category35Indicator ?: '',
                                'ticket_issue_date' => $json->ticketIssueDate,
                            ]
                        );
                    }
                }
                // dd($db_records);
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $passengers_data = $file_detail->passengersData()->createMany($db_records);
                    return $passengers_data->first()->id;
                } else return -1;
            } else return -2;
        } else return -3;
    }

    public function storeAirlinesData($json_array, int $file_detail_id) {
        /**
         * Store @param airlines_data json Object in database
         */
        if($file_detail_id > 0) {
            // dd($json_array);
            if($json_array != null && !empty($json_array)) {
                $db_records = [];
                foreach($json_array as $json) {
                    $airlines_data = AirlinesData::where('airline_data_serial', $json->airlineDataSerial)->first();
                    if($airlines_data == null) {
                        array_push($db_records,
                            [
                                'airline_data_serial' => $json->airlineDataSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'itinerary_index_number' => $json->itineraryIndexNumber ?: '',
                                'airline_code' => $json->airlineCode ?: '',
                                'airline_number' => $json->airlineNumber ?: '',
                                'airline_name' => $json->airlineName ?: '',
                                'flight_number' => $json->flightNumber ?: '',
                                'booked_class' => $json->bookedClass ?: '',
                                'status_code' => $json->statusCode ?: '',
                                'departure_date' => $json->departureDate ?: '',
                                'departure_time' => $json->departureTime ?: '',
                                'arrival_time' => $json->arrivalTime ?: '',
                                'next_day_arrival_indicator' => $json->nextDayArrivalIndicator ?: '',
                                'origin_city_information' => $json->originCityInformation ?: '',
                                'destination_city_information' => $json->destinationCityInformation ?: '',
                                'domestic_international_indicator' => $json->domesticInternationalIndicator ?: '',
                                'seat_indicator' => $json->seatIndicator ?: '',
                                'meal_codes' => $json->mealCodes ?: '',
                                'stopover_indicator' => $json->stopoverIndicator ?: '',
                                'number_of_stops' => $json->numberOfStops ?: '',
                                'baggage_allowance' => $json->baggageAllowance ?: '',
                                'aircraft_type' => $json->aircraftType ?: '',
                                'departure_terminal' => $json->departureTerminal ?: '',
                                'nautical_miles' => $json->nauticalMiles ?: '',
                                'flight_coupon_indicator' => $json->flightCouponIndicator ?: '',
                                'segment_identifier' => $json->segmentIdentifier ?: '',
                                'change_of_guage_data' => $json->changeOfGaugeData ?: '',
                                'group_control_record_locator' => $json->groupControlRecordLocator ?: '',
                                'affiliated_carrier_name' => $json->affiliatedCarrierName ?: '',
                                'frequent_flyer_miles' => $json->frequentFlyerMiles ?: '',
                                'ticketed_indicator' => $json->ticketedIndicator ?: '',
                                'total_journey_time' => $json->totalJourneyTime ?: '',
                                'airline_name_long' => $json->airlineNameLong ?: '',
                                'affiliated_carrier_name_long' => $json->affiliatedCarrierNameLong ?: '',
                                'departure_date_long' => $json->departureDateLong ?: '',
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $airlines_data = $file_detail->airlinesData()->createMany($db_records);
                    return $airlines_data->first()->id;
                } else return -1;
            } else return -2;
        } else return -3;
    }

    public function storeOtherAirSegments($json_array, int $file_detail_id) {
        /**
         * Store @param other_air_segments json Object in database
         */

        if($file_detail_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $other_air_segments = OtherAirSegment::where('other_air_segment_serial', $json->otherAirSegmentSerial)->first();
                    if($other_air_segments == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'other_air_segment_serial' => $json->otherAirSegmentSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'itinerary_index_number' => $json->itineraryIndexNumber ?: '',
                                'airline_code' => $json->airlineCode ?: '',
                                'airline_number' => $json->airlineNumber ?: '',
                                'airline_name' => $json->airlineName ?: '',
                                'flight_number' => $json->flightNumber ?: '',
                                'class_of_service' => $json->classOfService ?: '',
                                'status_code' => $json->statusCode ?: '',
                                'departure_date' => $json->departureDate ?: '',
                                'departure_time' => $json->departureTime ?: '',
                                'arrival_time' => $json->arrivalTime ?: '',
                                'next_day_arrival_indicator' => $json->nextDayArrivalIndicator ?: '',
                                'origin_city_information' => $json->originCityInformation ?: '',
                                'destination_city_information' => $json->destinationCityInformation ?: '',
                                'meal_codes' => $json->mealCodes ?: '',
                                'stopover_indicator' => $json->stopoverIndicator ?: '',
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $other_air_segments = $file_detail->otherAirSegments()->createMany($db_records);
                    return $other_air_segments->first()->id;
                } else return -1;
            } else return -2;
        }
        else return -3;
    }

    public function storeFormsOfPayment($json_array, int $file_detail_id) {
        /**
         * Store @param forms_of_payment json Object in database
         */
        if($file_detail_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $forms_of_payment = FormsOfPayment::where('form_of_payment_serial', $json->formOfPaymentSerial)->first();
                    if($forms_of_payment == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'form_of_payment_serial' => $json->formOfPaymentSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'type' => $json->type ?: '',
                                'collected_or_refunded_amount' => $json->collectedOrRefundedAmount ?: '',
                                'refund_indicator' => $json->refundIndicator ?: '',
                                'credit_card_code' => $json->creditCardCode ?: '',
                                'credit_card_number' => $json->creditCardNumber ?: '',
                                'credit_card_expiration_date' => $json->creditCardExpirationDate ?: '',
                                'credit_card_approval_code' => $json->creditCardApprovalCode ?: '',
                                'payment_plan_options' => $json->paymentPlanOptions ?: '',
                                'address_verification_indicator' => $json->addressVerificationIndicator ?: '',
                                'check_verification_indicator' => $json->checkVerificationIndicator ?: '',
                                'passenger_number' => $json->passengerNumber ?: '',
                                'free_text_data' => $json->freeTextData ?: '',
                                'customer_file_reference' => $json->customerFileReference ?: '',
                                'credit_card_customer_order_number' => $json->creditCardCustomerOrderNumber ?: ''
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $forms_of_payment = $file_detail->formsOfPayments()->createMany($db_records);
                    return $forms_of_payment->first()->id;
                } else return -1;
            } else return -2;
        }
        else return -3;
    }

    public function storePhones($json_array, int $file_detail_id) {
        /**
         * Store @param phone json Object in database
         */
        if($file_detail_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $phone = Phone::where('phone_serial', $json->phoneSerial)->first();
                    if($phone == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'phone_serial' => $json->phoneSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'city_code' => $json->cityCode ?: '',
                                'location_type' => $json->locationType ?: '',
                                'free_form_phone_data' => $json->freeformPhoneData ?: ''
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $phone = $file_detail->phones()->createMany($db_records);
                    return $phone->first()->id;
                } else return -1;
            } else return -2;
        } else return -3;
    }

    public function storeAddresses($json_array, int $file_detail_id) {
        /**
         * Store @param address json Object in database
         */
        if($file_detail_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $address = Address::where('address_serial', $json->addressSerial)->first();
                    if($address == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'address_serial' => $json->addressSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'address_type' => $json->addressType ?: '',
                                'free_form_address_data' => $json->freeformAddressData ?: '',
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $address = $file_detail->addresses()->createMany($db_records);
                    return $address->first()->id;
                } else return -1;
            } else return -2;
        } else -3;
    }

    public function storeTicketRemarks($json_array, int $file_detail_id) {
        /**
         * Store @param ticket_remarks json Object in database
         */
        if($file_detail_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $ticket_remarks = TicketRemark::where('remark_serial', $json->remarkSerial)->first();
                    if($ticket_remarks == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'remark_serial' => $json->remarkSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'free_form_remark' => $json->freeformRemark ?: '',
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $ticket_remarks = $file_detail->ticketRemarks()->createMany($db_records);
                    return $ticket_remarks->first()->id;
                } else return -1;
            } else return -2;
        } else -3;
    }

    public function storeRefunds($json_array, int $file_detail_id) {
        /**
         * Store @param refund json Object in database
         */
        if($file_detail_id > 0) {
            // dd($json_array);
            if($json_array != null && !empty($json_array)) {
                $db_records = [];
                foreach($json_array as $json) {
                    $refund = Refund::where('refund_serial', $json->refundSerial)->first();
                    if($refund == null) {
                        array_push($db_records,
                            [
                                'refund_serial' => $json->refundSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'refund_ticket_number_range' => $json->refundTicketNumberRange ?: '',
                                'refunded_document_issue_date' => $json->refundedDocumentIssueDate ?: '',
                                'invoice_number' => $json->invoiceNumber ?: '',
                                'passenger_name' => $json->passengerName ?: '',
                                'crs_derived_indicator' => $json->crsDerivedIndicator ?: '',

                                'refunded_coupons' => $json->refundedCoupons ?: '',

                                'original_issue_document_number' => $json->originalIssueDocumentNumber ?: '',
                                'original_place_of_issue' => $json->originalPlaceOfIssue ?: '',
                                'original_date_of_issue' => $json->originalDateOfIssue ?: '',
                                'original_iata_number' => $json->originalIataNumber ?: '',

                                'base_or_equivalent_fare_and_taxes_currency_code' => $json->baseOrEquivalentFareAndTaxesCurrencyCode ?: '',
                                'original_issue_base_fare_amount' => $json->originalIssueBaseFareAmount ?: '',
                                'tax1_amount' => $json->tax1Amount ?: '',
                                'tax1_code' => $json->tax1Code ?: '',
                                'tax2_amount' => $json->tax2Amount ?: '',
                                'tax2_code' => $json->tax2Code ?: '',
                                'tax3_amount' => $json->tax3Amount ?: '',
                                'tax3_code' => $json->tax3Code ?: '',

                                'pfc_tax_amounts' => $json->pfcTaxAmounts ?: '',

                                'individual_tax_details' => $json->individualTaxDetails ?: '',

                                'airline_refund_authority' => $json->airlineRefundAuthority ?: '',

                                'commission_rate' => $json->commissionRate ?: '',
                                'returned_commission_amount' => $json->returnedCommissionAmount ?: '',

                                'penalty_fee_amount' => $json->penaltyFeeAmount ?: '',
                                'commission_percent_on_penalty_fee' => $json->commissionPercentOnPenaltyFee ?: '',
                                'commission_amount_on_penalty_fee' => $json->commissionAmountOnPenaltyFee ?: '',

                                'cash_fare_amount_used' => $json->cashFareAmountUsed ?: '',
                                'cash_fare_amount_refundable' => $json->cashFareAmountRefundable ?: '',
                                'credit_fare_amount_used' => $json->creditFareAmountUsed ?: '',
                                'credit_fare_amount_refundable' => $json->creditFareAmountRefundable ?: '',
                                'refund_amount_currency_code' => $json->refundAmountCurrencyCode ?: '',
                                'refund_amount_total_including_taxes' => $json->refundAmountTotalIncludingTaxes ?: '',

                                'refund_fop1_credit_card_code' => $json->refundFop1CreditCardCode ?: '',
                                'refund_fop1_credit_card_number' => $json->refundFop1CreditCardNumber ?: '',
                                'refund_fop1_credit_card_expiry_date' => $json->refundFop1CreditCardExpiryDate ?: '',
                                'refund_fop1_refund_amount' => $json->refundFop1RefundAmount ?: '',

                                'refund_fop2_credit_card_code' => $json->refundFop2CreditCardCode ?: '',
                                'refund_fop2_credit_card_number' => $json->refundFop2CreditCardNumber ?: '',
                                'refund_fop2_credit_card_expiry_date' => $json->refundFop2CreditCardExpiryDate ?: '',
                                'refund_fop2_refund_amount' => $json->refundFop2RefundAmount ?: '',

                                'refund_fop3_credit_card_code' => $json->refundFop3CreditCardCode ?: '',
                                'refund_fop3_credit_card_number' => $json->refundFop3CreditCardNumber ?: '',
                                'refund_fop3_credit_card_expiry_date' => $json->refundFop3CreditCardExpiryDate ?: '',
                                'refund_fop3_refund_amount' => $json->refundFop3RefundAmount ?: '',

                                'miscellaneous_fee_amount' => $json->miscellaneousFeeAmount ?: '',

                                'base_or_equivalent_fare_and_taxes_large_currency_code' => $json->baseOrEquivalentFareAndTaxesLargeCurrencyCode ?: '',
                                'original_issue_base_fare_large_currency_amount' => $json->originalIssueBaseFareLargeCurrencyAmount ?: '',
                                'tax1_large_currency_amount' => $json->tax1LargeCurrencyAmount ?: '',
                                'tax1_large_currency_code' => $json->tax1LargeCurrencyCode ?: '',
                                'tax2_large_currency_amount' => $json->tax2LargeCurrencyAmount ?: '',
                                'tax2_large_currency_code' => $json->tax2LargeCurrencyCode ?: '',
                                'tax3_large_currency_amount' => $json->tax3LargeCurrencyAmount ?: '',
                                'tax3_large_currency_code' => $json->tax3LargeCurrencyCode ?: '',
                                'refund_waiver_code' => $json->refundWaiverCode ?: '',

                                'cash_fare_amount_large_currency_used' => $json->cashFareAmountLargeCurrencyUsed ?: '',
                                'cash_fare_amount_large_currency_refundable' => $json->cashFareAmountLargeCurrencyRefundable ?: '',
                                'credit_fare_amount_large_currency_used' => $json->creditFareAmountLargeCurrencyUsed ?: '',
                                'credit_fare_amount_large_currency_refundable' => $json->creditFareAmountLargeCurrencyRefundable ?: '',
                                'refund_amount_large_currency_code' => $json->refundAmountLargeCurrencyCode ?: '',
                                'refund_large_currency_amount_total_including_taxes' => $json->refundLargeCurrencyAmountTotalIncludingTaxes ?: '',

                                'refund_fop1_credit_card_code_large_currency' => $json->refundFop1CreditCardCodeLargeCurrency ?: '',
                                'refund_fop1_credit_card_number_large_currency' => $json->refundFop1CreditCardNumberLargeCurrency ?: '',
                                'refund_fop1_credit_card_expiry_date_large_currency' => $json->refundFop1CreditCardExpiryDateLargeCurrency ?: '',
                                'refund_fop1_refund_large_currency_amount' => $json->refundFop1RefundLargeCurrencyAmount ?: '',

                                'refund_fop2_credit_card_code_large_currency' => $json->refundFop2CreditCardCodeLargeCurrency ?: '',
                                'refund_fop2_credit_card_number_large_currency' => $json->refundFop2CreditCardNumberLargeCurrency ?: '',
                                'refund_fop2_credit_card_expiry_date_large_currency' => $json->refundFop2CreditCardExpiryDateLargeCurrency ?: '',
                                'refund_fop2_refund_large_currency_amount' => $json->refundFop2RefundLargeCurrencyAmount ?: '',

                                'refund_fop3_credit_card_code_large_currency' => $json->refundFop3CreditCardCodeLargeCurrency ?: '',
                                'refund_fop3_credit_card_number_large_currency' => $json->refundFop3CreditCardNumberLargeCurrency ?: '',
                                'refund_fop3_credit_card_expiry_date_large_currency' => $json->refundFop3CreditCardExpiryDateLargeCurrency ?: '',
                                'refund_fop3_refund_large_currency_amount' => $json->refundFop3RefundLargeCurrencyAmount ?: '',

                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $file_detail = FileDetail::find($file_detail_id);
                    $refund = $file_detail->refunds()->createMany($db_records);
                    return $refund->first()->id;
                } else return -1;
            } else return -2;
        } else -3;
    }

    public function storeFrequentFlyers($json_array, int $passengers_data_id) {
        /**
         * Store @param frequent_flyer json Object in database
         */
        if($passengers_data_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $frequent_flyer = FrequentFlyer::where('frequent_flyer_serial', $json->frequentFlyerSerial)->first();
                    if($frequent_flyer == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'frequent_flyer_serial' => $json->frequentFlyerSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'frequent_flyer_passenger_name' => $json->frequentFlyerPassengerName ?: '',
                                'frequent_flyer_carrier_code' => $json->frequentFlyerCarrierCode ?: '',
                                'frequent_flyer_number' => $json->frequentFlyerNumber ?: '',
                                'cross_accrual_indicator' => $json->crossAccrualIndicator ?: '',
                                'cross_accrual_carrier_list' => $json->crossAccrualCarrierList ?: ''
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $passengers_data = PassengersData::find($passengers_data_id);
                    $frequent_flyer = $passengers_data->frequentFlyers()->createMany($db_records);
                    return $frequent_flyer->first()->id;
                } else return -1;
            } else return -2;
        } else -3;
    }

    public function storeFareValues($json_array, int $passengers_data_id) {
        /**
         * Store @param fare_values json Object in database
         */
        if($passengers_data_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $fare_values = FareValue::where('fare_serial', $json->fareSerial)->first();
                    if($fare_values == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'fare_serial' => $json->fareSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'fare_section_indicator' => $json->fareSectionIndicator ?: '',
                                'base_fare_currency_code' => $json->baseFareCurrencyCode ?: '',
                                'base_fare_amount' => $json->baseFareAmount ?: '',
                                'total_amount_currency_code' => $json->totalAmountCurrencyCode ?: '',
                                'total_amount' => $json->totalAmount ?: '',
                                'equivalent_amount_currency_code' => $json->equivalentAmountCurrencyCode ?: '',
                                'equivalent_amount' => $json->equivalentAmount ?: '',
                                'net_remit_amount' => $json->netRemitAmount ?: '',
                                'taxes_currency_code' => $json->taxesCurrencyCode ?: '',
                                'tax1_amount' => $json->tax1Amount ?: '',
                                'tax1_code' => $json->tax1Code ?: '',
                                'tax2_amount' => $json->tax2Amount ?: '',
                                'tax2_code' => $json->tax2Code ?: '',
                                'tax3_amount' => $json->tax3Amount ?: '',
                                'tax3_code' => $json->tax3Code ?: '',
                                'tax4_amount' => $json->tax4Amount ?: '',
                                'tax4_code' => $json->tax4Code ?: '',
                                'tax5_amount' => $json->tax5Amount ?: '',
                                'tax5_code' => $json->tax5Code ?: '',
                                'xt_tax_details' => $json->xtTaxDetails ?: '',
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $passengers_data = PassengersData::find($passengers_data_id);
                    $fare_values = $passengers_data->fareValues()->createMany($db_records);
                    return $fare_values->first()->id;
                } else return -1;
            } else return -2;
        } else -3;
    }

    public function storeFareBases($json_array, $passengers_data_id) {
        /**
         * Store @param fare_bases json Object in database
         */

        if($passengers_data_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $fare_bases = FareBasis::where('fare_basis_serial', $json->fareBasisSerial)->first();
                    if($fare_bases == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'fare_basis_serial' => $json->fareBasisSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'fare_section_indicator' => $json->fareSectionIndicator ?: '',
                                'itinerary_index_number' => $json->itineraryIndexNumber ?: '',
                                'fare_basis_code' => $json->fareBasisCode ?: '',
                                'segment_value' => $json->segmentValue ?: '',
                                'not_valid_before_date' => $json->notValidBeforeDate ?: '',
                                'not_valid_after_date' => $json->notValidAfterDate ?: '',
                                'segment_ticket_designator' => $json->segmentTicketDesignator ?: '',
                                'complete_fare_basis_code' => $json->completeFareBasisCode ?: '',
                                'endorsement' => $json->endorsement ?: '',
                                'baggage_allowance' => $json->baggageAllowance ?: '',
                                'full_endorsement' => $json->fullEndorsement ?: '',
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $passengers_data = PassengersData::find($passengers_data_id);
                    $fare_bases = $passengers_data->fareBases()->createMany($db_records);
                    return $fare_bases->first()->id;
                } else return -1;
            } else return -2;
        } else return -3;
    }

    public function storeFareConstructions($json_array, $passengers_data_id) {
        /**
         * Store @param fare_construction json Object in database
         */


        if($passengers_data_id > 0) {
            // dd($json_array);
            if($json_array != null || !empty($json_array)) {
                $db_records = [];
                // Loop through json_array
                foreach($json_array as $json) {
                    //Check if data already exist in database
                    $fare_construction = FareConstruction::where('fare_construction_serial', $json->fareConstructionSerial)->first();
                    if($fare_construction == null) {
                        // Push json records to db_records array
                        array_push($db_records,
                            [
                                'fare_construction_serial' => $json->fareConstructionSerial ?: '',
                                'section_label' => $json->sectionLabel ?: '',
                                'fare_section_indicator' => $json->fareSectionIndicator ?: '',
                                'type' => $json->type ?: '',
                                'fare_construction_detail' => $json->fareConstructionDetail ?: '',
                            ]
                        );
                    }
                }
                if(!empty($db_records)) {
                    $passengers_data = PassengersData::find($passengers_data_id);
                    $fare_construction = $passengers_data->fareConstructions()->createMany($db_records);
                    return $fare_construction->first()->id;
                } else return -1;
            } else return -2;
        }
        else return -3;
    }
}
