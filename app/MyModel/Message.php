<?php


namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Message extends Model

{

    const ALREADY_ADOPT = 1;

    const NO_ADOPT = 0;

    protected $table = 'message';

    public $timestamps = true;

    protected $fillable = ['name','email','adopt_id','display','created_at','updated_at','meageContent'];


    protected function getDateFormat() {

        return time();

    }


    protected function asDateTime($val) {

        return $val;

    }


    public function getadopt($adopt_id=null) {

        $arr = [

            self::NO_ADOPT => '未通过',

            self::ALREADY_ADOPT => '已通过'

        ];

        if($adopt_id !==null) {

            return array_key_exists($adopt_id, $arr) ? $arr[$adopt_id] : $arr[self::NO_ADOPT];

        }

        return $arr;

    }

}