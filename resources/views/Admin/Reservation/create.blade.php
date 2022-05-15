@extends('layouts.app')

@section('content')

     <div class="card-6 bg-gray">
                <div class="card-heading ">
                    <h2 class="title">Créer Reservation</h2>
                </div>
                <div class="card-body">
                    <form id="add_reservation" action="{{route('Reservations.store')}}" method="POST" >
                      @csrf
                        <div class="form-row row">
                        <label class="name pb-3">Client</label>
                        <div class="col-8 col-xl-3">
                            <div class="value mb-3">
                                <select class="select--style-6 @error('user_id')
                                border-2 border-danger
                                @enderror" name="user_id">
                                    <option disabled="disabled" selected="selected" >Choose option</option>
                                    @if($users->count())
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
                                <div class="value  mb-3" >
                                    <input class="input--style-6 datetime @error('start_date')
                                    border-2 border-danger
                                    @enderror" type="datetime-local" name="start_date">
                                </div>
                            </div>
                        <label class="name">Date d'arrivée</label>
                        <div class="col-8 col-xl-3">
                            <div class="value  mb-3">
                                <input class="input--style-6 datetime @error('end_date')
                                border-2 border-danger
                                @enderror" type="datetime-local" name="end_date">
                            </div>
                        </div>
                        </div>
                        <div class="form-row row">
                            <label class="name">Numero du facture</label>
                            <div class="col-8 col-xl-3">
                            <div class="value  mb-3">
                                <input class="input--style-6 @error('invoice_number')
                                border-2 border-danger
                                @enderror" type="text" name="invoice_number">
                            </div>
                        </div>
                        <label class="name">Type du Paiement</label>
                        <div class="col-8 col-xl-3 ">
                            <div class="value mb-3">
                            <select class="select--style-6 @error('payement_method')
                            border-2 border-danger
                            @enderror" name="payement_method">
                                <option disabled="disabled" selected="selected" >Choose option</option>
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
                                @enderror" type="number" name="TVA">
                            </div>
                        </div>
                        <label class="name">Remise %</label>
                        <div class="col-8 col-xl-3">
                            <div class="value">
                                <input class="input--style-6 @error('discount')
                                border-2 border-danger
                                @enderror" type="number" name="discount">
                            </div>
                        </div>
                        </div>
                    <div class="card-footer">
                        <button class="btn btn-primary px-3 py-2" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
@endsection
