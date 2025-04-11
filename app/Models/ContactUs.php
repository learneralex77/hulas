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
        'full_name_en',
        'full_name_np',
        'email',
        'phone_number_en',
        'phone_number_np',
        'is_contacted',
        'contact_remarks_en',
        'contact_remarks_np',
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
     * Get the full_name attribute (for backward compatibility)
     */
    public function getFullNameAttribute()
    {
        return $this->full_name_en ?? '';
    }
    
    /**
     * Get the phone_number attribute (for backward compatibility)
     */
    public function getPhoneNumberAttribute()
    {
        return $this->phone_number_en ?? '';
    }
    
    /**
     * Get the contact_remarks attribute (for backward compatibility)
     */
    public function getContactRemarksAttribute()
    {
        return $this->contact_remarks_en ?? '';
    }
    
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
