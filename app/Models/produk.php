<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = ['no_produk','merk_id','uuid','nama_produk','spesifikasi','warna','gambar','keterangan','harga','stok'];

    public function merk()
    {
        return $this->belongsTo(merk::class);
    }

    public function banner()
    {
        return $this->hasMany(banner::class);
    }

    public function cart()
    {
        return $this->hasMany(cart::class);
    }
}
