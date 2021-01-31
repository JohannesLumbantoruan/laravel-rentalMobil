@extends('layouts.template')

@section('title', 'Tambah Mobil')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Tambah Mobil</h2>
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tambahMobilAksi') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="mobil_merk" class="font-weight-bold">Merk Mobil</label>
                            <input type="text" name="mobil_merk" class="form-control" placeholder="Masukkan merk mobil" value="{{ old('mobil_merk') }}">
                            <span class="text-danger">@error('mobil_merk') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_plat" class="font-weight-bold">Plat Mobil</label>
                            <input type="text" name="mobil_plat" class="form-control" placeholder="Masukkan plat mobil" value="{{ old('mobil_plat') }}">
                            <span class="text-danger">@error('mobil_plat') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_warna" class="font-weight-bold">Warna Mobil</label>
                            <input type="text" name="mobil_warna" class="form-control" placeholder="Masukkan warna mobil" value="{{ old('mobil_warna') }}">
                            <span class="text-danger">@error('mobil_warna') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_tahun" class="font-weight-bold">Tahun Produksi Mobil</label>
                            <input type="text" name="mobil_tahun" class="form-control" placeholder="Masukkan tahun produksi mobil" value="{{ old('mobil_tahun') }}">
                            <span class="text-danger">@error('mobil_tahun') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_status" class="font-weight-bold">Status</label>
                            <select name="mobil_status" class="form-control">
                                <option value="">- Status Mobil</option>
                                <option value="1">Tersedia</option>
                                <option value="2">Dirental</option>
                            </select>
                            <span class="text-danger">@error('mobil_status') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection