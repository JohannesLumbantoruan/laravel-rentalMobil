@extends('layouts.template')

@section('title', 'Login Rental Mobil')

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px">
            <div class="col-md-4">
                    <h2 class="font-weight-bold text-center">APLIKASI RENTAL MOBIL</h2>
                <br>

                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger text-center">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold text-center">LOGIN</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('loginAksi') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                                <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection