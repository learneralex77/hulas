<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'display_order',
        'is_published',
        'file',
    ];

    /**
     * Get all translations for the service.
     */
    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    /**
     * Get the primary translation (usually English or default).
     */
    public function primaryTranslation()
    {
        return $this->hasOne(ServiceTranslation::class)
            ->where('language_code', 'en')
            ->withDefault([
                'name' => '[]',
                'icon' => '[]',
                'description' => '[]',
            ]);
    }

    /**
     * Get all the names for this service.
     */
    public function getNames()
    {
        $translation = $this->primaryTranslation;
        return json_decode($translation->name ?: '[]') ?: [];
    }

    /**
     * Get all the icons for this service.
     */
    public function getIcons()
    {
        $translation = $this->primaryTranslation;
        return json_decode($translation->icon ?: '[]') ?: [];
    }

    /**
     * Get all the descriptions for this service.
     */
    public function getDescriptions()
    {
        $translation = $this->primaryTranslation;
        return json_decode($translation->description ?: '[]') ?: [];
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
