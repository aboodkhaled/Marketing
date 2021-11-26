<?php

namespace App\model;
use App\model\customar;
use Illuminate\Database\Eloquent\Model;

class customar_attach extends Model
{
    protected $table ="customar_attaches";


    protected $fillable = [
        'name_file',   'customar_id',  'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'customar_id', 'created_at', 'updated_at',
    ];

    public function customar(){
        return $this->belongsTo('App\model\customar', 'customar_id', 'id');
      }
}
