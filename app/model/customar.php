<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\model\item;
use App\model\city;
use App\model\customar_attach;
use App\model\customar_item;
use App\model\customar_detail;
class customar extends Authenticatable

{
  use Notifiable;
  protected $table ="customars";
    
    protected $fillable = [
        'customar_id','name', 'photo', 'name_com', 'num_pt','edate','num_se', 'num_ta',  'num_pz','email','mobile','password', 'city_id', 'item_id', 
         'active', 'created_at', 'updated_at',
    ];
    
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token', 'item_id','city_id', 'created_at', 'updated_at',
  ];
    

    public function scopeActive($query){
      return $query -> where('active',1);
  }
    
  public function getPhotoAttribute($val){
    return ($val !==null) ? asset('assets/'. $val) : "";
  }

  

     public function getActive(){
      return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
  }

  public function item(){
    return $this->belongsTo('App\model\item', 'item_id', 'id');
  }
  public function city(){
    return $this->belongsTo('App\model\city', 'city_id', 'id');
  }

  public function customar_attach(){
    return $this->hasMany('App\model\customar_attach', 'customar_id', 'id');
  }

  public function customar_item(){
    return $this->hasMany('App\model\customar_item', 'customar_id', 'id');
  }

  public function customar_detail(){
    return $this->hasMany('App\model\customar_detail', 'customar_id', 'id');
  }

}
