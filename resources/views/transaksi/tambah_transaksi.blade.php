@extends('layouts.template')

@section('title', 'Tambah Transaksi')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Daftar Transaksi</h2>
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tambahTransaksiAksi') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="kostumer" class="font-weight-bold">Kostumer</label>
                            <select name="kostumer" class="form-control">
                                <option value="">-Pilih Kostumer</option>
                                @foreach ($kostumer as $k)
                                <option value="<?php echo $k->kostumer_id; ?>">{{ $k->kostumer_nama }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('kostumer') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="mobil" class="font-weight-bold">Mobil</label>
                            <select name="mobil" class="form-control">
                                <option value="">-Pilih Mobil</option>
                                @foreach ($mobil as $m)
                                <option value="<?php echo $m->mobil_id; ?>">{{ $m->mobil_merk }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('mobil') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="tgl_pinjam" class="font-weight-bold">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control" placeholder="Masukkan tanggal pinjam">
                            <span class="text-danger">@error('tgl_pinjam') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kembali" class="font-weight-bold">Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control" placeholder="Masukkan tanggal kembali">
                            <span class="text-danger">@error('tgl_kembali') {{ $message }} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold">Harga</label>
                            <input type="text" name="harga" class="form-control" placeholder="Masukkan harga" value="{{ old('harga') }}">
                            <span class="text-danger">@error('harga') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="denda" class="font-weight-bold">Harga Denda/Hari</label>
                            <input type="text" name="denda" class="form-control" placeholder="Masukkan harga denda" value="{{ old('harga') }}">
                            <span class="text-danger">@error('denda') {{ $message }} @enderror</span>
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