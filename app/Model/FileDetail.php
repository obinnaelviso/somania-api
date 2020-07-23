<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileDetail extends Model
{
    protected $guarded = [];

    public function headers() {
        return $this->hasMany(Header::class);
    }

    public function passengersData() {
        return $this->hasMany(PassengersData::class);
    }

    public function airlinesData() {
        return $this->hasMany(AirlinesData::class);
    }

    public function otherAirSegments() {
        return $this->hasMany(OtherAirSegment::class);
    }

    public function formsOfPayments() {
        return $this->hasMany(FormsOfPayment::class);
    }

    public function phones() {
        return $this->hasMany(Phone::class);
    }

    public function addresses() {
        return $this->hasMany(Address::class);
    }

    public function ticketRemarks() {
        return $this->hasMany(TicketRemark::class);
    }

    public function refunds() {
        return $this->hasMany(Refund::class);
    }
}
