@extends('layouts.template')

@section('title', 'Daftar Kostumer')

@section('content')
<body>
    @include('navigation')

    <div class="container">
    <h2 class="font-weight-bold text-center">Daftar Kostumer</h2>
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

                <form action="{{ route('cariKostumer') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Cari kostumer" value="{{ old('cari') }}">
                        <button type="submit" class="btn btn-light">
                            <span><i class="fa fa-search"></i></span>
                        </button>
                    </div>
                </form>
                <br>

                <a href="{{ route('tambahKostumer') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Tambah Kostumer</a>
                <br><br>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Nama</th>
                                <th width="8%">Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th width="10%">No. HP</th>
                                <th width="12%">No. KTP</th>
                                <th width="16%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($kostumer as $k)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $k->kostumer_nama }}</td>
                                <td>{{ $k->kostumer_jk }}</td>
                                <td>{{ $k->kostumer_alamat }}</td>
                                <td>{{ $k->kostumer_hp }}</td>
                                <td>{{ $k->kostumer_ktp }}</td>
                                <td>
                                    <a href="/kostumer/edit/{{ $k->kostumer_id }}" class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Edit</a>
                                    <a href="/kostumer/hapus/{{ $k->kostumer_id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p class="text-center">Halaman saat ini: {{ $kostumer->currentPage() }}
                    <br>Total jumlah data: {{ $kostumer->total() }}
                    <br>Data per halaman: {{ $kostumer->perPage() }} <br></p>

                    <div class="d-flex justify-content-center">
                        {{ $kostumer->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection