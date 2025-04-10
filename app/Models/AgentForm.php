<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_np',
        'number_en',
        'number_np',
        'email',
        'district_id',
        'message_en',
        'message_np',
        'address_en',
        'address_np',
        'is_processed',
        'display_order'
    ];

    protected $casts = [
        'is_processed' => 'boolean',
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
     * Get the number attribute (for backward compatibility)
     */
    public function getNumberAttribute()
    {
        return $this->number_en ?? '';
    }

    /**
     * Get the message attribute (for backward compatibility)
     */
    public function getMessageAttribute()
    {
        return $this->message_en ?? '';
    }

    /**
     * Get the address attribute (for backward compatibility)
     */
    public function getAddressAttribute()
    {
        return $this->address_en ?? '';
    }

    /**
     * Get the district that the agent form belongs to.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_processed', 0);
    }

    public function scopeOrderByDisplayOrder($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
    
}
