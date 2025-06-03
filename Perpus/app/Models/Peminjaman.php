<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Peminjaman extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable =
    [
        'buku_id','anggota_id','pengurus_id','tanggal_pinjam','tanggal_kembali','status'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class,'buku_id','id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class,'anggota_id','id');
    }
    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class,'pengurus_id','id');
    }
}
