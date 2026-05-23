<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table = 'pemasukans';
    protected $fillable = ['produk', 'jumlah', 'harga_per_bungkus', 'total', 'tanggal', 'keterangan'];
}
