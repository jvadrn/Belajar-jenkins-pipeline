<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table ="penerbit";
    protected $fillable = [
        'id_penerbit',
        'nama',
        'alamat',
        'kota',
        'telepon',
    ];
}
