<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_en',
        'name_np',
        'short_description_en',
        'short_description_np',
        'link',
        'is_published',
        'display_order',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Get the slider name based on current locale.
     */
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale == 'np' && $this->name_np ? $this->name_np : $this->name_en;
    }

    /**
     * Get the slider short description based on current locale.
     */
    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale == 'np' && $this->short_description_np ? $this->short_description_np : $this->short_description_en;
    }

    /**
     * Scope a query to only include published sliders.
     */
    public function scopeActive($query)
    {
        return $query->where('is_published', 1);
    }

    /**
     * Scope a query to order by display order.
     */
    public function scopeOrderByDisplayOrder($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
} 