@extends('layouts.template')

@section('title', 'Filter Laporan Transaksi')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Filter Laporan Transaksi</h2>
        <div class="card mt-5">
            <div class="card-body">
                <form action="{{ route('laporanAksi') }}" method="GET">
                    <div class="form-group">
                        <label for="dari" class="font-weight-bold">Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control" value="{{ $dari }}">
                    </div>

                    <div class="form-group">
                        <label for="sampai" class="font-weight-bold">Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control" value="{{ $sampai }}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Filter">
                    </div>
                </form>
                <br>
                <br>

                <div class="btn-group">
                    <a href="{{ route('pdfLaporan') }}" class="btn btn-danger"><i class="fa fa-file-pdf"></i> Cetak PDF</a>
                    <a href="{{ route('printLaporan') }}" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                </div>
                <br><br>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Tanggal</th>
                                <th>Kostumer</th>
                                <th>Mobil</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th>Harga</th>
                                <th>Denda</th>
                                <th>Tgl. Dikembalikan</th>
                                <th>Total Denda</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($transaksi as $t)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ date('d/m/Y', strtotime($t->transaksi_tgl)) }}</td>
                                <td>{{ $t->kostumer->kostumer_nama }}</td>
                                <td>{{ $t->mobil->mobil_merk }}</td>
                                <td>{{ date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($t->transaksi_tgl_kembali)) }}</td>
                                <td>{{ "Rp. ".number_format($t->transaksi_harga) }}</td>
                                <td>{{ "Rp. ".number_format($t->transaksi_denda) }}</td>
                                <td>
                                    <?php
                                    if ($t->transaksi_tgldikembalikan == "")
                                    {
                                        echo "-";
                                    }
                                    else
                                    {
                                        echo date('d/m/Y', strtotime($t->transaksi_tgldikembalikan));
                                    }
                                    ?>
                                </td>
                                <td>{{ "Rp. ".number_format($t->transaksi_totaldenda) }}</td>
                                <td>
                                    <?php
                                    if ($t->transaksi_status == "1")
                                    {
                                        echo "<span class='badge badge-warning'>Dirental</span>";
                                    }
                                    elseif ($t->transaksi_status == "2")
                                    {
                                        echo "<span class='badge badge-success'>Selesai</span>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection