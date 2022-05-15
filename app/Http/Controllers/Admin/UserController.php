<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create(){
        return view('Admin.Users.create');
    }
    public function index(){

        $Users=User::get();
        return view('Admin.Users.show',
    [
        'Users' => $Users
    ]);
    }

    public function store(Request $request)
    {

        //validation
        $this->validate($request , [
        'CIN' => 'required | max:255',
        'name' => 'required | max:255',
        'phone_number' => 'required | max:255',
        'address' => 'required ',
        'email' => 'required | max:255',
        ]);
        // storing data
        User::create([
            'CIN' => $request->CIN,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' =>$request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('Users.index')->with('success', 'Client ajouté avec Succès');
    }

    public function edit(User $User){
        return view('Admin.Users.edit',
    [
        'User' => $User
    ]
    );
    }

    public function update(Request $request,User $User){

        //validation
        $this->validate($request , [
            'CIN' => 'required | max:255',
            'name' => 'required | max:255',
            'phone_number' => 'required | max:255',
            'address' => 'required ',
            'email' => 'required | max:255',
            ]);
            // storing data
            $User->update([
                'CIN' => $request->CIN,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' =>$request->phone_number,
                'address' => $request->address,
            ]);


            return redirect()->route('Users.index')->with('success', 'Client modifié avec Succès');

    }
    public function destroy(User $User){
       $User->delete();
        return response()->json(['success'=> 'Client supprimé avec Succès']);
    }
}
