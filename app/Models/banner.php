<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $fillable = ['produk_id','banner_file','keterangan'];

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }
}
