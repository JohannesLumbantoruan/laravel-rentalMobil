<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    protected $primaryKey = 'mobil_id';
    protected $fillable = [
        'mobil_merk',
        'mobil_plat',
        'mobil_warna',
        'mobil_tahun',
        'mobil_status',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
