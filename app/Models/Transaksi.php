<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $fillable = [
        'transaksi_karyawan',
        'transaksi_kostumer',
        'transaksi_mobil',
        'transaksi_tgl_pinjam',
        'transaksi_tgl_kembali',
        'transaksi_harga',
        'transaksi_denda',
        'transaksi_tgl',
        'transaksi_totaldenda',
        'transaksi_status',
        'transaksi_tgldikembalikan',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'admin_id', 'transaksi_karyawan');
    }

    public function kostumer()
    {
        return $this->hasOne(Kostumer::class, 'kostumer_id', 'transaksi_kostumer');
    }

    public function mobil()
    {
        return $this->hasOne(Mobil::class, 'mobil_id', 'transaksi_mobil');
    }
}
