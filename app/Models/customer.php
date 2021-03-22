<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $table ='customer';

    protected $fillable = ['nama','alamat','uuid','email','username','password','gender','kabupaten_id','provinsi_id','kode_pos','no_telp'];
    
    public function kabupaten()
    {
        return $this->belongsTo(kabupaten::class);
    }
    public function provinsi()
    {
        return $this->belongsTo(provinsi::class);
    }
}
