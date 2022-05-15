@extends('layouts.app')

@section('content')

     <div class="card-6 bg-gray">
                <div class="card-heading ">
                    <h2 class="title">Editer Vehicule</h2>
                </div>
                <div class="card-body row">
                    <div class="col">
                    <form id=add_vehicule action="{{route('vehicules.update',$vehicule)}}"  method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                        <div class="form-row row">
                                <label class="name pb-3">Nom Vehicule</label>
                            <div class="value me-5 mb-3">
                                <input class="input--style-6 @error('name')
                                border-2 border-danger
                                @enderror" type="text" name="name" value="{{$vehicule->name}}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <label class="name pb-3">Marque</label>
                            <div class="value me-5 mb-3">
                                <input class="input--style-6 @error('brand')
                                border-2 border-danger
                                @enderror" type="text" name="brand" value="{{$vehicule->brand}}">
                            </div>
                        </div>
                        <div class="form-row row">
                                <label class="name pb-3">Numero Matricule</label>
                            <div class="value me-5 mb-3">
                                <input class="input--style-6 @error('licence_plate')
                                border-2 border-danger
                                @enderror" type="text" name="licence_plate" value="{{$vehicule->licence_plate}}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="name pb-3">Description</div>
                            <div class="value me-5 mb-3">
                                <div class="input-group">
                                    <textarea class="textarea--style-6 @error('description')
                                    border-2 border-danger
                                    @enderror" rows = "5" cols = "60" name = "description">{{$vehicule->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row">
                            <label class="name pb-3">Prix</label>
                            <div class="value me-5  mb-3">
                                <input class="input--style-6 @error('price')
                                border-2 border-danger
                                @enderror" type="text" name="price" value="{{$vehicule->price}}">
                            </div>
                        </div>

                        <div class="form-row row">
                            <label class="name pb-4">Type du Carburant</label>
                            <div class="value me-5 mb-3">
                            <select class="select--style-6 @error('fuel_type')
                            border-2 border-danger
                            @enderror" name="fuel_type" >
                                <option disabled="disabled" >Choose option</option>
                                <option hidden selected="selected" >{{$vehicule->fuel_type}}</option>
                                <option >Diesel</option>
                                <option >Essence</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-row row">
                            <label class="name pb-4">Nombre de Passagers</label>
                            <div class="value me-5 mb-4">
                                <input class="input--style-6 @error('Passengers_number')
                                border-2 border-danger
                                @enderror" type="number" name="Passengers_number" value="{{$vehicule->Passengers_number}}">
                            </div>
                        </div>
                        <div class="form-row row">
                            <label class="name pb-4">Nombre de Valises</label>
                            <div class="value mr-5 mb-4">
                                <input class="input--style-6 @error('bagages_number')
                                border-2 border-danger
                                @enderror" type="number" name="bagages_number" value="{{$vehicule->bagages_number}}">
                            </div>
                        </div>
                    </div>
                        <div class="col p-5">
                            <div class="name my-4 ">Upload Images</div>
                            @foreach ($images as $image )
                            <div class="mb-5">
                            <a id="{{basename($image)}}" href="{{route('image.delete',$vehicule)}}"  class="delete-image " ><i class="fas fa-times fa-1x"></i></a>
                            <br>
                            <img class="img-thumbnail image " src="{{asset('images/'.$vehicule->name.'/'.basename($image))}}" alt={{basename($image)}}>
                            </div>
                            @endforeach
                            <div class="value mt-5">
                                <input id="upload" hidden name="images[]" id="images" type="file" multiple />
                                <label for="upload" class="upload">Ajouter images &plus;</label>
                                <span id="file-chosen" class="ms-3 ">No files chosen</span>
                            </div>
                </div>
                    <div class="card-footer">
                        <button id='submit' class="btn btn-primary px-3 py-2" type="submit">Enregistrer</button>
                    </div>
                </form>
                </div>
            </div>
@endsection
