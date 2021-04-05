<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    
    public function cart()
    {
        return $this->belongsToMany(cart::class);
    }

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    public function kirim()
    {
        return $this->hasMany(kirim::class);
    }
}
