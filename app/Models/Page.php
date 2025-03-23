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
        'title',
        'content',
        'image',
        'short_description'
    ];

    /**
     * Get the menu that owns the page.
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
} 