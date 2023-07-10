<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumenartikel extends Model
{
    use HasFactory;

    protected $fillable = ['nama','file','keterangan','artikel_id'];

    public function artikel(){
        return $this->belongsTo(Artikel::class);
    }
}