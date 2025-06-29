<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang boleh diisi massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
        'is_active'
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut ke tipe data.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Relasi ke resep milik user.
     *
     * @return HasMany
     */
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    /**
     * Relasi ke tabel pivot favorites (data tambahan).
     *
     * @return HasMany
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Relasi belongsToMany ke resep yang difavoritkan user.
     *
     * @return BelongsToMany
     */
    public function favoritedRecipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'favorites');
    }

    /**
     * Relasi review dari user.
     *
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Mengecek apakah user adalah admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    public function approvedRecipes(): HasMany
    {
        return $this->hasMany(Recipe::class, 'approved_by');
    }

    public function scopeUsers($query)
    {
        return $query->where('role', 'user');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Avatar default dari UI Avatars berdasarkan nama.
     */
    public function getAvatarUrlAttribute(): string
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=random';
    }
}