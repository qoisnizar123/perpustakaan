<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['kode_buku', 'judul', 'cover'];

    public function kategoris() : BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_buku', 'id_buku', 'id_kategori');
    }

    public function peminjamans() : HasMany
    {
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }
}