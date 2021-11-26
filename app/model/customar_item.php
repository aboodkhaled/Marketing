<?php

namespace App\model;
use App\model\customar;
use App\model\item;
use Illuminate\Database\Eloquent\Model;

class customar_item extends Model
{
    protected $table ="customar_items";


    protected $fillable = [
        'item_id',   'customar_id',  'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'item_id',  'customar_id', 'created_at', 'updated_at',
    ];

    public function customar(){
        return $this->belongsTo('App\model\customar', 'customar_id', 'id');
      }

      public function item(){
        return $this->belongsTo('App\model\item', 'item_id', 'id');
      }
}
