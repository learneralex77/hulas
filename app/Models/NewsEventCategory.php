<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class NewsEventCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'name_np',
        'slug',
        'image',
        'description',
        'description_en',
        'description_np',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];
    
    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            // Always generate slug from name_en
            $category->slug = static::generateUniqueSlug($category->name_en);
        });
        
        static::updating(function ($category) {
            // Always regenerate slug when name_en changes
            if ($category->isDirty('name_en')) {
                $category->slug = static::generateUniqueSlug($category->name_en);
            }
        });
    }
    
    /**
     * Generate a unique slug.
     */
    public static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        
        return $count ? "{$slug}-{$count}" : $slug;
    }
    
    /**
     * Get the name attribute (for backward compatibility)
     */
    public function getNameAttribute()
    {
        return $this->name_en ?? '';
    }
    
    /**
     * Get the description attribute (for backward compatibility)
     */
    public function getDescriptionAttribute()
    {
        return $this->description_en ?? '';
    }
    
    /**
     * Get the publications for the category.
     */
    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'news_event_category_id');
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
