<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VehiculeController extends Controller
{
    public function create(){
        return view('Admin.Vehicules.create');
    }

    public function index(){
        $vehicules= Vehicule::get();
        return view('Admin.Vehicules.show',
        [
            'vehicules' => $vehicules
        ]
        );
    }

    public function store(Request $request){
          //validation
          $this->validate($request , [
            'licence_plate' => 'required | max:255',
            'name' => 'required | max:255' ,
            'brand' => 'required | max:255' ,
            'description' => 'required ' ,
            'price' => 'required | max:255' ,
            'Passengers_number' => 'required | max:255' ,
            'bagages_number' => 'required | max:255' ,
            'fuel_type' => 'required ' ,
            'images' => 'required',
            ]);
            // moving uploaded images
            if($request->hasfile('images'))
            {
            if(!File::isDirectory(public_path('images')."/$request->name")){
                $id=1;
                foreach($request->file('images') as $image)
                {
                    $name = $request->name.'_'.$id.'.'.$image->extension();
                    $image->move(public_path('images')."/$request->name", $name);
                    $id++;
                }
            }
            }
            // storing data
            Vehicule::create([
                'licence_plate' => $request->licence_plate,
                'name' => $request->name ,
                'brand' => $request->brand ,
                'description' => $request->description ,
                'price' =>$request->price ,
                'Passengers_number' =>$request->Passengers_number ,
                'bagages_number' =>$request->bagages_number ,
                'fuel_type' => $request->fuel_type ,
                'car_available' => 'YES',
            ]);

            return redirect()->route('vehicules.index')->with('success', 'Vehicule ajouté avec Succès');
    }


    public function edit(Vehicule $vehicule){
        $images=File::glob(public_path("images/$vehicule->name/*"));
        return view('Admin.Vehicules.edit',
        [
            'vehicule' => $vehicule,
            'images' => $images,
        ]
    );

    }


    public function update(Request $request,Vehicule $vehicule){

        $this->validate($request , [
            'licence_plate' => 'required | max:255',
            'name' => 'required | max:255' ,
            'brand' => 'required | max:255' ,
            'description' => 'required ' ,
            'price' => 'required | max:255' ,
            'Passengers_number' => 'required | max:255' ,
            'bagages_number' => 'required | max:255' ,
            'fuel_type' => 'required ' ,
            ]);
            // moving uploaded images
            if($request->name!=$vehicule->name){
                File::moveDirectory(public_path('images')."/{$vehicule->name}",public_path('images')."/{$request->name}");
            }

            if($request->hasfile('images'))
            {
                $id=1;
                foreach($request->file('images') as $image)
                {
                    $name = $request->name.'_'.$id.'.'.$image->extension();
                    $image->move(public_path('images')."/$request->name", $name);
                    $id++;
                }
            }

        $vehicule->update([
            'licence_plate' => $request->licence_plate,
            'name' => $request->name ,
            'brand' => $request->brand ,
            'description' => $request->description ,
            'price' =>$request->price ,
            'Passengers_number' =>$request->Passengers_number ,
            'bagages_number' =>$request->bagages_number ,
            'fuel_type' => $request->fuel_type ,
           ]);

           return redirect()->route('vehicules.index')->with('success', 'Vehicule modifié avec Succès');

    }
    public function destroy(Vehicule $vehicule){
        //$vehicule->delete();
      //  File::delete(public_path('images')."/$vehicule->name");
        return response()->json(['success'=> 'Vehicule supprimé avec Succès']);
    }

    public function deleteImage(Request $request, Vehicule $vehicule){
        foreach($request->images as $image){
        File::delete(public_path('images')."/$vehicule->name/".$image);
        }
        return response('success');
    }
}
