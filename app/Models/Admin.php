<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_nama',
        'admin_username',
        'admin_password',
    ];

    protected $hidden = [
        'admin_password',
    ];

    public function getAuthPassword()
    {
        return $this->admin_password;
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
