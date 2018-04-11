<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class VideoIntroduce extends Model

{

    protected $table = 'videoIntroduce';

    public $timestamps = true;

    protected $fillable = ['vi_id','v_title','v_letter','created_at','updated_at'];

    protected function getDateFormat() {

        return time();

    }


    protected function asDateTime($val) {

        return $val;

    }


}