@extends('layouts.app')

@section('content')
    <div class="card-6 bg-gray" >
        <div class="card-heading ">
            <h2 class="title">Gestion Pages</h2>
        </div>
        <div class="card-body">
            <div class="container px-5">
        <div class=" shadow rounded-lg d-block d-sm-flex" style="background-color:#a9a9a9">
            <div class="profile-tab-nav border-right ">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="about-tab" data-bs-toggle="pill" href="#about" role="tab" aria-controls="about" aria-selected="true">
                        <img src="{{asset('img/about.png')}}" alt="about" class="me-2" style="width: 25px">
                        About Us
                    </a>
                    <a class="nav-link" id="password-tab" data-bs-toggle="pill" href="#terms" role="tab" aria-controls="terms" aria-selected="false">
                        <img src="{{asset('img/terms.png')}}" alt="terms" class="me-2" style="width: 25px">
                        Terms and conditions
                    </a>
                    <a class="nav-link" id="application-tab" data-bs-toggle="pill" href="#policy" role="tab" aria-controls="policy" aria-selected="false">
                        <img src="{{asset('img/policy.png')}}" alt="policy" class="me-2" style="width: 25px">
                        Privacy and Policy
                    </a>
                </div>
            </div>
            <form action="{{route('Pages.update')}}" method="POST" class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                @csrf
                @method('PATCH')
                @if (session('success'))
                    <div class="alert alert-success">
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
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">About Us</h3>
                    <textarea name="about" id="myTextarea1" class="myTextarea">{{$page->about}}</textarea>
                    <button type="submit" class="btn btn-primary mt-5">Update</button>
                </div>
                <div class="tab-pane fade pt-4" id="terms" role="tabpanel" aria-labelledby="conditions-tab">
                    <h3 class="mb-4">Terms and conditions</h3>

                    <textarea name="terms" id="myTextarea2" class="myTextarea">{{$page->terms}}</textarea>
                <button type="submit" class="btn btn-primary mt-5">Update</button>

                </div>
                <div class="tab-pane fade pt-5" id="policy" role="tabpanel" aria-labelledby="privacy-tab">
                    <h3 class="mb-4">Privacy and Policy</h3>

                    <textarea name="policy" id="myTextarea3" class="myTextarea">{{$page->policy}}</textarea>
                    <button type="submit" class="btn btn-primary mt-5">Update</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
        <script>   tinymce.init({
                   selector: '.myTextarea',
                   width: 700,
                   height: 300 });
        </script>
@endsection
