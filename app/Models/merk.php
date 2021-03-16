<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
    use HasFactory;

    protected $table ="merk";

    protected $fillable = ['nama_merk'];

    public function produk()
    {
        return $this->hasMany(produk::class);
    }
}
