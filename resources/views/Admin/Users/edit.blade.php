@extends('layouts.app')

@section('content')

     <div class="card-6 bg-gray">
                <div class="card-heading ">
                    <h2 class="title">Editer Client</h2>
                </div>
                <div class="card-body">
                    <form id="add_user" action="{{route('Users.update',$User)}}" method="POST" >
                      @csrf
                      @method('PATCH')
                      <div class="form-row row">
                        <div class="col">
                            <label class="name pb-3">CIN</label>
                        <div class="value me-5 mb-3">
                            <input class="input--style-6 @error('CIN')
                            border-2 border-danger
                            @enderror" type="text" name="CIN" value="{{$User->CIN}}">
                        </div>
                    </div>
                    <div class="col">
                        <label class="name pb-3">Nom</label>
                        <div class="valueme-5 mb-3">
                            <input class="input--style-6 @error('name')
                            border-2 border-danger
                            @enderror" type="text" name="name" value="{{$User->name}}">
                        </div>
                    </div>
                    <div class="col">
                            <label class="name pb-3">Numero de télephone</label>
                        <div class="value me-5 mb-3">
                            <input class="input--style-6 @error('phone_number')
                            border-2 border-danger
                            @enderror" type="text" name="phone_number" value="{{$User->phone_number}}">
                        </div>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="name pb-3">Addresse</div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6 @error('address')
                                border-2 border-danger
                                @enderror" rows = "5" cols = "80" name = "address" placeholder="Addresse du Client">{{$User->address}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row row">
                        <label class="name">Email</label>
                        <div class="col-8 col-xl-3">
                        <div class="value  mb-3">
                            <input class="input--style-6 @error('email')
                            border-2 border-danger
                            @enderror" type="text" name="email" value="{{$User->email}}">
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary px-3 py-2" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
@endsection
