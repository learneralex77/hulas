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
        'external_link',
        'language_code',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get all the names for this service.
     */
    public function getNames()
    {
        return json_decode($this->translation_names, true) ?? [];
    }

    /**
     * Get all the icons for this service.
     */
    public function getIcons()
    {
        return json_decode($this->translation_icons, true) ?? [];
    }

    /**
     * Get all the descriptions for this service.
     */
    public function getDescriptions()
    {
        return json_decode($this->translation_descriptions, true) ?? [];
    }

    /**
     * Get all the external links for this service.
     */
    public function getExternalLinks()
    {
        return json_decode($this->external_link, true) ?? [];
    }

    /**
     * Get the translation_names attribute with JSON decoding
     */
    public function getTranslationNamesAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    /**
     * Get the translation_icons attribute with JSON decoding
     */
    public function getTranslationIconsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    /**
     * Get the translation_descriptions attribute with JSON decoding
     */
    public function getTranslationDescriptionsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }

    /**
     * Get the external_link attribute with JSON decoding
     */
    public function getExternalLinkAttribute($value)
    {
        return json_decode($value, true) ?? [];
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
