<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name_en',
        'name_np',
        'name', // Keep for backward compatibility
        'image',
        'description_en',
        'description_np',
        'description', // Keep for backward compatibility
        'address_en',
        'address_np',
        'phone_number_en',
        'phone_number_np',
        'email',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    // Team type constants
    const TYPE_MANAGEMENT = 'Management Team';
    const TYPE_BOD = 'BOD';

    /**
     * Accessor for the 'name' attribute to maintain backward compatibility
     */
    public function getNameAttribute()
    {
        return $this->name_en ?? '';
    }

    /**
     * Accessor for the 'description' attribute to maintain backward compatibility
     */
    public function getDescriptionAttribute()
    {
        return $this->description_en ?? '';
    }

    /**
     * Get available team types as array
     */
    public static function getTypes(): array
    {
        return [
            self::TYPE_MANAGEMENT => 'Management Team',
            self::TYPE_BOD => 'Board of Directors (BOD)',
        ];
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
