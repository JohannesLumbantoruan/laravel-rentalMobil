@extends('layouts.template')

@section('title', 'Tambah Kostumer')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Edit Kostumer</h2>
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="/kostumer/edit_aksi/{{ $kostumer->kostumer_id }}" method="POST">
                    @csrf
                    @method('PUT')
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

                        <a href="{{ route('kostumer') }}" class="btn btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <br>

                        <div class="form-group">
                            <label for="kostumer_nama" class="font-weight-bold">Nama Kostumer</label>
                            <input type="text" name="kostumer_nama" class="form-control" placeholder="Masukkan nama kostumer" value="{{ $kostumer->kostumer_nama }}">
                            <span class="text-danger">@error('kostumer_nama') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="kostumer_alamat" class="font-weight-bold">Alamat Kostumer</label>
                            <input type="text" name="kostumer_alamat" class="form-control" placeholder="Masukkan alamat kostumer" value="{{ $kostumer->kostumer_alamat }}">
                            <span class="text-danger">@error('kostumer_alamat') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="kostumer_jk" class="font-weight-bold">Jenis Kelamin</label>
                            <select name="kostumer_jk" class="form-control">
                                <option value="">- Jenis Kelamin</option>
                                <option <?php if ($kostumer->kostumer_jk == "Laki-laki"){echo "selected='selected'";} echo "$kostumer->kostumer_jk"; ?> value="Laki-laki">Laki-laki</option>
                                <option <?php if ($kostumer->kostumer_jk == "Perempuan"){echo "selected='selected'";} echo "$kostumer->kostumer_jk"; ?> value="Perempuan">Perempuan</option>
                            </select>
                            <span class="text-danger">@error('kostumer_jk') {{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="kostumer_hp" class="font-weight-bold">No. HP Kostumer</label>
                            <input type="text" name="kostumer_hp" class="form-control" placeholder="Masukkan no. hp kostumer" value="{{ $kostumer->kostumer_hp }}">
                            <span class="text-danger">@error('kostumer_hp') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="kostumer_ktp" class="font-weight-bold">No. KTP Kostumer</label>
                            <input type="text" name="kostumer_ktp" class="form-control" placeholder="Masukkan no. ktp kostumer" value="{{ $kostumer->kostumer_ktp }}">
                            <span class="text-danger">@error('kostumer_ktp') {{ $message }} @enderror</span>
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