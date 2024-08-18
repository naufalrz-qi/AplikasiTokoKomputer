<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $primaryKey = 'id_beli';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // Generate UUID saat membuat pembelian baru
        static::creating(function ($model) {
            $model->id_beli = 'p-' . now()->format('dmyHis');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(PembelianDetail::class, 'id_beli', 'id_beli');
    }
}
