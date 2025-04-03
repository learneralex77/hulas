<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'state_agent_name',
        'address',
        'contact_no',
        'contact_person',
        'display_order',
        'is_published'
    ];

    /**
     * Get the district that the agent belongs to.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get all state agent names as an array.
     */
    public function getStateAgentNames()
    {
        return json_decode($this->state_agent_name ?: '[]') ?: [];
    }

    /**
     * Get all addresses as an array.
     */
    public function getAddresses()
    {
        return json_decode($this->address ?: '[]') ?: [];
    }

    /**
     * Get all contact numbers as an array.
     */
    public function getContactNumbers()
    {
        return json_decode($this->contact_no ?: '[]') ?: [];
    }

    /**
     * Get all contact persons as an array.
     */
    public function getContactPersons()
    {
        return json_decode($this->contact_person ?: '[]') ?: [];
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
