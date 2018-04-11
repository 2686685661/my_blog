<?php

namespace App\Http\Controllers;

class getUrl extends Controller
{

    public function a() {
        dd('aaaa');
    }
}


//echo $_SERVER['HTTP_HOST']."<br>"; #localhost
//
//echo $_SERVER['PHP_SELF']."<br>"; #/blog/testurl.php
//
////获取完整的url
//echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo '<br>';
//echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
//echo '<br>';
//
//$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
//echo dirname($url);