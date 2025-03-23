<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'primary_logo',
        'secondary_logo',
        'title',
        'feedback_notify_email',
        'google_maplink',
        'agent_notify_email',
        'description',
        'email',
        'PO_Box',
        'canonical_url',
        'schema_markup',
        'keyword',
        'facebook',
        'twitter',
        'linkedin'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'schema_markup' => 'string',
    ];
}
