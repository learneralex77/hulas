<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
