<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'licence_plate',
        'name',
        'brand',
        'description',
        'Passengers_number',
        'bagages_number',
        'fuel_type',
        'price',
        'car_available',
    ];

    public function reservation(){
        return $this->hasOne(reservation::class);
    }
}
