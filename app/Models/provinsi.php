<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    public function kabupaten()
    {
        return $this->hasMany(kabupaten::class);
    }
    public function customer()
    {
        return $this->hasMany(customer::class);
    }
}
