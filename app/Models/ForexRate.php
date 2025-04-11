<?php

// app/Models/ForexRate.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForexRate extends Model
{
    protected $fillable = ['date','time_slot', 'flag', 'currency', 'unit', 'buying_rate', 'display_order', 'is_published'];
}
