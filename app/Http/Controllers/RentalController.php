<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Mobil;
use App\Models\Kostumer;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use PDF;

class RentalController extends Controller
{
    public function mobil()
    {
        $mobil = Mobil::paginate(10);

        return view('mobil.mobil', ['mobil' => $mobil]);
    }

    public function cariMobil(Request $request)
    {
        $cari = $request->cari;
        $mobil = Mobil::where('mobil_merk', 'like', "%".$cari."%")->paginate(10);

        return view('mobil.mobil', ['mobil' => $mobil]);
    }

    public function tambahMobil()
    {
        return view('mobil.tambah_mobil');
    }

    public function tambahMobilAksi(Request $request)
    {
        $messages = [
            'mobil_merk.required'   => 'Merk mobil wajib diisi',
            'mobil_plat.required'   => 'Plat mobil wajib diisi',
            'mobil_warna.required'  => 'Warna mobil wajib diisi',
            'mobil_tahun.required'  => 'Tahun produksi mobil wajib diisi',
            'mobil_status.required' => 'Status mobil wajib diisi',
        ];

        $request->validate([
            'mobil_merk'    => 'required',
            'mobil_plat'    => 'required',
            'mobil_warna'   => 'required',
            'mobil_tahun'   => 'required',
            'mobil_status'  => 'required',
        ], $messages);

        $mobil = new Mobil;
        $mobil->mobil_merk = $request->mobil_merk;
        $mobil->mobil_plat = $request->mobil_plat;
        $mobil->mobil_warna = $request->mobil_warna;
        $mobil->mobil_tahun = $request->mobil_tahun;
        $mobil->mobil_status = $request->mobil_status;
        $simpan = $mobil->save();

        if ($simpan)
        {
            return redirect()->route('mobil')->with('success', 'Mobil berhasil ditambah');
        }
        else
        {
            return back()->with('error', 'Gagal menambah mobil, silahkan coba kembali');
        }
    }

    public function editMobil($id)
    {
        $mobil = Mobil::find($id);

        return view('mobil.edit_mobil', ['mobil' => $mobil]);
    }

    public function editMobilAksi(Request $request, $id)
    {
        $messages = [
            'mobil_merk.required'   => 'Merk mobil wajib diisi',
            'mobil_plat.required'   => 'Plat mobil wajib diisi',
            'mobil_warna.required'  => 'Warna mobil wajib diisi',
            'mobil_tahun.required'  => 'Tahun produksi mobil wajib diisi',
            'mobil_status.required' => 'Status mobil wajib diisi',
        ];

        $request->validate([
            'mobil_merk'    => 'required',
            'mobil_plat'    => 'required',
            'mobil_warna'   => 'required',
            'mobil_tahun'   => 'required',
            'mobil_status'  => 'required',
        ], $messages);

        $mobil = Mobil::find($id);
        $mobil->mobil_merk = $request->mobil_merk;
        $mobil->mobil_plat = $request->mobil_plat;
        $mobil->mobil_warna = $request->mobil_warna;
        $mobil->mobil_tahun = $request->mobil_tahun;
        $mobil->mobil_status = $request->mobil_status;
        $simpan = $mobil->save();

        if ($simpan)
        {
            return redirect()->route('mobil')->with('success', 'Data mobil berhasil diubah');
        }
        else
        {
            return back()->with('error', 'Data mobil gagal diubah, silahkan coba kembali');
        }
    }

    public function hapusMobil($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();

        return redirect()->route('mobil')->with('success', 'Berhasil menghapus mobil');
    }

    public function kostumer()
    {
        $kostumer = Kostumer::paginate(10);

        return view('kostumer.kostumer', ['kostumer' => $kostumer]);
    }

    public function cariKostumer(Request $request)
    {
        $cari = $request->cari;
        $kostumer = Kostumer::where('kostumer_nama', 'like', "%".$cari."%")->paginate(10);

        return view('kostumer.kostumer', ['kostumer' => $kostumer]);
    }

    public function tambahKostumer()
    {
        return view('kostumer.tambah_kostumer');
    }

    public function tambahKostumerAksi(Request $request)
    {
        $messages = [
            'kostumer_nama.required'    => 'Nama kostumer wajib diisi',
            'kostumer_nama.min'         => 'Nama kostumer minimal 4 karakter',
            'kostumer_nama.max'         => 'Nama kostumer maksimal 30 karakter',
            'kostumer_alamat.required'  => 'Alamat kostumer wajib diisi',
            'kostumer_alamat.min'       => 'Alamat kostumer minimal 5 karakter',
            'kostumer_alamat.max'       => 'Alamat kostumer maksimal 50 karakter',
            'kostumer_jk.required'      => 'Pilih jenis keamin',
            'kostumer_hp.required'      => 'No. hp wajib diisi',
            'kostumer_ktp.required'     => 'No. ktp wajib diisi',
        ];

        $request->validate([
            'kostumer_nama'     => 'required|min:4|max:30',
            'kostumer_alamat'   => 'required|min:5|max:50',
            'kostumer_jk'       => 'required',
            'kostumer_hp'       => 'required',
            'kostumer_ktp'      => 'required',
        ], $messages);

        $kostumer = new Kostumer;
        $kostumer->kostumer_nama = $request->kostumer_nama;
        $kostumer->kostumer_alamat = $request->kostumer_alamat;
        $kostumer->kostumer_jk = $request->kostumer_jk;
        $kostumer->kostumer_hp = $request->kostumer_hp;
        $kostumer->kostumer_ktp = $request->kostumer_ktp;
        $simpan = $kostumer->save();

        if ($simpan)
        {
            return redirect()->route('kostumer')->with('success', 'Kostumer berhasil ditambahkan');
        }
        else
        {
            return back()->with('error', 'Gagal menambah kostumer, silahkan coba kembali');
        }
    }

    public function editKostumer($id)
    {
        $kostumer = Kostumer::find($id);

        return view('kostumer.edit_kostumer', ['kostumer' => $kostumer]);
    }

    public function editKostumerAksi(Request $request, $id)
    {
        $messages = [
            'kostumer_nama.required'    => 'Nama kostumer wajib diisi',
            'kostumer_nama.min'         => 'Nama kostumer minimal 4 karakter',
            'kostumer_nama.max'         => 'Nama kostumer maksimal 30 karakter',
            'kostumer_alamat.required'  => 'Alamat kostumer wajib diisi',
            'kostumer_alamat.min'       => 'Alamat kostumer minimal 5 karakter',
            'kostumer_alamat.max'       => 'Alamat kostumer maksimal 50 karakter',
            'kostumer_jk.required'      => 'Pilih jenis keamin',
            'kostumer_hp.required'      => 'No. hp wajib diisi',
            'kostumer_ktp.required'     => 'No. ktp wajib diisi',
        ];

        $request->validate([
            'kostumer_nama'     => 'required|min:4|max:30',
            'kostumer_alamat'   => 'required|min:5|max:50',
            'kostumer_jk'       => 'required',
            'kostumer_hp'       => 'required',
            'kostumer_ktp'      => 'required',
        ], $messages);

        $kostumer = Kostumer::find($id);
        $kostumer->kostumer_nama = $request->kostumer_nama;
        $kostumer->kostumer_alamat = $request->kostumer_alamat;
        $kostumer->kostumer_jk = $request->kostumer_jk;
        $kostumer->kostumer_hp = $request->kostumer_hp;
        $kostumer->kostumer_ktp = $request->kostumer_ktp;
        $simpan = $kostumer->save();

        if ($simpan)
        {
            return redirect()->route('kostumer')->with('success', 'Data kostumer berhasil diubah');
        }
        else
        {
            return back()->with('error', 'Gagal mengubah data kostumer, silahkan coba kembali');
        }
    }

    public function hapusKostumer($id)
    {
        $kostumer = Kostumer::find($id);
        $kostumer->delete();

        return redirect()->route('kostumer')->with('success', 'Kostumer berhasil dihapus');
    }

    public function transaksi()
    {
        $transaksi = Transaksi::paginate(10);

        return view('transaksi.transaksi', ['transaksi' => $transaksi]);
    }

    public function cariTransaksi(Request $request)
    {
        $cari = $request->cari;
        $transaksi = Transaksi::where('transaksi_kostumer', 'like', "%".$cari."%")->paginate(10);

        return view('transaksi.transaksi', ['transaksi' => $transaksi]);
    }

    public function tambahTransaksi()
    {
        $mobil = Mobil::where('mobil_status', '=', 1)->get();
        $kostumer = Kostumer::all();

        return view('transaksi.tambah_transaksi', ['mobil' => $mobil, 'kostumer' => $kostumer]);
    }

    public function tambahTransaksiAksi(Request $request)
    {
        $messages = [
            'kostumer.required'     => 'Kostumer wajib diisi',
            'mobil.required'        => 'Mobil wajib diisi',
            'tgl_pinjam.required'   => 'Tanggal pinjam wajib diisi',
            'tgl_kembali.required'  => 'Tanggal kembali wajib diisi',
            'harga.required'        => 'Harga wajib diisi',
            'denda.required'        => 'Denda wajib diisi',
        ];

        $request->validate([
            'kostumer'      => 'required',
            'mobil'         => 'required',
            'tgl_pinjam'    => 'required',
            'tgl_kembali'   => 'required',
            'harga'         => 'required',
            'denda'         => 'required',
        ], $messages);

        $transaksi = new Transaksi;
        $transaksi->transaksi_karyawan = Auth::guard('admin')->user()->admin_id;
        $transaksi->transaksi_kostumer = $request->kostumer;
        $transaksi->transaksi_mobil = $request->mobil;
        $transaksi->transaksi_tgl_pinjam = $request->tgl_pinjam;
        $transaksi->transaksi_tgl_kembali = $request->tgl_kembali;
        $transaksi->transaksi_harga = $request->harga;
        $transaksi->transaksi_denda = $request->denda;
        $transaksi->transaksi_tgl = date('Y-m-d');
        $transaksi->transaksi_status = 1;
        $simpan = $transaksi->save();

        if ($simpan)
        {
            Mobil::where('mobil_id', '=', $request->mobil)->update(['mobil_status' => 2]);

            return redirect()->route('transaksi')->with('success', 'Transaksi berhasil ditambah');
        }
        else
        {
            return back()->with('error', 'Gagal menambah transaksi, silahkan coba kembali');
        }
    }

    public function batalkanTransaksi($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        Mobil::where('mobil_id', '=', $transaksi->transaksi_mobil)->update(['mobil_status' => 1]);

        return back()->with('success', 'Transaksi berhasil dibatalkan');
    }

    public function selesaikanTransaksi($id)
    {
        $transaksi = Transaksi::find($id);
        $kostumer = Kostumer::all();
        $mobil = Mobil::all();

        return view('transaksi.selesaikan_transaksi', ['transaksi' => $transaksi, 'kostumer' => $kostumer, 'mobil' => $mobil]);
    }

    public function selesaikanTransaksiAksi($id, Request $request)
    {
        $messages = [
            'date.required' => 'Tanggal dikembalikan wajib diisi',
        ];

        $request->validate([
            'date' => 'required',
        ], $messages);

        $transaksi = Transaksi::find($id);

        $bataskembali = strtotime($transaksi->transaksi_tgl_kembali);
        $dikembalikan = strtotime($request->date);
        $selisih = abs(($dikembalikan-$bataskembali)/(60*60*24));
        $total_denda = $transaksi->transaksi_denda*$selisih;

        $transaksi->transaksi_tgldikembalikan = $request->date;
        $transaksi->transaksi_status = 2;
        if ($dikembalikan>$bataskembali)
        {
            $transaksi->transaksi_totaldenda = $total_denda;
        }
        
        $simpan = $transaksi->save();

        if ($simpan)
        {
            Mobil::where('mobil_id', '=', $transaksi->transaksi_mobil)->update(['mobil_status' => 1]);

            return redirect()->route('transaksi')->with('success', 'Transaksi selesai telah diperbaharui');
        }
        else
        {
            return back()->with('error', 'Gagal memperbaharui transaksi selesai, silahkan coba kembali');
        }
    }

    public function laporan()
    {
        return view('transaksi.laporan');
    }

    public function laporanAksi(Request $request)
    {
        $rules = [
            'dari'      => 'required',
            'sampai'    => 'required',
        ];

        Session::put(['dari' => $request->dari, 'sampai' => $request->sampai]);

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $dari = "";
            $sampai = "";
            $transaksi = Transaksi::paginate(10);

            return view('transaksi.laporan_filter', ['transaksi' => $transaksi, 'dari' => $dari, 'sampai' => $sampai]);
        }
        else
        {
            $dari = $request->dari;
            $sampai = $request->sampai;
            $transaksi = Transaksi::whereDate('transaksi_tgl_pinjam', '>=', $dari)->whereDate('transaksi_tgl_kembali', '<=', $sampai)->paginate(10);

            return view('transaksi.laporan_filter', ['transaksi' => $transaksi, 'dari' => $dari, 'sampai' => $sampai]);
        }
    }

    public function printLaporan()
    {
        $dari = Session::get('dari');
        $sampai = Session::get('sampai');

        if ($dari == "" || $sampai == "")
        {
            $transaksi = Transaksi::all();

            return view('transaksi.laporan_print', ['transaksi' => $transaksi, 'dari' => $dari, 'sampai' => $sampai]);
        }
        else
        {
            $transaksi = Transaksi::whereDate('transaksi_tgl_pinjam', '>=', $dari)->whereDate('transaksi_tgl_kembali', '<=', $sampai)->get();

            return view('transaksi.laporan_print', ['transaksi' => $transaksi, 'dari' => $dari, 'sampai' => $sampai]);
        }
    }

    public function pdfLaporan()
    {
        $dari = Session::get('dari');
        $sampai = Session::get('sampai');

        if ($dari == "" || $sampai == "")
        {
            $transaksi = Transaksi::all();

            $pdf = PDF::loadView('transaksi.laporan_pdf', ['transaksi' => $transaksi, 'dari' => $dari, 'sampai' => $sampai]);
            return $pdf->stream();
        }
        else
        {
            $transaksi = Transaksi::whereDate('transaksi_tgl_pinjam', '>=', $dari)->whereDate('transaksi_tgl_kembali', '<=', $sampai)->get();

            $pdf = PDF::loadView('transaksi.laporan_pdf', ['transaksi' => $transaksi, 'dari' => $dari, 'sampai' => $sampai]);
            return $pdf->stream();
        }
    }
}