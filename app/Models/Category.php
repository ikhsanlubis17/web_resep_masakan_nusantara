<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getRecipesCountAttribute()
    {
        return $this->recipes()->published()->count();
    }
}