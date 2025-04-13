<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecomeAnAgent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'become_an_agent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'contact_number',
        'email',
        'district',
        'message',
        'is_contacted',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_contacted' => 'boolean',
    ];

    /**
     * Scope a query to only include uncontacted agents.
     */
    public function scopeUncontacted($query)
    {
        return $query->where('is_contacted', false);
    }

    /**
     * Scope a query to only include contacted agents.
     */
    public function scopeContacted($query)
    {
        return $query->where('is_contacted', true);
    }
}
