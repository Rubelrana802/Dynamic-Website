<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable=['name','description','display_name'];


    public function permissions()
    {
        return $this->belongsToMany(Role::class);
    }
}
