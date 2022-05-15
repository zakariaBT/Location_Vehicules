@extends('layouts.app')

@section('content')

     <div class="card-6 bg-gray">
                <div class="card-heading ">
                    <h2 class="title">Ajouter Vehicule</h2>
                </div>
                <div class="card-body">
                    <form id=add_vehicule action="{{route('vehicules.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-row row">
                            <div class="col">
                                <label class="name pb-3">Nom Vehicule</label>
                            <div class="value me-5 mb-3">
                                <input class="input--style-6 @error('name')
                                border-2 border-danger
                                @enderror" type="text" name="name">
                            </div>
                        </div>
                        <div class="col">
                            <label class="name pb-3">Marque</label>
                            <div class="valueme-5 mb-3">
                                <input class="input--style-6 @error('brand')
                                border-2 border-danger
                                @enderror" type="text" name="brand">
                            </div>
                        </div>
                        <div class="col">
                                <label class="name pb-3">Numero Matricule</label>
                            <div class="value me-5 mb-3">
                                <input class="input--style-6 @error('licence_plate')
                                border-2 border-danger
                                @enderror" type="text" name="licence_plate">
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="name pb-3">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6 @error('description')
                                    border-2 border-danger
                                    @enderror" rows = "5" cols = "80" name = "description" placeholder="description du vehicule"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row">
                            <label class="name">Prix</label>
                            <div class="col-8 col-xl-3">
                            <div class="value  mb-3">
                                <input class="input--style-6 @error('price')
                                border-2 border-danger
                                @enderror" type="text" name="price">
                            </div>
                        </div>
                        <label class="name">Type du Carburant</label>
                        <div class="col-8 col-xl-3 ">
                            <div class="value mb-3">
                            <select class="select--style-6 @error('fuel_type')
                            border-2 border-danger
                            @enderror" name="fuel_type">
                                <option disabled="disabled" selected="selected" >Choose option</option>
                                <option >Diesel</option>
                                <option >Essence</option>
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-row row">
                            <label class="name">Nombre de Passagers</label>
                            <div class="col-8 col-xl-3">
                            <div class="value me-5 mb-4">
                                <input class="input--style-6 @error('Passengers_number')
                                border-2 border-danger
                                @enderror" type="number" name="Passengers_number">
                            </div>
                        </div>
                        <label class="name">Nombre de Valises</label>
                        <div class="col-8 col-xl-3">
                            <div class="value">
                                <input class="input--style-6 @error('bagages_number')
                                border-2 border-danger
                                @enderror" type="number" name="bagages_number">
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload Images</div>
                            <div class="value">
                                <input class="form-control form-control-md @error('images')
                                border-2 border-danger
                                @enderror " name="images[]" id="images" type="file" multiple />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary px-3 py-2" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
@endsection
