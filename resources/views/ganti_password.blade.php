@extends('layouts.template')

@section('title', 'Ganti Password')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Ganti Password</h2>
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('gantiPasswordAksi') }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <input type="password" name="password_baru" class="form-control" placeholder="Password Baru">
                                <span class="text-danger">@error('password_baru') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_ulang" class="form-control" placeholder="Konfirmasi Password">
                                <span class="text-danger">@error('password_ulang') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection