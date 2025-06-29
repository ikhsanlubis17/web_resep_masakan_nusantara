<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\Recipe;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}