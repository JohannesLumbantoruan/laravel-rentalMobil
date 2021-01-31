@extends('layouts.template')

@section('title', 'Daftar Transaksi')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Daftar Transaksi</h2>
        <div class="card mt-5">
            <div class="card-body">
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

                <form action="{{ route('cariTransaksi') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Cari transaksi berdasarkan nama kostumer" value="{{ old('cari') }}">
                        <button type="submit" class="btn btn-light">
                            <span><i class="fa fa-search"></i></span>
                        </button>
                    </div>
                </form>
                <br>

                <a href="{{ route('tambahTransaksi') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Tambah Transaksi</a>
                <br><br>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th width="1%">No.</th>
                                <th>Tanggal</th>
                                <th>Kostumer</th>
                                <th>Mobil</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th>Harga</th>
                                <th>Denda/Hari</th>
                                <th>Tgl. Dikembalikan</th>
                                <th>Total Denda</th>
                                <th>Status</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($transaksi as $t)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl)); ?></td>
                                <td>{{ $t->kostumer->kostumer_nama }}</td>
                                <td>{{ $t->mobil->mobil_merk }}</td>
                                <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)); ?></td>
                                <td><?php echo "Rp. ".number_format($t->transaksi_harga); ?></td>
                                <td><?php echo "Rp. ".number_format($t->transaksi_denda); ?></td>
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
                                <td><?php echo "Rp. ".number_format($t->transaksi_totaldenda); ?></td>
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
                                <td>
                                    <?php
                                    if ($t->transaksi_status == "2")
                                    {
                                        echo "-";
                                    }
                                    elseif ($t->transaksi_status == "1")
                                    { ?>
                                        <a href="/transaksi/selesaikan_transaksi/{{ $t->transaksi_id }}" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Transaksi Selesai</a>
                                        <a href="/transaksi/batalkan_transaksi/{{ $t->transaksi_id }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batalkan Transaksi</a>
                                    <?php
                                    } ?>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

                    <div class="d-flex justifiy-content-center">
                        {{ $transaksi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection