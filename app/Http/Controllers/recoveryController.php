<?php

namespace App\Http\Controllers;

use App\MyModel\Artical;
use App\MyModel\Diary;
use App\MyModel\File;
use App\MyModel\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class recoveryController extends Controller

{

    const IS_DISPLAY = 1;

    const NOT_DISPLAY = 0;


    public function __construct()

    {

        parent::__construct();

        DB::beginTransaction(); //开启事务

    }


    public function artyview(Request $request) {

        if($request->isMethod('POST')) {

            $data = $request->input('item');

            $da = Artical::where('display','=','0')

                ->where(function ($query) use ($data) {

                    $query->where('headline','like','%'.$data.'%')

                        ->orwhere('articalcontent','like','%'.$data.'%');

                })->paginate(5);

            return parent::_view('recovery.artylist',[

               'articals'=> $da

            ]);

        }

        $articals = Artical::where('display','=','0')

            ->paginate(5);

        return parent::_view('recovery.artylist',[

            'articals'=>$articals

        ]);

    }


    public function diaview(Request $request) {

        if($request->isMethod('POST')) {

            if(Input::has('item')) {

                $data = $request->input('item');

                $da = Diary::where('display','=','0')

                    ->where('diaryContent','like','%'.$data.'%')

                    ->paginate(5);

                return parent::_view('recovery.dialist',[

                    'diarys' => $da

                ]);

            }

        }

        $diarys = Diary::where('display','=','0')

            ->paginate(5);

        return parent::_view('recovery.dialist',[

            'diarys' => $diarys

        ]);

    }


    public function filesview() {

        $files = File::where('display','=',0)

            ->orderBy('created_at','desc')

            ->paginate(8);

        return parent::_view('recovery.fileslist',[
            'files' => $files
        ]);
    }


    public function meageview(Request $request) {

        if($request->isMethod('POST')) {

            if(Input::has('item')) {

                $data = $request->input('item');

                $da = Message::where('display','=','0')

                    ->where(function ($query) use ($data) {

                        $query->where('name','like','%'.$data.'%')

                            ->orwhere('email','like','%'.$data.'%')

                            ->orwhere('meageContent','like','%'.$data.'%');

                    })->paginate(5);

                return parent::_view('recovery.meagelist',[

                    'meages' => $da

                ]);

            }

        }

        $meages = Message::where('display','=','0')

            ->paginate(5);

        return parent::_view('recovery.meagelist',[

            'meages' => $meages

        ]);

    }


    public function artyReduction($id) {

        $artical = Artical::find($id);

        $artical->display = recoveryController::IS_DISPLAY;

        if($artical->save()) {

            DB::commit();  //提交

            return redirect('recovery/artylist')

                ->with('success','已还原-'.$id);

        }else {

            DB::rollback();  //回滚

            return redirect('recovery/artylist')

                ->with('error','还原失败-'.$id);

        }

    }


    public function fileReduction($id) {

        $file = File::find($id);

        $file->display = recoveryController::IS_DISPLAY;

        if($file->save()) {
            DB::commit();  //提交

            return redirect()->back()->with('success','以还原-'.$id);
        }else {
            return redirect()->back()->with('error','还原失败-'.$id);
        }

    }


    public function meageReduction($id) {

        $message = Message::find($id);

        $message->display = recoveryController::IS_DISPLAY;

        if($message->save()) {

            DB::commit();  //提交

            return redirect('recovery/meagelist')

                ->with('success','已还原-'.$id);

        }

    }


    public function diaReduction($id) {

        $diary = Diary::find($id);

        $diary->display = recoveryController::IS_DISPLAY;

        if($diary->save()) {

            DB::commit();  //提交

            return redirect('recovery/dialist')

                ->with('success','已还原-'.$id);
        }

    }


    public function artydelete($id) {

        $artical = Artical::find($id);

        $artiments = $artical->comments();
        if($artical->delete()) {

            $bol = $artiments->delete();


            

            if(count($bol)>=0) {

                $bool = Storage::disk('upload')

                    ->delete($artical->picture);

                if($bool) {

                    DB::commit();  //提交

                    return redirect('recovery/artylist')

                        ->with('success','彻底删除成功-'.$id);

                }else {

                    DB::rollback();  //回滚

                    return redirect('recovery/artylist')

                        ->with('error','文件删除失败');

                }

            }

        }else {

            return redirect('recovery/artylist')

                ->with('error','数据删除失败');

        }

    }


    public function diadelete($id) {

        $diary = Diary::find($id);

        if($diary->delete()) {

            DB::commit();  //提交

            return redirect('recovery/dialist')

                ->with('success','彻底删除成功-'.$id);

        }else {

            DB::rollback();  //回滚

            return redirect('recovery/dialist')

                ->with('error','删除失败');

        }

    }


    public function meagedelete($id) {

        $message = Message::find($id);

        if($message->delete()) {

            DB::commit();  //提交

            return redirect('recovery/meagelist')

                ->with('success','彻底删除成功-'.$id);

        }else {

            DB::rollback();  //回滚

            return redirect('recovery/meagelist')

                ->with('error','删除失败');

        }

    }

    public function filedelete($id) {

        $onebool = true;

        $file = File::find($id);

        if($file->filetype == 'mp4' || 'ogg') {

            $fileletter = $file->introduce;

            if($fileletter != null) {
                $onebool = $fileletter->delete();

            }



            if($onebool) {
                if($file->delete()) {
                    $twobool = Storage::disk('upload')->delete($file->filename);

                    if($twobool) {
                        DB::commit();  //提交

                        return redirect()->back()->with('success','以彻底删除-'.$id);
                    }else {
                        DB::rollback();  //回滚

                        return redirect()->back()->with('error','删除失败-'.$id);
                    }
                }else {
                    return redirect()->back()->with('error','删除表中该记录失败！');
                }
            }else {
                return redirect()->back()->with('error','删除关联表中记录失败！');
            }

        }else {
            if($file->delete()) {
                $bool = Storage::disk('upload')->delete($file->filename);

                if($bool) {
                    DB::commit();  //提交

                    return redirect()->back()->with('success','以彻底清除-'.$id);
                }else {
                    DB::rollback();  //回滚

                    return redirect()->back()->with('error','删除失败-'.$id);
                }
            }
        }


    }

}