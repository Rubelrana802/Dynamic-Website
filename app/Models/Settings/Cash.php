<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
        'name', 'amount',
    ];
}
