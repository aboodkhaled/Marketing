<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\serve;
class serve_p extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
       'name', 'serve_id', 'created_at', 'updated_at',
  ];
    protected $table = 'serve_ps';
    
    protected $hidden = [
      'serve_id',  'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','serve_id',);
       }

       public function serve(){
        return $this->belongsTo('App\model\serve', 'serve_id', 'id');
      }
}
