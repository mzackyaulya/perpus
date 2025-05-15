<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';
    protected $primaryKey = 'id';
    public $incrementing = false;  
    protected $keyType = 'string';

    protected $fillable =
    [
        'id','foto','judul','genre','penerbit','tahun','stok'
    ];

    // Buat otomatis generate UUID saat create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
