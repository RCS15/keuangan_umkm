<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemasukan extends Model
{
    protected $table = 'pemasukans';
    protected $fillable = ['produk_id', 'jumlah', 'harga_per_bungkus', 'total', 'tanggal', 'keterangan'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
