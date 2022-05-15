<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;



    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'company',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

}
