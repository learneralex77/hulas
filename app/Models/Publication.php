<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_event_category_id',
        'publication_type',
        'title',
        'title_en',
        'title_np',
        'short_description',
        'short_description_en',
        'short_description_np',
        'image',
        'content',
        'content_en',
        'content_np',
        'published_by',
        'is_published',
        'display_order',
        'external_link'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Get the title attribute (for backward compatibility)
     */
    public function getTitleAttribute()
    {
        return $this->title_en ?? '';
    }
    
    /**
     * Get the short_description attribute (for backward compatibility)
     */
    public function getShortDescriptionAttribute()
    {
        return $this->short_description_en ?? '';
    }
    
    /**
     * Get the content attribute (for backward compatibility)
     */
    public function getContentAttribute()
    {
        return $this->content_en ?? '';
    }

    /**
     * Get the category that owns the publication.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsEventCategory::class, 'news_event_category_id');
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
