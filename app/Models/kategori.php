<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategori extends Model
{
    use HasFactory;
    
    protected $fillable = ['kategori'];

    public function buku() : BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'kategori_buku', 'id_kategori', 'id_buku');
    }
}