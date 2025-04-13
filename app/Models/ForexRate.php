<?php

// app/Models/ForexRate.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForexRate extends Model
{
    protected $fillable = [
        'date',
        'slots',
    ];

    protected $casts = [
        'slots' => 'array',
    ];
    
}
