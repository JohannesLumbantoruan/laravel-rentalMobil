@extends('layouts.template')

@section('title', 'Selesaikan Transaksi')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center"></h2>
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <form action="/transaksi/selesaikan_transaksi_aksi/{{ $transaksi->transaksi_id }}" method="POST">
                @csrf
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    <a href="{{ route('transaksi') }}" class="btn btn-light btn-outline-dark float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <br>

                    <div class="form-group">
                        <label for="kostumer" class="font-weight-bold">Kostumer</label>
                        <select name="kostumer" class="form-control" disabled>
                            @foreach ($kostumer as $k)
                            <option <?php if ($transaksi->transaksi_kostumer == $k->kostumer_id){echo "selected='selected'";} ?> value="<?php echo $k->kostumer_id; ?>">{{ $k->kostumer_nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mobil" class="font-weight-bold">Mobil</label>
                        <select name="mobil" class="form-control" disabled>
                            @foreach ($mobil as $m)
                            <option <?php if ($transaksi->transaksi_mobil == $m->mobil_id){echo "selected='selected'";} ?> value="<?php echo $m->mobil_id; ?>">{{ $m->mobil_merk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_pinjam" class="font-weight-bold">Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" value="{{ $transaksi->transaksi_tgl_pinjam }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="tgl_kembali" class="font-weight-bold">Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" value="{{ $transaksi->transaksi_tgl_kembali }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="harga" class="font-weight-bold">Harga</label>
                        <input type="text" name="harga" class="form-control" value="{{ $transaksi->transaksi_harga }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="denda" class="font-weight-bold">Harga Denda</label>
                        <input type="text" name="denda" class="form-control" value="{{ $transaksi->transaksi_denda }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="date" class="font-weight-bold">Tanggal Dikembalikan</label>
                        <input type="date" name="date" class="form-control" placeholder="Masukkan tanggal dikembalikan" value="{{ old('date') }}">
                        <span class="text-danger">@error('date') {{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection