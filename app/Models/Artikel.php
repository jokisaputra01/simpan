<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'sub_judul',
        'status',
        'isi_artikel',
        'tanggal_dibuat',
        'dibaca',
        'tag',
        'sub_kategori_id',
    ];

    public function subKategori(){
        return $this->belongsTo(SubKategori::class);
    }

    public function dokumenartikels(){
        return $this->hasMany(DokumenArtikel::class);
    }

}