<?php

namespace App\MyModel;


use Illuminate\Database\Eloquent\Model;

class Artical extends Model

{

    protected $table = 'artical';

    public $timestamps = true;

    protected $fillable = ['headline','publishperson','articalcontent','picture'];


    protected function getDateFormat() {

        return time();

    }


    protected function asDateTime($val) {

        return $val;

    }


    public function comments() {

        return $this->hasMany('App\MyModel\Artiment','articalid');

    }

}