@extends('layouts.template')

@section('title', 'Edit Data Mobil')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Edit Data Mobil</h2>
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('editMobilAksi', $mobil->mobil_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-error text-center">
                                {{ Session::get('error') }}
                            </div>
                        @endif

                        <a href="{{ route('mobil') }}" class="btn btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <br>

                        <div class="form-group">
                            <label for="mobil_merk" class="font-weight-bold">Merk Mobil</label>
                            <input type="text" name="mobil_merk"  class="form-control" placeholder="Masukkan merk mobil" value="{{ $mobil->mobil_merk }}">
                            <span class="text-danger">@error('mobil_merk') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_plat" class="font-weight-bold">Plat Mobil</label>
                            <input type="text" name="mobil_plat" class="form-control" placeholder="Masukkan plat mobil" value="{{ $mobil->mobil_plat }}">
                            <span class="text-danger">@error('mobil_plat') {{ @message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_warna" class="font-weight-bold">Warna Mobil</label>
                            <input type="text" name="mobil_warna"  class="form-control" placeholder="Masukkan warna mobil" value="{{ $mobil->mobil_warna }}">
                            <span class="text-danger">@error('mobil_warna') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_tahun" class="font-weight-bold">Tahun Produksi Mobil</label>
                            <input type="text" name="mobil_tahun" class="form-control" placeholder="Masukkan tahun produksi mobil" value="{{ $mobil->mobil_tahun }}">
                            <span class="text-danger">@error('mobil_tahun') {{ @message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil_status" class="font-weight-bold">Status Mobil</label>
                            <select name="mobil_status" class="form-control">
                                <option value="">- Pilih Status</option>
                                <option <?php if ($mobil->mobil_status == "1"){echo "selected='selected'";} echo "$mobil->mobil_tahun"; ?> value="1">Tersedia</option>
                                <option <?php if ($mobil->mobil_status == "2"){echo "selected='selected'";} echo "$mobil->mobil_status"; ?> value="2">Dirental</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection