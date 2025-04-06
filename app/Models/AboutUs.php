<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AboutUs extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about_us';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tagline',
        'description',
        'years_of_experience',
        'short_description',
        'video_link',
        'image',
        'mission_vision',
        'is_published',
        'display_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mission_vision' => 'array',
        'years_of_experience' => 'integer',
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];
   
    /**
     * Scope a query to only include active items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_published', 1);
    }

    public function scopeOrderByDisplayOrder(Builder $query): Builder
    {
        return $query->orderBy('display_order', 'ASC');
    }
}
