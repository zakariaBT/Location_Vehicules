<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // public function create(){
    //     return view('Admin.Account.create');
    // }

    public function index(){
        $admin=Admin::get();
        return view('Admin.Account.settings',
    [
        'admin' => $admin->first()
    ]);
    }

    // public function store(Request $request)
    // {
    //     //validation
    //     $this->validate($request , [
    //     'name' => 'required | max:255',
    //     'AdminNumber' => 'max:255',
    //     'address' => 'required ',
    //     ]);

    //     // storing data
    //     Admin::create([
    //         'name' => $request->name ,
    //         'AdminNumber' => $request->AdminNumber,
    //         'address' => $request->address,
    //     ]);

    //     return redirect()->route('agencies.index')->with('success', 'Agence ajouté avec Succès');
    // }


    public function update(Request $request,Admin $admin){

        //validation
        if($request->password){
            $this->validate($request , [
                'old_password' => 'required | max:255',
                'password' => 'required | confirmed   ',
                ]);
                if(Hash::check($request->old_password,$admin->password))
                {
                    // updating data
                    $admin->update([
                        'password' => Hash::make($request->password),
                    ]);
             return redirect()->back()->with('password_success', 'password updated');

                }else{
             return redirect()->back()->with('password_error', 'old password incorrect');
                }
        }
        else{
        $this->validate($request , [
            'first_name' => 'required | max:255',
            'last_name' => 'required | max:255',
            'email' => 'required | max:255',
            'phone_number' => 'required | max:255',
            'company' => 'required | max:255',
            ]);

            // storing data
            $admin->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'company' => $request->company,
            ]);
        }
            return redirect()->route('settings.index')->with('profile_success', 'profil modifié avec Succès');

    }
}
