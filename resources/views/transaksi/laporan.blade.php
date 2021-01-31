@extends('layouts.template')

@section('title', 'Laporan Transaksi')

@section('content')
<body>
    @include('navigation');

    <div class="container">
    <h2 class="text-center font-weight-bold">Laporan Transaksi</h2>
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('laporanAksi') }}" method="GET">
                        <div class="form-group">
                            <label for="dari" class="font-weight-bold">Dari Tanggal</label>
                            <input type="date" name="dari" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="sampai" class="font-weight-bold">Sampai Tanggal</label>
                            <input type="date" name="sampai" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Filter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection