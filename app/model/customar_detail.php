<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\item;
use App\model\customar;
class customar_detail extends Model
{
    protected $fillable = [
        'year_q', 'month_q','tasreh_q','months', 'monthe','customar_id','item_id', 'created_at', 'updated_at',
   ];
     protected $table = 'customar_details';
     
     protected $hidden = [
        'customar_id','item_id', 'created_at', 'updated_at',
     ];
 
     public function scopeSelection($query){
         return $query -> select('id','year_q', 'month_q','tasreh_q','months', 'monthe','customar_id','item_id', );
        }

        public function item(){
            return $this->belongsTo('App\model\item', 'item_id', 'id');
          }

          public function customar(){
            return $this->belongsTo('App\model\customar', 'customar_id', 'id');
          }
}
