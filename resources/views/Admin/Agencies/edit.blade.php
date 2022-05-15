@extends('layouts.app')

@section('content')

     <div class="card-6 bg-gray">
                <div class="card-heading ">
                    <h2 class="title">Editer Agence</h2>
                </div>
                <div class="card-body">
                    <form id="add_agency" action="{{route('agencies.update',$agency)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-row row">
                            <label class="name">Nom Agence</label>
                            <div class="col-8 col-xl-3">
                            <div class="value me-5 mb-3">
                                <input class="input--style-6 @error('name')
                                border-2 border-danger
                                @enderror" type="text" name="name" value="{{$agency->name}}">
                            </div>
                        </div>
                        <label class="name">Numero Agence</label>
                        <div class="col-8 col-xl-3">
                            <div class="value">
                                <input class="input--style-6 @error('AgencyNumber')
                                border-2 border-danger
                                @enderror" type="text" name="AgencyNumber" value="{{$agency->AgencyNumber}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Addresse</div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6 @error('address')
                                border-2 border-danger
                                @enderror" rows = "3" cols = "50" name = "address" >{{$agency->address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary px-3 py-2" type="submit">Enregistrer</button>
                </div>
            </form>
            </div>
@endsection
