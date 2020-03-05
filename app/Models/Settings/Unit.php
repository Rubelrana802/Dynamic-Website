<?php

namespace App\Models\Settings;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'product_units';

    protected $fillable = [
        'entry_by', 'unit_name', 'code', 'labels', 'relations', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'entry_by', 'id');
    }
}
