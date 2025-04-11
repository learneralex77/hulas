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
        'tagline_en',
        'tagline_np',
        'description_en',
        'description_np',
        'years_of_experience_en',
        'years_of_experience_np',
        'short_description_en',
        'short_description_np',
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
        'years_of_experience_en' => 'integer',
        'years_of_experience_np' => 'integer',
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];
   
    /**
     * Get the tagline attribute (for backward compatibility)
     */
    public function getTaglineAttribute()
    {
        return $this->tagline_en ?? '';
    }

    /**
     * Get the description attribute (for backward compatibility)
     */
    public function getDescriptionAttribute()
    {
        return $this->description_en ?? '';
    }

    /**
     * Get the years_of_experience attribute (for backward compatibility)
     */
    public function getYearsOfExperienceAttribute()
    {
        return $this->years_of_experience_en ?? 0;
    }

    /**
     * Get the short_description attribute (for backward compatibility)
     */
    public function getShortDescriptionAttribute()
    {
        return $this->short_description_en ?? '';
    }

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
