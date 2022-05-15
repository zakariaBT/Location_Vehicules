@extends('layouts.app')

@section('content')

    <div class="card-6 bg-gray">
        <div class="card-heading ">
            <h2 class="title">Gestion vehicules</h2>
        </div>
        <div class="card-body">
            <div class="container">
            @if (session('success'))
          <div class="alert alert-success ">
             <strong>{{ session('success') }}</strong>
         </div>
         @endif
         @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif

        <table id="table_id" class="display">
            <thead>
                <tr class="table100-head">
                    <th class="column sorting sorting_desc" aria-sort="descending">Date</th>
                    <th class="column">Numero Matricule</th>
                    <th class="column">Nom</th>
                    <th class="column">Marque</th>
                    <th class="column">Prix</th>
                    <th class="column">Type du Carburant</th>
                    <th class="column">Nombre de passagers</th>
                    <th class="column">Nombre de valises</th>
                    <th class="column columnF">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($vehicules->count())
                    @foreach ($vehicules as $vehicule )
                    <tr>
                        <td class="column">{{$vehicule->updated_at}}</td>
                        <td class="column">{{$vehicule->licence_plate}}</td>
                        <td class="column">{{$vehicule->name}}</td>
                        <td class="column">{{$vehicule->brand}}</td>
                        <td class="column">{{$vehicule->price}}</td>
                        <td class="column">{{$vehicule->fuel_type}}</td>
                        <td class="column">{{$vehicule->Passengers_number}}</td>
                        <td class="column">{{$vehicule->bagages_number}}</td>
                        <td class="column columnF">
                            <form class="d-inline" action="{{route('vehicules.edit',$vehicule)}}" method="GET" >
                            @csrf
                            <button type="submit" class="btn btn-style"><i class="fas fa-pencil-alt"></i></button>
                            </form>
                            <form  class="d-inline delete_vehicule " action="{{route('vehicules.destroy',$vehicule)}}" method="POST" >
                             @csrf
                             @method('delete')
                            <button  type="submit" class="btn btn-style" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-times "></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimez cette vehicule?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                            <button id="close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id='delete' type="button" class="btn btn-danger" data-bs-dismiss="modal">delete</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif
            </tbody>
        </table>

        </div>
     </div>
    </div>

@endsection
