<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Kostumer;
use App\Models\Mobil;
use App\Models\Transaksi;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::guard('admin')->check())
        {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function postLogin(Request $request)
    {
        $messages = [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ];

        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ], $messages);

        $data = [
            'admin_username'    => $request->username,
            'password'          => $request->password,
        ];

        Auth::guard('admin')->attempt($data);

        if (Auth::guard('admin')->check())
        {
            return redirect()->route('dashboard');
        }
        else
        {
            return back()->with('error', 'Username atau password salah');
        }
    }

    public function dashboard()
    {
        $mobilTotal = Mobil::count();
        $kostumerTotal = Kostumer::count();
        $transaksiTotal = Transaksi::count();
        $transaksiSelesai = Transaksi::where('transaksi_status', '=', '2')->count();
        $mobil = Mobil::paginate(5);
        $kostumer = Kostumer::paginate(5);
        $transaksi = Transaksi::paginate(5);

        return view('dashboard', [
            'mobilTotal' => $mobilTotal,
            'kostumerTotal' => $kostumerTotal,
            'transaksiTotal' => $transaksiTotal,
            'transaksiSelesai' => $transaksiSelesai,
            'mobil' => $mobil,
            'kostumer' => $kostumer,
            'transaksi' => $transaksi,
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('login');
    }

    public function gantiPassword()
    {
        return view('ganti_password');
    }
    public function gantiPasswordAksi(Request $request)
    {
        $messages = [
            'password_baru.required'    => 'Password baru wajib diisi',
            'password_baru.min'         => 'Password baru minimal 4 karakter',
            'password_baru.max'         => 'Password baru maksimal 20 karakter',
            'password_ulang.required'   => 'Ulangi Password',
            'password_ulang.same'       => 'Password tidak sama',
        ];

        $request->validate([
            'password_baru'     => 'required|min:4|max:20',
            'password_ulang'    => 'required|same:password_baru',
        ], $messages);

        $admin = Admin::where('admin_id', '=', Auth::guard('admin')->user()->admin_id)->update(['admin_password' => Hash::make($request->password_ulang)]);

        if ($admin)
        {
            Auth::guard('admin')->logout();

            return redirect()->route('login')->with('success', 'Berhasil mengganti password, silahkan login kembali');
        }
        else
        {
            return back()->with('error', 'Gagal mengganti password, silahkan coba kembali');
        }
    }
}
