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
        'status_aktif',
        'isi_artikel',
        'tanggal_dibuat',
        'dibaca',
        'tag',
        'sub_kategori_id',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];

    public function subKategories(){
        return $this->belongsTo(SubKategori::class);
    }

}
