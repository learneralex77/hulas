<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
        'is_published',
        'district_id',
        'display_order',
        'map_iframe'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the district that the branch belongs to.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Map the phone field to phone_number for backwards compatibility.
     */
    public function getPhoneAttribute()
    {
        return $this->attributes['phone_number'] ?? null;
    }

    /**
     * Set the phone_number field when phone is assigned.
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone_number'] = $value;
    }
}
