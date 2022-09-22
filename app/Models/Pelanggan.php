<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table='pelanggan';
    // public function pelanggan()
    // {
    //     return $this->hasMany(User::class);
    // }
}
