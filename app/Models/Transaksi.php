<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = [
        '',
        'tanggal',
        'tanggal',
        'jumlah',
        'total_harga',
    ];

    public function sepatu()
    {
        return $this->belongsTo(sepatus::class, 'sepatu_id', 'id_sepatu');
    }
    public function user()
    {
        return $this->belongsTo(users::class, 'user_id');
    }
}
