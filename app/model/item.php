<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\customar_detail;
use App\model\customar;
use App\model\customar_item;
class item extends Model
{
    
    protected $table = "items";
    protected $fillable = [
        'name','price', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','price',);
       }





    public function customar_detail(){
        return $this->hasMany('App\model\customar_detail', 'item_id', 'id');
      }

      public function customar_item(){
        return $this->hasMany('App\model\customar_item', 'item_id', 'id');
      }

      public function customar(){
        return $this->hasMany('App\model\customar', 'item_id', 'id');
      }
}
