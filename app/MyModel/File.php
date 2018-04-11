<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class File extends Model

{

    protected $table = 'file';

    public $timestamps = true;

    protected $fillable = ['filename','filetype','created_at','updated_at'];


    protected function getDateFormat() {

        return time();

    }


    protected function asDateTime($val) {

        return $val;

    }


    public function introduce() {

        return $this->hasOne('App\MyModel\VideoIntroduce','vi_id');
    }

}