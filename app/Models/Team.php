<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'image',
        'description',
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
