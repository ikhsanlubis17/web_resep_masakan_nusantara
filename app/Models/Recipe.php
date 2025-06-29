<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use App\Models\Favorite;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'ingredients',
        'instructions',
        'prep_time',
        'cook_time',
        'servings',
        'difficulty',
        'image',
        'tags',
        'user_id',
        'category_id',
        'status',
        'admin_notes',
        'approved_at',
        'approved_by',
        'views',
        'rating',
        'reviews_count'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rating' => 'decimal:1',
        'views' => 'integer',
        'reviews_count' => 'integer',
        'created_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return '/placeholder.svg?height=300&width=400';
    }

    public function getTotalTimeAttribute()
    {
        return $this->prep_time + $this->cook_time;
    }

    public function getTagsArrayAttribute()
    {
        return $this->tags ? explode(',', $this->tags) : [];
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites()->count();
    }

    public function isFavoritedBy($user)
    {
        if (!$user) return false;
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'draft' => 'secondary',
            'pending' => 'warning',
            'approved' => 'success',
            'rejected' => 'danger',
        ];

        return $badges[$this->status] ?? 'secondary';
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'draft' => 'Draft',
            'pending' => 'Menunggu Persetujuan',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
        ];

        return $texts[$this->status] ?? 'Draft';
    }

    // Calculate average rating from reviews
    public function calculateAverageRating()
    {
        $average = $this->reviews()->avg('rating');
        return $average ? round($average, 1) : 0;
    }

    // Get reviews count
    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }
}