@extends('layouts.app')

@section('content')
    <div class="card-6 bg-gray">
        <div class="card-heading ">
            <h2 class="title">Gestion Factures</h2>
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
                <th class="column">Numero Fature</th>
                <th class="column">Prix</th>
                <th class="column">TVA %</th>
                <th class="column">Remise% </th>
                <th class="column">Montant total</th>
                <th class="column">Type du Paiement</th>
                <th class="column columnI">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($invoices->count())
                @foreach ($invoices as $invoice )
                <tr>
                    <td class="column">{{$invoice->created_at}}</td>
                    <td class="column">{{$invoice->invoice_number}}</td>
                    <td class="column">{{$invoice->price}}</td>
                    <td class="column">{{$invoice->TVA}}</td>
                    <td class="column">{{$invoice->discount}}</td>
                    <td class="column">{{$invoice->price-($invoice->price*$invoice->TVA/100)-$invoice->discount}}</td>
                    <td class="column">{{$invoice->payement_method}}</td>
                    <td class="column columnI">
                        <form class="d-inline" action="{{route('invoice.print',$invoice)}}" method="GET" >
                            @csrf
                            <button type="submit" class="btn btn-style"><i class="fas fa-print"></i></button>
                        </form>
                        <form class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-style"><i class="fas fa-paper-plane"></i></button>
                            </form>
                            <form class="d-inline" action="{{route('invoices.edit',$invoice)}}" method="GET" >
                                @csrf
                                <button type="submit" class="btn btn-style"><i class="fas fa-pencil-alt"></i></button>
                            </form>
                        <form class="d-inline delete_invoice " action="{{route('invoices.destroy', $invoice)}}" method="POST" >
                             @csrf
                             @method('DELETE')
                            <button type="submit" class="btn btn-style" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-times "></i></button>
                         </form>
                    </td>
                </tr>
                @endforeach
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimez cette Facture?</h5>
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
