<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yotei extends Model
{
    protected $gurded = array('id');
    //
    public static $rules = array(
        'crop' => 'required',
        'work_date' => 'required',
    );
}
