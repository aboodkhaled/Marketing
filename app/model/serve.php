<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\serve_p;
class serve extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
       'name',  'created_at', 'updated_at',
  ];
    protected $table = 'serves';
    
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name',);
       }

       public function serve_p(){
        return $this->hasMany('App\model\serve_p', 'serve_p_id', 'id');
      }
}
