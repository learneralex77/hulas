<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'featured_image',
        'images',
        'links',
        'is_featured',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];
}
