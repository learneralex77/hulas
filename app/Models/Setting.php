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
        'title_en',
        'title_np',
        'feedback_notify_email',
        'google_maplink',
        'agent_notify_email',
        'description_en',
        'description_np',
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
}
