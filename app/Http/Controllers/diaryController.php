<?php

namespace App\Http\Controllers;

use App\MyModel\Artical;
use App\MyModel\Message;
use Illuminate\Support\Facades\DB;
use Validator;
use App\MyModel\Diary;
use Illuminate\Http\Request;

class diaryController extends Controller

{

    const NOT_DISPLAY = 0;

    public function __construct()

    {
        parent::__construct();

        DB::beginTransaction(); //开启事务

    }


    public function diaryview() {

        $diary = Diary::where('display','=',1)

            ->paginate(5);

        return parent::_view('diary.list',[

            'diarys' => $diary

        ]);

    }


    public function newdiary(Request $request) {

        $diary = new Diary();

        if($request->isMethod('POST')) {

            $validator = Validator::make($request->input(),[

                'Diary.diaryContent' => 'required|min:5|max:50',

            ],[

                'required'=>':attribute 不能为空',

                'min'=>':attribute 长度低于要求',

                'max'=>':attribute 长度高于要求',

            ],[

                'Diary.diaryContent' => '日记内容',

            ]);

            if($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput() ;

            }

            $data = $request->input('Diary');

            if(Diary::create($data)) {

                DB::commit();  //提交

                return redirect('diary/list')->with('success','添加成功');

            }else {

                DB::rollback();  //回滚

                return redirect()->back();

            }

        }

        return parent::_view('diary.newDiary',[

            'diary' => $diary

        ]);

    }


    public function updatediary(Request $request) {

        $diary = Diary::find($request->get('id'));

        if($request->isMethod('POST')) {

            $this->validate($request,[

                'Diary.diaryContent' => 'required|min:5|max:50',

            ],[

                'required'=>':attribute 不能为空',

                'min'=>':attribute 长度低于要求',

                'max'=>':attribute 长度高于要求',

            ],[

                'Diary.diaryContent' => '日记内容',

            ]);

            $data = $request->input('Diary');

            $diary->diaryContent = $data['diaryContent'];

            if($diary->save()) {

                DB::commit();  //提交

                return redirect('diary/list')->with('success','修改成功-'.$request->get('id'));

            }else {

                DB::rollback();  //回滚

                return redirect('diary/list')->with('error','修改失败-'.$request->get('id'));

            }

        }

        return parent::_view('diary.update',[

            'diary' => $diary

        ]);

    }


    public function deletediary($id) {

        $diary = Diary::find($id);

        $diary->display = diaryController::NOT_DISPLAY;

        if($diary->save()) {

            DB::commit();  //提交

            return redirect('diary/list')->with('success','删除成功-'.$id);

        }else {

            DB::rollback();  //回滚

            return redirect('diary/list')->with('error','删除失败');

        }

    }


    public function frontdiary() {

        $diarys = Diary::where('display','=',1)

            ->orderBy('created_at','desc')

            ->paginate(4);

        $hotartical = Artical::where('display','=',1)

            ->orderBy('readnumber','desc')

            ->take(5)

            ->get();

        $hotmessage = Message::where('display','=',1)

            ->orderBy('created_at','desc')

            ->take(7)

            ->get();

        return parent::_view('diary.frontdiary',[

            'diarys' => $diarys,

            'hotArtical' => $hotartical,

            'hotmessage' => $hotmessage

        ]);

    }

}