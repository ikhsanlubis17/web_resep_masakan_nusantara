<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'province_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}