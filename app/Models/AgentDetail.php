<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'state_agent_name_en',
        'state_agent_name_np',
        'address_en',
        'address_np',
        'contact_no_en',
        'contact_no_np',
        'contact_person_en',
        'contact_person_np',
        'display_order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Get the state_agent_name attribute (for backward compatibility)
     */
    public function getStateAgentNameAttribute()
    {
        return $this->state_agent_name_en ?? '';
    }

    /**
     * Get the address attribute (for backward compatibility)
     */
    public function getAddressAttribute()
    {
        return $this->address_en ?? '';
    }

    /**
     * Get the contact_no attribute (for backward compatibility)
     */
    public function getContactNoAttribute()
    {
        return $this->contact_no_en ?? '';
    }

    /**
     * Get the contact_person attribute (for backward compatibility)
     */
    public function getContactPersonAttribute()
    {
        return $this->contact_person_en ?? '';
    }

    /**
     * Get the district that the agent belongs to.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
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
