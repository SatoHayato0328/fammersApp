<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yotei extends Model
{
    protected $gurded = array('id');
    //
    public static $rules = array(
        'crop' => 'required',
        'yotei_date' => 'required',
        'yotei_time' => 'required|integer',
        'yotei_people' => 'required|integer',
    );
    
    public function histories()
    {
        return $this->hasMany('App\History');
    }
    
    protected $fillable = ['crop', 'yotei_date', 'yotei_time', 'yotei_people', 'yotei_contents', 'yotei_material'];
    
    public function jisseki() 
    {
        return $this->hasOne('App\Jisseki', 'yotei_id')->withDefault();
    }

}
