@extends('layouts.app')

@section('content')

    <div class="card-6 bg-gray">
        <div class="card-heading ">
            <h2 class="title">Gestion Reservation</h2>
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
                    <th class="column sorting sorting_desc">Date</th>
                    <th class="column">Nom Client</th>
                    <th class="column">Vehicule</th>
                    <th class="column">Agence de départ</th>
                    <th class="column">Agence d'arrivée</th>
                    <th class="column">Nombre de jours</th>
                    <th class="column">Status</th>
                    <th class="column columnF">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($reservations->count())
                @foreach ($reservations as $reservation )
                    <tr>
                        <td class="column">{{$reservation->created_at}}</td>
                        <td class="column">{{$reservation->user->name}}</td>
                        <td class="column">{{$reservation->vehicule->name}}</td>
                        <td class="column">{{$reservation->start_Agency->name}}</td>
                        <td class="column">{{$reservation->end_Agency->name}}</td>
                        <td class="column">{{$reservation->NumberOfDays()}}</td>
                        @isset($reservation->Status)
                        <td class="column">{{$reservation->Status}}</td>
                        <td class="column columnF">
                            <form class="d-inline" action="{{route('Reservations.edit',$reservation)}}" method="GET" >
                            @csrf
                            <button type="submit" class="btn btn-style"><i class="fas fa-pencil-alt"></i></button>
                            </form>
                            <form  class="d-inline delete_reservation " action="{{route('Reservations.destroy',$reservation)}}" method="POST" >
                                @csrf
                                @method('delete')
                               <button  type="submit" class="btn btn-style" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-times "></i></button>
                            </form>
                        </td>
                        @endisset
                        @empty($reservation->Status)
                        <td class="column">
                            <form  class="d-inline" action="{{route('Reservations.edit',$reservation)}}" method="GET" >
                                @csrf
                                <button type="submit" class="btn rounded-pill btn-success " >Confirmer</button>
                            </form>
                        </td>
                            <td class="column columnF">
                            <form  class="d-inline delete_reservation " action="{{route('Reservations.destroy',$reservation)}}" method="POST" >
                                @csrf
                                @method('delete')
                               <button  type="submit" class="btn btn-style" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-times "></i></button>
                            </form>
                        </td>
                        @endempty
                    </tr>
                    @endforeach
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimez cette Reservation?</h5>
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
