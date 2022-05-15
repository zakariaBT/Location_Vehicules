<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Invoice;
use App\Models\reservation;
use App\Models\User;
use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(){
        $vehicules=Vehicule::where('car_available','YES')->get();
        $agencies=Agency::get();
        $users=User::get();
        return view('Admin.Reservation.create',
    [
        'vehicules' => $vehicules,
        'agencies' => $agencies,
        'users' => $users,
    ]
    );
    }
    public function index(){

        $Reservations=reservation::with(['user','vehicule','start_agency','end_agency','invoice'])->get();
        return view('Admin.Reservation.show',
    [
        'reservations' => $Reservations
    ]);
    }

    public function store(Request $request)
    {
            //validation
        $this->validate($request , [
            'user_id' => 'required | max:255',
            'vehicule_id' => 'required | max:255',
            'start_agency'  => 'required ',
            'end_agency'  => 'required ',
            'start_date' => 'required',
            'end_date' => 'required',
            ]);

        $from = Carbon::parse($request->start_date);
        $to = Carbon::parse($request->end_date);

    if($request->invoice_number){

        $this->validate($request , [
        'TVA' => 'required',
        'payement_method' => 'required',
        ]);
        // storing data
        Invoice::create([
            'invoice_number' => $request->invoice_number,
            'price' => Vehicule::find($request->vehicule_id)->price*($from->diffInDays($to)),
            'TVA'  => $request->TVA,
            'payement_method' => $request->payement_method,
            'discount' => $request->discount,
            ])->reservation()->create([
            'user_id' => $request->user_id,
            'vehicule_id' =>  $request->vehicule_id,
            'start_agency' =>  $request->start_agency,
            'end_agency'  =>  $request->end_agency,
            'start_date'  =>  $from,
            'end_date'  =>  $to,
            'Status'  =>  'confirmed',
        ]);
    }else{
        reservation::create([
            'user_id' => $request->user_id,
            'vehicule_id' =>  $request->vehicule_id,
            'start_agency' =>  $request->start_agency,
            'end_agency'  =>  $request->end_agency,
            'start_date'  =>  $from,
            'end_date'  =>  $to,
        ]);
    }
        Vehicule::find($request->vehicule_id)->update(['car_available'=>'NO']);
        return redirect()->route('Reservations.index')->with('success', 'Reservation crée avec Succès');
    }

    public function edit(reservation $Reservation){
        $vehicules=Vehicule::get();
        $agencies=Agency::get();
        $users=User::get();
        return view('Admin.Reservation.edit',
    [
        'reservation' => $Reservation,
        'vehicules' => $vehicules,
        'agencies' => $agencies,
        'users' => $users,
    ]
    );
    }

    public function update(Request $request,reservation $Reservation){

        //validation
        $this->validate($request , [
            'user_id' => 'required | max:255',
            'vehicule_id' => 'required | max:255',
            'start_agency'  => 'required ',
            'end_agency'  => 'required ',
            'start_date' => 'required',
            'end_date' => 'required',
            'invoice_number' => 'required',
            'TVA' => 'required',
            'payement_method' => 'required',
            ]);
            $from = Carbon::parse($request->start_date);
            $to = Carbon::parse($request->end_date);
            // storing data
            $Reservation->update([
            'user_id' => $request->user_id,
            'vehicule_id' =>  $request->vehicule_id,
            'start_agency' =>  $request->start_agency,
            'end_agency'  =>  $request->end_agency,
            'start_date'  =>  $from,
            'end_date'  =>  $to,
            'Status'  =>   'confirmed',
            ]);
            if($Reservation->invoice){
            $Reservation->invoice->update([
                'invoice_number' => $request->invoice_number,
                'price' => $Reservation->vehicule->price*($from->diffInDays($to)),
                'TVA'  => $request->TVA,
                'payement_method' => $request->payement_method,
                'discount' => $request->discount,
                ]);
            }else{
                $Reservation->invoice()->associate(
                Invoice::create([
                    'invoice_number' => $request->invoice_number,
                    'price' => $Reservation->vehicule->price*($from->diffInDays($to)),
                    'TVA'  => $request->TVA,
                    'payement_method' => $request->payement_method,
                    'discount' => $request->discount,
                    ])
                )->save();
            }
            return redirect()->route('Reservations.index')->with('success', 'Reservation modifié avec Succès');

    }
    public function destroy(reservation $Reservation){
      //  $Reservation->delete();
        return response()->json(['success'=> 'Reservation supprimé avec Succès']);
    }
}
