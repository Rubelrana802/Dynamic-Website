<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'title', 'company_name', 'mobile', 'phone', 'email', 'logo', 'website', 'address' 
    ];

    
}
