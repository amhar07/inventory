<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class barang extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function barangmasuk(){
        return $this->belongsTo(barangmasuk::class, 'IDbarang', 'IDbarang');
    }

    public function bukuinduk(){
        return $this->HasMany(bukuinduk::class, 'IDbarang', 'IDbarang');
    }
}
