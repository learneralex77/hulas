<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
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
        'name', // Keep for backward compatibility
        'link',
        'image',
        'is_published',
        'display_order',
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
     * Accessor for the 'name' attribute to maintain backward compatibility
     */
    public function getNameAttribute()
    {
        return $this->name_en ?? '';
    }

    /**
     * Scope a query to only include published popups.
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