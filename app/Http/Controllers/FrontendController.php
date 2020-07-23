<?php

namespace App\Http\Controllers;

use App\Model\FileDetail;
use App\Model\PassengersData;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $file_details = FileDetail::latest()->get();
        return view('select-file', compact('file_details'));
    }

    public function fileData(FileDetail $file_detail) {
        $header = $file_detail->headers;
        $passengers_data = $file_detail->passengersData;
        $airlines_data = $file_detail->airlinesData;
        $other_air_segments = $file_detail->otherAirSegments;
        $forms_of_payments = $file_detail->formsOfPayments;
        $phones = $file_detail->phones;
        $addresses = $file_detail->addresses;
        $ticket_remarks = $file_detail->ticketRemarks;
        $refunds = $file_detail->refunds;
        return view('file-data', compact(
            'header', 'passengers_data', 'airlines_data', 'addresses', 'ticket_remarks',
            'other_air_segments', 'forms_of_payments', 'phones', 'refunds', 'file_detail'));
    }

    public function passengerData(FileDetail $file_detail, PassengersData $passenger_data) {
        $frequent_flyers = $passenger_data->frequentFlyers;
        $fare_values = $passenger_data->fareValues;
        $fare_bases = $passenger_data->fareBases;
        $fare_constructions = $passenger_data->fareConstructions;
        return view('passenger-data', compact('frequent_flyers', 'fare_values', 'fare_bases', 'fare_constructions', 'passenger_data'));
    }
}
