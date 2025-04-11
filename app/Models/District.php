<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_np',
        'display_order',
        'is_published'
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
     * Get the agent forms for the district.
     */
    public function agentForms(): HasMany
    {
        return $this->hasMany(AgentForm::class);
    }
    
    /**
     * Get the branches for the district.
     */
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
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
