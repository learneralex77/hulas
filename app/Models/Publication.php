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
        'short_description',
        'image',
        'content',
        'published_by',
        'is_published',
        'display_order',
        'external_link'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the category that owns the publication.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsEventCategory::class, 'news_event_category_id');
    }
}
