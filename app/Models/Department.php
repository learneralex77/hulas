<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_np',
        'name', // Keep for backward compatibility
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Accessor for the 'name' attribute to maintain backward compatibility
     */
    public function getNameAttribute()
    {
        return $this->name_en ?? '';
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
