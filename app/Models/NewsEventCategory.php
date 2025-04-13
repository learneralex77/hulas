<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsEventCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'name_np',
        'image',
        'description',
        'description_en',
        'description_np',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];
    
    /**
     * Get the name attribute (for backward compatibility)
     */
    public function getNameAttribute()
    {
        return $this->name_en ?? '';
    }
    
    /**
     * Get the description attribute (for backward compatibility)
     */
    public function getDescriptionAttribute()
    {
        return $this->description_en ?? '';
    }
    
    /**
     * Get the publications for the category.
     */
    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'news_event_category_id');
    }
    public function scopeActive($query)
    {
        return $query->where('is_published', 1);
    }

    public function scopeOrderByDisplayOrder($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}
