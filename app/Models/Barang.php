<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $guarded = [];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_barang');
    }

    public function pembelianDetail()
    {
        return $this->hasMany(PembelianDetail::class, 'id_barang');
    }
}
