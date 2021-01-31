<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kostumer extends Model
{
    use HasFactory;

    protected $table = 'kostumer';
    protected $primaryKey = 'kostumer_id';
    protected $fillable = [
        'kostumer_nama',
        'kostumer_alamat',
        'kostumer_jk',
        'kostumer_hp',
        'kostumer_ktp',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
