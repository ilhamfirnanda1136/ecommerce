<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = ['customer_id','produk_id','jumlah_beli','total_harga','status'];

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }
}
