<?php


namespace App\common;


use Illuminate\Support\Facades\Mail;


class Email
{


    public static function SendEmail($email=null,$emarr=[]) {


        if($email != null) {

            $flag = Mail::send('email.one',['emarr'=>$emarr],function ($message) use ($email,$emarr) {


                $message->subject($emarr['subject']);

                $message->to($email);

            });

            if($flag) {
                return 1;

            }else {
                return 0;
            }
        }

    }


}