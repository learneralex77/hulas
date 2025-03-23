<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'district_id',
        'message',
        'address'
    ];

    /**
     * Get the district that the agent form belongs to.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
