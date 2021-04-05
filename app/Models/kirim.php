<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kirim extends Model
{
    use HasFactory;
    protected $table = 'kirim';
    protected $fillable = ['keterangan','transaksi_id','tanggal_sampai','status'];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
}
