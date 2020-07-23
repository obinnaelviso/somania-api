<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PassengersData extends Model
{
    protected $guarded = [];

    public function frequentFlyers() {
        return $this->hasMany(FrequentFlyer::class);
    }

    public function fareValues() {
        return $this->hasMany(FareValue::class);
    }

    public function fareBases() {
        return $this->hasMany(FareBasis::class);
    }

    public function fareConstructions() {
        return $this->hasMany(FareConstruction::class);
    }
}
