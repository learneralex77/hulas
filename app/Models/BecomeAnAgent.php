<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecomeAnAgent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'become_an_agent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title_en',
        'title_np',
        'description_en',
        'description_np',
        'images',
        'display_order',
        'is_published',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'images' => 'array',
        'is_published' => 'boolean',
    ];

    /**
     * Get the title attribute (for backward compatibility)
     */
    public function getTitleAttribute()
    {
        return $this->title_en ?? '';
    }

    /**
     * Get the description attribute (for backward compatibility)
     */
    public function getDescriptionAttribute()
    {
        return $this->description_en ?? '';
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
