<?php

namespace App\Models\Web;
use App\Models\User;
use App\Models\Settings\Category;
use Illuminate\Database\Eloquent\Model;

class WProduct extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'entry_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
