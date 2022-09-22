<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;
    protected $table = 'checkout';
    protected $primaryKey = 'id_checkout';
    public $timestamps = false;


    public function sepatu()
    {
        return $this->belongsTo(Sepatu::class, 'barang_id', 'id_sepatu');
    }
}
