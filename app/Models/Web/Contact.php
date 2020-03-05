<?php

namespace App\Models\Web;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'entry_by', 'id');
    }
}
