<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'price',
        'TVA',
        'payement_method',
        'discount',
    ];

    public function reservation(){
        return $this->hasOne(reservation::class);
    }
}
