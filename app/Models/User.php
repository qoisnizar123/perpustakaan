<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Peminjaman;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['username', 'password', 'no_telepon', 'alamat', 'role_id'];
    protected $attributes = ['role_id' => 2];

    public function role() : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function peminjamans() : HasMany
    {
        return $this->hasMany(Peminjaman::class, 'id_user');
    }
}