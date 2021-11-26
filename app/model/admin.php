<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use Notifiable;
    protected $table ="admins";


    protected $fillable = [
        'name',  'email', 'photo', 'password', 'role_id', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role_id', 'created_at', 'updated_at',
    ];

    public function getPhotoAttribute($val){
        return ($val !==null) ? asset('assets/'. $val) : "";
      }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
   

    public function hasAbility($permissions)    //products  //mahoud -> admin can't see brands
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permission as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } else if (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }
        return false;
    }
}
