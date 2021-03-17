<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';
    
    public function customer()
    {
        return $this->hasMany(customer::class);
    }
    public function provinsi()
    {
        return $this->belongsTo(provinsi::class);
    }
}
