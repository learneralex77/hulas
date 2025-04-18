<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AboutUs extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about_us';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tagline_en',
        'tagline_np',
        'description_en',
        'description_np',
        'years_of_experience_en',
        'years_of_experience_np',
        'short_description_en',
        'short_description_np',
        'video_link',
        'image',
        'mission_vision',
        'mission_vision_images',
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
        'mission_vision' => 'array',
        'mission_vision_images' => 'array',
    ];
   
    /**
     * Get the tagline attribute (for backward compatibility)
     */
    public function getTaglineAttribute()
    {
        return $this->tagline_en ?? '';
    }

    /**
     * Get the description attribute (for backward compatibility)
     */
    public function getDescriptionAttribute()
    {
        return $this->description_en ?? '';
    }

    /**
     * Get the years_of_experience attribute (for backward compatibility)
     */
    public function getYearsOfExperienceAttribute()
    {
        return $this->years_of_experience_en ?? 0;
    }

    /**
     * Get the short_description attribute (for backward compatibility)
     */
    public function getShortDescriptionAttribute()
    {
        return $this->short_description_en ?? '';
    }

    /**
     * Get the mission_vision attribute with proper JSON handling
     */ 
    public function getMissionVisionAttribute($value)
    {
        // Start with empty array as default
        $result = [];

        // Null check
        if ($value === null) {
            return $result;
        }
        
        // If already an array, return as is
        if (is_array($value)) {
            return $value;
        }
        
        // If it's a string, try to decode JSON
        if (is_string($value)) {
            try {
                $decoded = json_decode($value, true);
                if (is_array($decoded)) {
                    return $decoded;
                }
            } catch (\Exception $e) {
                \Log::error('Error decoding mission_vision JSON', [
                    'value' => $value,
                    'error' => $e->getMessage()
                ]);
            }
        }
        
        // Default to empty array
        return $result;
    }
    
    /**
     * Set the mission_vision attribute with proper JSON handling
     */
    public function setMissionVisionAttribute($value)
    {
        if (is_null($value)) {
            $this->attributes['mission_vision'] = null;
            return;
        }
        
        if (is_string($value)) {
            $this->attributes['mission_vision'] = $value;
            return;
        }
        
        try {
            $this->attributes['mission_vision'] = json_encode($value);
        } catch (\Exception $e) {
            \Log::error('Error encoding mission_vision to JSON', [
                'value' => $value,
                'error' => $e->getMessage()
            ]);
            $this->attributes['mission_vision'] = json_encode([]);
        }
    }

    /**
     * Get the mission_vision_images attribute with proper JSON handling
     */ 
    public function getMissionVisionImagesAttribute($value)
    {
        // Start with empty array as default
        $result = [];

        // Null check
        if ($value === null) {
            return $result;
        }
        
        // If already an array, return as is
        if (is_array($value)) {
            return $value;
        }
        
        // If it's a string, try to decode JSON
        if (is_string($value)) {
            try {
                $decoded = json_decode($value, true);
                if (is_array($decoded)) {
                    return $decoded;
                }
            } catch (\Exception $e) {
                \Log::error('Error decoding mission_vision_images JSON', [
                    'value' => $value,
                    'error' => $e->getMessage()
                ]);
            }
        }
        
        // Default to empty array
        return $result;
    }
    
    /**
     * Set the mission_vision_images attribute with proper JSON handling
     */
    public function setMissionVisionImagesAttribute($value)
    {
        if (is_null($value)) {
            $this->attributes['mission_vision_images'] = null;
            return;
        }
        
        if (is_string($value)) {
            $this->attributes['mission_vision_images'] = $value;
            return;
        }
        
        try {
            $this->attributes['mission_vision_images'] = json_encode($value);
        } catch (\Exception $e) {
            \Log::error('Error encoding mission_vision_images to JSON', [
                'value' => $value,
                'error' => $e->getMessage()
            ]);
            $this->attributes['mission_vision_images'] = json_encode([]);
        }
    }

    /**
     * Scope a query to only include active items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_published', 1);
    }

    public function scopeOrderByDisplayOrder(Builder $query): Builder
    {
        return $query->orderBy('display_order', 'ASC');
    }
}
