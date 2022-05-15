@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg text-white mb-4">
                    <div class="card-body align-self-center panel fs-3">Clients<span class=" ms-3 badge rounded-pill fs-6 bg-success" >
                        {{$users}}+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class=" text-white stretched-link" href="{{ route('Users.index') }}">View Details</a>
                        <div class=" text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg text-white mb-4">
                    <div class="card-body align-self-center panel fs-3 ">Vehicules<span class=" ms-3 badge rounded-pill fs-6 bg-success" >
                        {{$vehicules}}+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class=" text-white stretched-link" href="{{ route('vehicules.index') }}">View Details</a>
                        <div class=" text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg text-white mb-4">
                    <div class="card-body align-self-center fs-3 panel">Agences<span class=" ms-3 badge rounded-pill fs-6 bg-success" >
                        {{$agencies}}+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class=" text-white stretched-link" href="{{ route('agencies.index') }}">View Details</a>
                        <div class=" text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg text-white mb-4">
                    <div class="card-body align-self-center fs-3 panel">Reservations<span class=" ms-3 badge rounded-pill fs-6 bg-success" >
                            {{$reservations}}+
                            <span class="visually-hidden">unread messages</span>
                          </span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class=" text-white stretched-link" href="{{ route('Reservations.index') }}">View Details</a>
                        <div class=" text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
