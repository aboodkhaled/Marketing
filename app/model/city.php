<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\cuontry;
use App\model\customar;
use App\model\customar_detail;
class city extends Model
{
  use HasTranslations;
  public $translatable = ['name'];
  protected $fillable = [
     'name', 'cuontry_id', 'created_at', 'updated_at',
];
  protected $table = 'cities';
  
  protected $hidden = [
    'cuontry_id',  'created_at', 'updated_at',
  ];

  public function scopeSelection($query){
      return $query -> select('id','name','cuontry_id', );
     }

       public function cuontry(){
        return $this->belongsTo('App\model\cuontry', 'cuontry_id', 'id');
      }

      public function customar(){
        return $this->hasMany('App\model\customar', 'city_id', 'id');
      }

      
      

   
}
