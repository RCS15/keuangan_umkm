<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    protected $table = 'produks';
    protected $fillable = ['nama_produk', 'harga_jual', 'satuan'];

    public function pemasukan(): HasMany
    {
        return $this->hasMany(Pemasukan::class);
    }
}
