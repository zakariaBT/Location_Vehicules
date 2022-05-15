<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicule_id',
        'invoice_id',
        'start_agency',
        'end_agency',
        'start_date',
        'end_date',
        'Status',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }

    public function start_Agency(){
        return $this->belongsTo(Agency::class,'start_agency');
    }
    public function end_Agency(){
        return $this->belongsTo(Agency::class,'end_agency');
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    public function NumberOfDays(){
        $from = Carbon::parse($this->start_date);
        $to = Carbon::parse($this->end_date);
        return $from->diffInDays($to);
    }
}
