<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama','opede_id','jenis_kategori', 'opede_id'];

    public function opede()
    {
        return $this->belongsTo(Opede::class);
    }

    public function subKategories()
    {
        return $this->hasMany(Sub_kategori::class);
    }

    

}
