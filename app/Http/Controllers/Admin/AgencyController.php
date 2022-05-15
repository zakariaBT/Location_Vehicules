<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function create(){
        return view('Admin.Agencies.create');
    }

    public function index(){

        $Agencies=Agency::get();
        return view('Admin.Agencies.show',
    [
        'Agencies' => $Agencies
    ]);
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request , [
        'name' => 'required | max:255',
        'AgencyNumber' => 'max:255',
        'address' => 'required ',
        ]);

        // storing data
        Agency::create([
            'name' => $request->name ,
            'AgencyNumber' => $request->AgencyNumber,
            'address' => $request->address,
        ]);

        return redirect()->route('agencies.index')->with('success', 'Agence ajouté avec Succès');
    }

    public function edit(Agency $agency){
        return view('Admin.Agencies.edit',
    [
        'agency' => $agency
    ]
    );
    }

    public function update(Request $request,Agency $agency){

        //validation
        $this->validate($request , [
            'name' => 'required | max:255',
            'AgencyNumber' => 'max:255',
            'address' => 'required ',
            ]);

            // storing data
            $agency->update([
                'name' => $request->name ,
                'AgencyNumber' => $request->AgencyNumber,
                'address' => $request->address,
            ]);

            return redirect()->route('agencies.index')->with('success', 'Agence modifié avec Succès');

    }
    public function destroy(Agency $agency){
       //$agency->delete();
        return response()->json(['success'=> 'Agence supprimé avec Succès']);
    }
}
