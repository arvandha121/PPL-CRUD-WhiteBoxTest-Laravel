<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ukuran;

class Sepatu extends Model
{
    protected $primaryKey = 'id_sepatu';
    protected $table = 'sepatus';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'harga',
        'warna',
        'ukuran',
        'gambar',
    ];

    public function checkout()
    {
        return $this->hasMany(checkout::class, 'barang_id', 'id_sepatu');
    }
}
