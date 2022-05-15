<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        $page=Page::get();
        return view('Admin.Pages',
    [
        'page' => $page->first()
    ]);
    }

    public function update(Request $request){

            // storing data
            Page::first()->update([
                'about' => $request->about ,
                'terms' => $request->terms ,
                'policy' => $request->policy ,
            ]);

            return redirect()->route('Pages.index')->with('success', 'Page modifié avec Succès');

    }

}
