<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $table = 'gudangs';
    protected $primaryKey = 'id_gudang';

    protected $fillable = [
        'nama_gudang',
        'alamat',
        'kapasitas',
        'status',
        'catatan',
    ];

    protected $casts = [
        'kapasitas' => 'decimal:2',
    ];
}