<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $primaryKey = 'id_beli';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [ ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembelianDetail()
    {
        return $this->hasMany(PembelianDetail::class, 'id_beli');
    }
}
