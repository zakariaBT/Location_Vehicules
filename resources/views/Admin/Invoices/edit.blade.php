@extends('layouts.app')

@section('content')

     <div class="card-6 bg-gray">
                <div class="card-heading ">
                    <h2 class="title">Editer Facture</h2>
                </div>
                <div class="card-body">
                    <form id="add_agency" action="{{route('invoices.update',$invoice)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-row row">
                            <label class="name">Numero du facture</label>
                            <div class="col-8 col-xl-3">
                            <div class="value  mb-3">
                                <input class="input--style-6 @error('invoice_number')
                                border-2 border-danger
                                @enderror" type="text" name="invoice_number"  value="{{$invoice->invoice_number}}"   >

                            </div>
                        </div>
                        <label class="name">Type du Paiement</label>
                        <div class="col-8 col-xl-3 ">
                            <div class="value mb-3">
                            <select class="select--style-6 @error('payement_method')
                            border-2 border-danger
                            @enderror" name="payement_method">
                            <option disabled="disabled" selected="selected" >Choose option</option>

                            <option hidden selected="selected" >{{$invoice->payement_method}}</option>

                                <option >Espèce</option>
                                <option >chèque</option>
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-row row">
                            <label class="name">TVA %</label>
                            <div class="col-8 col-xl-3">
                            <div class="value me-5 mb-4">
                                <input class="input--style-6 @error('TVA')
                                border-2 border-danger
                                @enderror" type="number" name="TVA"  value="{{$invoice->TVA}}" >
                            </div>
                        </div>
                        <label class="name">Remise %</label>
                        <div class="col-8 col-xl-3">
                            <div class="value">
                                <input class="input--style-6 @error('discount')
                                border-2 border-danger
                                @enderror" type="number" name="discount"  value="{{$invoice->discount}}" >
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary px-3 py-2" type="submit">Enregistrer</button>
                </div>
            </form>
            </div>
@endsection
