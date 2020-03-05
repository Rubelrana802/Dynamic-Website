<?php

namespace App\Models\Web;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
	protected $fillable = [
        'entry_by', 'email', 'subject', 'details'
    ];
     public function user()
    {
        return $this->belongsTo(User::class, 'entry_by', 'id');
    }
}
