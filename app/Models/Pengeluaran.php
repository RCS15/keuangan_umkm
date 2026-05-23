<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluarans';
    protected $fillable = ['bahan', 'jumlah', 'harga_satuan', 'harga_total', 'tanggal', 'keterangan'];
}
