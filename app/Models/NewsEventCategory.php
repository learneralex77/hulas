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
        'slug',
        'description',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
    
    /**
     * Get the publications for the category.
     */
    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'news_event_category_id');
    }
}
