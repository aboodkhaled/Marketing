<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\city;
use App\model\venpharmice;
use App\model\venlabe;
class cuontry extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
       'name',  'created_at', 'updated_at',
  ];
    protected $table = 'cuontries';
    
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name', );
       }

       public function city(){
        return $this->hasMany('App\model\city', 'cuontry_id', 'id');
      }

      public function venpharmice(){
        return $this->hasMany('App\model\venpharmice', 'cuontry_id', 'id');
      }

      public function venlabe(){
        return $this->hasMany('App\model\venlabe', 'cuontry_id', 'id');
      }
}
