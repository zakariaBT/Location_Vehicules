<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\reservation;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index(){
        $vehicules=Vehicule::get()->count();
        $agencies=Agency::get()->count();
        $users=User::get()->count();
        $reservations=reservation::get()->count();
        return view('Admin.dashboard',
    [
        'vehicules' => $vehicules,
        'agencies' => $agencies,
        'users' => $users,
        'reservations' => $reservations,
    ]);

    }
}
