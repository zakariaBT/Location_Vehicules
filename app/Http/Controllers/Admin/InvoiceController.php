<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function index(){
        $invoices = Invoice::get();
        return view('Admin.Invoices.show',
    [
        'invoices' => $invoices
    ]);
    }
    public function edit(Invoice $invoice){
        return view('Admin.Invoices.edit',
    [
        'invoice' => $invoice
    ]);
    }
    public function print(Invoice $invoice){
        return view('Admin.Invoices.print',
    [
        'invoice' => $invoice
    ]);
    }
    public function update(Request $request,Invoice $invoice){

        //validation
        $this->validate($request , [
            'invoice_number' => 'required',
            'TVA' => 'required',
            'payement_method' => 'required',
            ]);

            // storing data
            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'TVA'  => $request->TVA,
                'payement_method' => $request->payement_method,
                'discount' => $request->discount,
            ]);

            return redirect()->route('invoices.index')->with('success', 'Facture modifié avec Succès');

    }
    public function destroy(Invoice $invoice){
      //  $invoice->delete();
        return response()->json(['success'=> 'Facture supprimé avec Succès']);
    }
}
