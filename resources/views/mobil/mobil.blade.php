@extends('layouts.template')

@section('title', 'Daftar Mobil')

@section('content')
<body>
    @include('navigation')
    
    <div class="container">
    <h2 class="font-weight-bold text-center">Daftar Mobil</h2>
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
                
                <form action="{{ route('cariMobil') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="cari" class="form-control" placeholder="Cari mobil" value="{{ old('cari') }}">
                        <button type="submit" class="btn btn-light">
                            <span><i class="fa fa-search"></i></span>
                        </button>
                    </div>
                </form>
                <br>
                
                <a href="{{ route('tambahMobil') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Tambah Mobil</a>
                <br><br>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Merk Mobil</th>
                                <th>Plat</th>
                                <th>Warna</th>
                                <th width="8%">Tahun Produksi</th>
                                <th width="8%">Status</th>
                                <th width="16%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($mobil as $m)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $m->mobil_merk }}</td>
                                <td>{{ $m->mobil_plat }}</td>
                                <td>{{ $m->mobil_warna }}</td>
                                <td>{{ $m->mobil_tahun }}</td>
                                <td>
                                    <?php
                                    if ($m->mobil_status == "1")
                                    {
                                        echo "<span class='badge badge-success'>Tersedia</span>";
                                    }
                                    elseif ($m->mobil_status == "2")
                                    {
                                        echo "<span class='badge badge-warning'>Dirental</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ route('editMobil', $m->mobil_id) }}" class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Edit</a>
                                    <a href="/mobil/hapus/{{ $m->mobil_id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p class="text-center">Halaman saat ini: {{ $mobil->currentPage() }} <br>
                    Total jumlah data: {{ $mobil->total() }} <br>
                    Data per halaman: {{ $mobil->perPage() }} <br>
                    </p>

                    <div class="d-flex justify-content-center">
                        {{ $mobil->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection