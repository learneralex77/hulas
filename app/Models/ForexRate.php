<?php

// app/Models/ForexRate.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForexRate extends Model
{
    protected $fillable = ['time_slot', 'flag', 'currency', 'unit', 'buying_rate'];
}
