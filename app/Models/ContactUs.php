<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact_us';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'service_interested_in',
        'is_contacted',
        'message',
        'display_order'
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_contacted' => 'boolean',
        'display_order' => 'integer',
    ];
    
    /**
     * Get the route key name for Laravel's route model binding.
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeActive($query)
    {
        return $query->where('is_contacted', 1);
    }

    public function scopeOrderByDisplayOrder($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}
