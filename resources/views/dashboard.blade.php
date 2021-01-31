@extends('layouts.template')

@section('title', 'Dashboard Admin')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="text-center font-weight-bold">Dashboard Admin</h2>
        <div class="row mt-5 text-white">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-primary">
                    <div class="card-header">
                        <h5 class="font-weight-bold">Jumlah Mobil <i class="fa fa-car-side float-right"></i></h5>
                    </div>
                    <div class="card-body">
                        <h1 class="font-weight-bold text-center">{{ $mobilTotal }}</h1>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="{{ route('mobil') }}">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card bg-success">
                    <div class="card-header">
                        <h5 class="font-weight-bold">Jumlah Kostumer <i class="fa fa-users float-right"></i></h5>
                    </div>
                    <div class="card-body">
                        <h1 class="font-weight-bold text-center">{{ $kostumerTotal }}</h1>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="{{ route('kostumer') }}">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h5 class="font-weight-bold">Jumlah Transaksi <i class="fa fa-exchange-alt float-right"></i></h5>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $transaksiTotal }}</h1>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="{{ route('transaksi') }}">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card bg-danger">
                    <div class="card-header">
                        <h5 class="font-weight-bold">Rental Selesai <i class="fa fa-check float-right"></i></h5>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $transaksiSelesai }}</h1>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="{{ route('transaksi') }}">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fa fa-car"></i> Mobil</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($mobil as $m)
                            <ul class="list-group">
                                <li class="list-group-item"> <i class="fa fa-user"></i> {{ $m->mobil_merk }} <?php if ($m->mobil_status == "1"){echo "<span class='badge badge-success float-right'>Tersedia</span>";}elseif ($m->mobil_status == "2"){echo "<span class='badge badge-warning float-right'>Dirental</span>";} ?></li>
                            </ul>
                            @endforeach
                        </div>
                        <div class="text-right">
                            <a href="{{ route('mobil') }}">Lihat semua mobil <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fa fa-user"></i> Kostumer Terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($kostumer as $k)
                                <ul class="list-group">
                                    <li class="list-group-item">
                                    <i class="fa fa-user"></i>{{ $k->kostumer_nama }} <?php if ($k->kostumer_jk == "Laki-laki"){echo "<span class='badge badge-primary float-right'>L</span>";}elseif ($k->kostumer_jk == "Perempuan"){echo "<span class='badge badge-info float-right'>P</span>";} ?></li>
                                </ul>
                            @endforeach
                        </div>
                        <div class="text-right">
                            <a href="{{ route('kostumer') }}">Lihat Semua Kostumer <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fa fa-exchange-alt"></i> Peminjaman Terakhir</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tgl. Transaksi</th>
                                        <th>Tgl. Pinjam</th>
                                        <th>Tgl. Kembali</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $t)
                                    <tr>
                                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl)); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)); ?></td>
                                        <td><?php echo "Rp".number_format($t->transaksi_harga); ?></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('transaksi') }}">Lihat Semua Transaksi <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection