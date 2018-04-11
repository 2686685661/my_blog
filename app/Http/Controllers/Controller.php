<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static $a;

    public static $arrs;


    public function __construct() {

        $url = 'http://localhost'.$_SERVER['REDIRECT_URL'];

        $arr = config('config.queenNav');

        self::$arrs =$this->recursionSelect($url,$arr);

    }


    public function _view($viewName,$data=[]){

        $datas = array_merge($data,[

            'arr' => self::$arrs

        ]);

        return view($viewName,$datas);

    }


    public function recursionSelect($url,$arr) {

        if(!isset($arr['hasSub'])) {

            foreach ($arr as $arrs) {

                if(isset($arrs['hasSub']) && ($arrs['hasSub'] == 1)) {   //存在子导航

                    $this->recursionSelect($url,$arrs['sub']);

                }else if(isset($arrs['hasSub']) && ($arrs['hasSub'] ==0)) {   //不存在子导航

                    if(strcmp($url,$arrs['url']) == 0) {

                        self::$a = $arrs;

                        break;

                    }else {

                        if($arrs['childPage'] == 1) {

                            foreach ($arrs['urlMap'] as $key=>$value) {

                                if(strcmp($url,$value) == 0) {

                                    self::$a = $arrs;

                                    break;

                                }
                            }
                        }
                    }
                }
            }
        }

        return self::$a;

    }
}
