<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
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
}
