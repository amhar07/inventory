<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukuinduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['barang'];

    public function barang(){
        return $this->belongsTo(barang::class,'IDbarang','IDbarang');
    }
}
