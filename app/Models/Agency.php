<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'AgencyNumber',
        'address',
    ];

    public function reservation(){
        return $this->hasOne(reservation::class);
    }
}
