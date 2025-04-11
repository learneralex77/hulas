<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'menu_id',
        'title_en',
        'title_np',
        'content_en',
        'content_np',
        'image',
        'short_description_en',
        'short_description_np',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the menu that owns the page.
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
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