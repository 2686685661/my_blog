<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model

{

    protected $table = 'diary';

    public $timestamps = true;

    protected $fillable = ['diaryContent'];


    protected function getDateFormat() {

        return time();

    }


    protected function asDateTime($val) {

        return $val;

    }

}