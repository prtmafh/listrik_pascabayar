<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Authenticatable
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'password',
        'nomor_kwh',
        'nama_pelanggan',
        'alamat',
        'id_tarif'
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // public function tarif()
    // {
    //     return $this->belongsTo(Tarif::class, 'id_tarif', 'id_tarif');
    // }
    // public function tagihan()
    // {
    //     return $this->hasMany(Tagihan::class, 'id_pelanggan');
    // }
    // public function pembayaran()
    // {
    //     return $this->hasMany(Pembayaran::class, 'id_pelanggan');
    // }
}
