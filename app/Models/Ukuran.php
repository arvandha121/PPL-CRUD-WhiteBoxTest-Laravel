<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sepatu;

class Ukuran extends Model
{
    use HasFactory;
    // protected $table='ukuran';
    protected $primaryKey = 'id_ukuran';

    protected $fillable = [
        'id_ukuran',
        'ukuran_sepatu',
    ];
    // public function sepatu()
    // {
    //     return $this->hasMany(Sepatu::class);
    // }
}
