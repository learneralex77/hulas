<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        "name_np",
        'icon',
        'description_en',
        'description_np',

        'slug',
        'display_order',
        'is_published',
        'file',
        'translation_names',
        'translation_icons',
        'translation_descriptions',
        'language_code',
    ];

 

 

    /**
     * Get all the names for this service.
     */
    public function getNames()
    {
        return json_decode($this->translation_names ?: '[]') ?: [];
    }

    /**
     * Get all the icons for this service.
     */
    public function getIcons()
    {
        return json_decode($this->translation_icons ?: '[]') ?: [];
    }

    /**
     * Get all the descriptions for this service.
     */
    public function getDescriptions()
    {
        return json_decode($this->translation_descriptions ?: '[]') ?: [];
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
