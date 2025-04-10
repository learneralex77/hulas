<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_np',
        'address_en',
        'address_np',
        'phone_number_en',
        'phone_number_np',
        'email',
        'is_published',
        'district_id',
        'display_order',
        'map_iframe'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Get the name attribute (for backward compatibility)
     */
    public function getNameAttribute()
    {
        return $this->name_en ?? '';
    }
    
    /**
     * Get the address attribute (for backward compatibility)
     */
    public function getAddressAttribute()
    {
        return $this->address_en ?? '';
    }
    
    /**
     * Get the phone_number attribute (for backward compatibility)
     */
    public function getPhoneNumberAttribute()
    {
        return $this->phone_number_en ?? '';
    }
    
    /**
     * Get the phone attribute (for backward compatibility)
     */
    public function getPhoneAttribute()
    {
        return $this->phone_number_en ?? '';
    }

    /**
     * Get the district that the branch belongs to.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Set the phone_number field when phone is assigned.
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone_number'] = $value;
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
