<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Print Laporan</title>

    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <style type="text/css">
        h3{
            text-align: center;
        }

        .table-data{
            width: 1px solid black;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td{
            border: 1px solid black;
            font-size: 10pt;
        }
    </style>

    <h3>Laporan Transaksi Rental Mobil</h3>
    <br>
    <table>
        <tr>
            <td>Dari Tanggal</td>
            <td>:</td>
            <td>{{ date('d/m/Y', strtotime($dari)) }}</td>
        </tr>
        <tr>
            <td>Sampai Tanggal</td>
            <td>:</td>
            <td>{{ date('d/m/Y', strtotime($sampai)) }}</td>
        </tr>
    </table>
    <br>

    <table class="table-data">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Kostumer</th>
                <th>Mobil</th>
                <th>Tgl. Rental</th>
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
                <td>{{ $no ++ }}</td>
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
                <td>{{ "Rp ".number_format($t->transaksi_totaldenda) }}</td>
                <td>
                    <?php
                    if ($t->transaksi_status == "1")
                    {
                        echo "Dirental";
                    }
                    elseif ($t->transaksi_status == "2")
                    {
                        echo "Selesai";
                    }
                    ?>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>