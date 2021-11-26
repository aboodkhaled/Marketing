<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\user;
class Role extends Model
{
    public $timestamps = false;
  
    protected $fillable = [
        'name', 'permission'   // json field
    ];

    public function users()
    {
        $this->hasMany(User::class);
    }

    public function getPermissionsAttribute($permission)
    {
        return json_decode($permission, true);
    }
}
