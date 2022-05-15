@extends('layouts.app')

@section('content')
     <div class="card-6 bg-gray">
                <div class="card-heading ">
                    @if($reservation->invoice)
                    <h2 class="title">Editer Reservation</h2>
                    @else
                    <h2 class="title">Compléter Reservation</h2>
                    @endif

                </div>
                <div class="card-body">
                    <form id="update_reservation" action="{{route('Reservations.update',$reservation)}}" method="POST" >
                      @csrf
                      @method('PATCH')
                      <div class="form-row row">
                        <label class="name pb-3">Client</label>
                        <div class="col-8 col-xl-3">
                            <div class="value mb-3">
                                <select class="select--style-6 @error('user_id')
                                border-2 border-danger
                                @enderror" name="user_id">
                                <option disabled="disabled" selected="selected" >Choose option</option>
                                @if($users->count())
                                <option hidden selected="selected" value="{{$reservation->user->id}}">{{$reservation->user->name}}</option>
                                    @foreach ($users as $user)
                                     <option value="{{$user->id}}" >{{$user->name}}<span > | {{$user->CIN}}</span></option>
                                    @endforeach
                                    @endif
                                </select>
                                </div>
                        </div>
                            <label class="name pb-3">Vehicule</label>
                            <div class="col-8 col-xl-3">
                            <div class="value mb-3">
                                <select class="select--style-6 @error('vehicule_id')
                                border-2 border-danger
                                @enderror" name="vehicule_id">
                                <option disabled="disabled" selected="selected" >Choose option</option>
                                @if($vehicules->count())
                                <option hidden selected="selected" value="{{$reservation->vehicule->id}}">{{$reservation->vehicule->name}}</option>
                                    @foreach ($vehicules as $vehicule )
                                    <option value="{{$vehicule->id}}" >{{$vehicule->name}}<span> | {{$vehicule->licence_plate}}</span></option>
                                   @endforeach
                                   @endif
                                </select>
                                </div>
                        </div>
                        </div>
                        <div class="form-row">
                            <label class="name">Agence de départ</label>
                            <div class="col-8 col-xl-3">
                                <div class="value mb-3">
                                    <select class="select--style-6 @error('start_agency')
                                    border-2 border-danger
                                    @enderror" name="start_agency">
                                    <option disabled="disabled" selected="selected" >Choose option</option>
                                    @if($agencies->count())
                                    <option hidden selected="selected" value="{{$reservation->start_Agency->id}}" >{{$reservation->start_Agency->name}}</option>
                                        @foreach ($agencies as $agency )
                                        <option value="{{$agency->id}}">{{$agency->name}}</option>
                                       @endforeach
                                       @endif
                                    </select>
                                    </div>
                        </div>
                        <label class="name">Agence d'arrivée</label>
                        <div class="col-8 col-xl-3">
                            <div class="value mb-3">
                                <select class="select--style-6 @error('end_agency')
                                border-2 border-danger
                                @enderror" name="end_agency">
                                    <option disabled="disabled" selected="selected" >Choose option</option>
                                    @if($agencies->count())
                                    <option hidden selected="selected" value="{{$reservation->end_Agency->id}}">{{$reservation->end_Agency->name}}</option>
                                    @foreach ($agencies as $agency )
                                     <option value="{{$agency->id}}">{{$agency->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                </div>
                        </div>
                        </div>
                        <div class="form-row">
                            <label class="name">Date de départ</label>
                            <div class="col-8 col-xl-3">
                                <div class="value  mb-3">
                                    <input class="input--style-6 datetime @error('start_date')
                                    border-2 border-danger
                                    @enderror" type="datetime-local" name="start_date" value="{{strftime('%Y-%m-%dT%H:%M:%S', strtotime($reservation->start_date))}}">
                                </div>
                            </div>
                        <label class="name">Date d'arrivée</label>
                        <div class="col-8 col-xl-3">
                            <div class="value  mb-3">
                                <input class="input--style-6 datetime @error('end_date')
                                border-2 border-danger
                                @enderror" type="datetime-local" name="end_date" value="{{strftime('%Y-%m-%dT%H:%M:%S', strtotime($reservation->end_date))}}">
                            </div>
                        </div>
                        </div>
                        <div class="form-row row">
                            <label class="name">Numero du facture</label>
                            <div class="col-8 col-xl-3">
                            <div class="value  mb-3">
                                <input class="input--style-6 @error('invoice_number')
                                border-2 border-danger
                                @enderror" type="text" name="invoice_number" @isset($reservation->invoice) value="{{$reservation->invoice->invoice_number}}"  @endisset >

                            </div>
                        </div>
                        <label class="name">Type du Paiement</label>
                        <div class="col-8 col-xl-3 ">
                            <div class="value mb-3">
                            <select class="select--style-6 @error('payement_method')
                            border-2 border-danger
                            @enderror" name="payement_method">
                            <option disabled="disabled" selected="selected" >Choose option</option>
                            @isset($reservation->invoice)
                            <option hidden selected="selected" >{{$reservation->invoice->payement_method}}</option>
                            @endisset
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
                                @enderror" type="number" name="TVA" @isset($reservation->invoice) value="{{$reservation->invoice->TVA}}" @endisset>
                            </div>
                        </div>
                        <label class="name">Remise %</label>
                        <div class="col-8 col-xl-3">
                            <div class="value">
                                <input class="input--style-6 @error('discount')
                                border-2 border-danger
                                @enderror" type="number" name="discount" @isset($reservation->invoice) value="{{$reservation->invoice->discount}}" @endisset>
                            </div>
                        </div>
                        </div>
                    <div class="card-footer">
                        <button class="btn btn-primary px-3 py-2" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
@endsection
