<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = ['id_buku', 'id_user', 'tanggal_pinjam', 'jatuh_tempo', 'tanggal_dikembalikan'];
    
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function buku() : BelongsTo
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}