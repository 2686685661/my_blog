<?php

namespace App\Http\Controllers;

use App\common\Email;
//use App\Http\Controllers\common\EmailController;
use App\MyModel\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Validator;

class messageController extends Controller

{

    const NOT_DISPLAY = 0;

    public function __construct()

    {

        parent::__construct();

        DB::beginTransaction(); //开启事务

    }


    public function adoptview() {

        $message = Message::where('adopt_id','=',0)

            ->where('display','=',1)

            ->paginate(5);

        return parent::_view('message.adoptlist',[

            'messages' => $message

        ]);

    }

    public function messageview(Request $request) {

        if($request->isMethod('post')) {


            $this->validate($request,[
                'Reply.reply' => 'required|min:1|max:140',
            ],[
                'required' => ':attribute 不能为空',

                'min' => ':attribute 长度低于要求',

                'max' => ':attribute 长度高于要求',
            ],[
                'Reply.reply' => '回复留言内容'
            ]);


            $reply = $request->input('Reply');
            $meage = Message::find($reply['id']);
            $meage->reply = $reply['reply'];

            if($meage->save()) {
                DB::commit();  //提交
                return redirect()->back()->with('success','回复成功-'.$reply['id']);
            }


        }


        $message = Message::where('adopt_id','=',1)

            ->where('display','=',1)

            ->paginate(5);

        return parent::_view('message.messagelist',[

            'messages' => $message

        ]);

    }


    public function isadopt(Request $request,$id=null) {

        $message = Message::find($id);

        $message->adopt_id = Message::ALREADY_ADOPT;

        if($message->save()) {

            DB::commit();  //提交

            return redirect('message/adoptlist')

                ->with('success','已还原-'.$id);

        }

    }


    public function noadopt($id) {

        $message = Message::find($id);

        $message->adopt_id = Message::NO_ADOPT;

        if($message->save()) {

            DB::commit();  //提交

            return redirect('message/messagelist')

                ->with('success','已取消审核'.$id);

        }

    }


    public function delete($id) {

        $message = Message::find($id);

        $message->display = messageController::NOT_DISPLAY;

        if($message->save()) {

            DB::commit();  //提交

            return redirect()->back()

                ->with('success','删除成功-'.$id);

        }else {

            DB::rollback();  //回滚

            return redirect()->back()

                ->with('error','删除失败');
        }

    }


    public function frontmeage(Request $request) {

        $message = Message::where('display','=',1)

            ->where('adopt_id','=',1)

            ->orderBy('created_at','desc')

            ->get();

        if($request->isMethod('POST')) {






            $this->validate($request, [

                'message.name' => 'required|min:1|max:15',

                'message.meageContent' => 'required|min:1|max:150',

                'message.email' => 'required|min:1|max:20',

            ], [

                'required' => ':attribute 不能为空',

                'min' => ':attribute 长度低于要求',

                'max' => ':attribute 长度高于要求',

            ], [

                'message.comname' => '姓名',

                'message.comemail' => '邮箱',

                'message.comtext' => '评论内容'

            ]);





            $data = $request->input('message');

//            dd($data);

            if(Message::create($data)) {

                $mescookie = $request->cookie('message');
                if($mescookie) {
                    $cookiedelete = Cookie::forget('message');
                }

                Cookie::queue('message', $data, 5);

                DB::commit();  //提交

                return parent::_view('message.frontage',[

                    'messages' => $message

                ]);

            }else {

                DB::rollback();  //回滚

            }

        }

        return parent::_view('message.frontage',[

            'messages' => $message

        ]);

    }


    public function neweamil(Request $request,$id) {

        if($request->isMethod('post')) {

            $validator = Validator::make($request->input(),[
                'Email.subject' => 'required|min:1',
                'Email.content' => 'required|min:1',
            ],[
                'required'=>':attribute 不能为空',
                'min'=>':attribute 长度低于要求',
//                'max'=>':attribute 长度高于要求',
            ],[
                'Email.subject' => '邮件主题',
                'Email.content' => '邮件内容'
            ]);

            if($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput() ;
            }

            $a = $request->input('Email');


            $email = Message::find($id)->email;



            $flag = Email::SendEmail($email,$a);


            if($flag) {
                return redirect('message/messagelist')->with('success','发送成功');
            }else {
                return redirect('message/messagelist')->with('error','发送失败');
            }
        }

        return parent::_view('message.email');
    }


    public function meagereply(Request $request) {

        $message = Message::find($request->get('id'));

        return parent::_view('message.replymessage',[
            'message' => $message
        ]);
    }
}