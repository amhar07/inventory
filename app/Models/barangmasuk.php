<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function barang()
    {
        return $this->hasOne(barang::class, 'IDbarang', 'IDbarang');
    }
}