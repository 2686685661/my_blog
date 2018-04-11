<?php


namespace App\MyModel;


use Illuminate\Database\Eloquent\Model;

class Artiment extends Model

{

    protected $table = 'articalcomment';

    public $timestamps = true;

    protected $fillable = ['comname','comemail','comtext','articalid','comid','created_at','updated_at','reply'];


    protected function getDateFormat() {

        return time();

    }


    protected function asDateTime($val) {

        return $val;

    }


    public function getMent($com_id=null) {

        if($com_id !== null) {

               if($com_id == 0) {

                   return '该文章';

               }

               $ids = Artiment::all(['id'])->toArray();

               foreach ($ids as $is) {

                   if($com_id == $is['id']) {

                       return Artiment::find($com_id)->comname;

                       break;

                   }

               }

           return 0;

        }

    }


    public function posts() {

        return $this->belongsTo('App\MyModel\Artical','articalid');

    }
}