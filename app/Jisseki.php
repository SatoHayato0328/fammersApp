<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jisseki extends Model
{
    protected $gurded = array('id');
    
    protected $dates = [
        'jisseki_date'
    ];
    
    protected $casts = [
        'jisseki_date' => 'date_format:Y/m/d',
    ];
    //
    public static $rules = array(
        'crop' => 'required',
        'jisseki_date' => 'required',
        'jisseki_time' => 'required|integer',
        'jisseki_people' => 'required|integer',
        'jisseki_suuryou' => 'integer',
        'jisseki_syukkatanka' => 'integer',
    );
    
    protected $fillable = ['crop', 'jisseki_date', 'jisseki_time', 'jisseki_people', 'jisseki_weather', 'jisseki_contents', 'jisseki_material', 'jisseki_suuryou', 'jisseki_syukkatanka', 'jisseki_coment'];
    
     public function yotei() 
     {
    return $this->belongsTo('App\Yotei', 'jisseki_id');
    }
}
