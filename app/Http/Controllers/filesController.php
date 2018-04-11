<?php

namespace App\Http\Controllers;


//use App\common\FileUpload;
use App\common\FileUpload;
use App\MyModel\File;
use App\MyModel\VideoIntroduce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class filesController extends Controller

{

    const NO_DISPLAY = 0;

    public function __construct()

    {

        parent::__construct();

        DB::beginTransaction(); //开启事务

    }


    public function pictureview(Request $request) {

        if($request->isMethod('POST')) {

            $files = $request->file('fileselect');





            if(count($files)<1) {

                return redirect('files/picturelist')->with('error','上传文件错误');

            }


            foreach ($files as $file) {
                if(!in_array($file->getClientOriginalExtension(),['jpg','png','image','jpeg'])) {
                    return redirect()->back()->with('error','请上传图片！');
                    break;
                }
            }

            $filecon = new FileUpload();

            $names =  $filecon->upload($files);

            if($names) {

                if(is_array($names)) {

                    for ($i=0;$i<count($names);$i++) {

                        File::create($names[$i]);

                        DB::commit();  //提交

                    }

                }

            }else {

                return redirect('files/picturelist')->with('error','图片选取为空');

            }

        }

        $file = File::whereIn('filetype',['jpg','png'])->where('display','=',1)

            ->paginate(5);

        return parent::_view('files.picturelist',[

            'files'=>$file

        ]);

    }




    public function videoview(Request $request) {


        if($request->isMethod('post')) {

            $files = $request->file('files');



            if(count($files) <1) {
                return redirect('files/videolist')

                    ->with('error','文件选取为空');
            }

            foreach ($files as $file) {
                if(!in_array($file->getClientOriginalExtension(),['mp4','ogg'])) {
                    return redirect()->back()->with('error','请上传mp4或ogg视频文件');
                }
            }

            $filevideo = new FileUpload();

            $names =  $filevideo->upload($files);

            if($names) {
                if(is_array($names)) {

                    for ($i=0;$i<count($names);$i++) {

                        File::create($names[$i]);

                        DB::commit();  //提交

                    }

                    return redirect('files/videolist')->with('success','上传文件成功');

                }
            }else {
                return redirect('files/videolist')

                    ->with('error','上传文件错误');
            }
        }


        $file = File::whereIn('filetype',['mp4','ogg'])

            ->where('display','=',1)

            ->get();



        return parent::_view('files.videolist',[
            'videos' => $file
        ]);
    }





    public function docview(Request $request) {

        if($request->isMethod('POST')) {

            $files = $request->file('files');





            if(count($files)<1) {

                return redirect('files/doclist')

                    ->with('error','文件选取为空');

            }

            foreach ($files as $file) {
                if(!in_array($file->getClientOriginalExtension(),['css','html','js','txt','doc','zip'])) {
                    return redirect()->back()->with('error','请上传文档和压缩包！');
                    break;
                }
            }

            $filecon = new FileUpload();

            $names =  $filecon->upload($files);

            if($names) {

                if(is_array($names)) {

                    for ($i=0;$i<count($names);$i++) {

                        File::create($names[$i]);

                        DB::commit();  //提交

                    }

                    return redirect('files/doclist')->with('success','上传文件成功');

                }

            }else {

                return redirect('files/doclist')

                    ->with('error','上传文件错误');

            }

        }

        $file = File::whereIn('filetype',['doc','txt','css','html','zip'])

            ->where('display','=',1)

            ->paginate(5);

        return parent::_view('files.doclist',[

            'files' => $file

        ]);

    }


    public function deletepic($id) {

        $file = File::find($id);

        $file->display = filesController::NO_DISPLAY;

        if($file->save()) {
            DB::commit();  //提交

            return redirect()

                ->back()

                ->with('success','删除成功-'.$id);
        }else {
            return redirect()

                ->back()

                ->with('error','删除失败-'.$id);
        }

//        $route = 'files/'.$fileroute;
//
//        $file = File::find($id);
//
//        $filer = $file->filename;
//
//        if($file->delete()) {
//
//            $bool = Storage::disk('upload')
//
//                ->delete($filer);
//
//            if($bool) {
//
//                DB::commit();  //提交
//
//                return redirect($route)
//
//                    ->with('success','删除成功-'.$id);
//            }
//
//        }else {
//
//            DB::rollback();  //回滚
//
//            return redirect($route)
//
//                ->with('error','删除失败');
//
//        }

    }


    public function frontpicture() {

        $files = File::whereIn('filetype',['jpg','png'])->where('display','=',1)

            ->orderBy('created_at','desc')

            ->paginate(8);

        return parent::_view('files.fr_pic',[

            'files' => $files

        ]);

    }


    public function frfidown() {


        $files = File::whereIn('filetype',['doc','txt','css','html','zip'])->where('display','=',1)->orderBy('created_at','desc')->get();

        $video = File::whereIn('filetype',['mp4','ogg'])->where('display','=',1)->orderBy('created_at','desc')->get();



        return parent::_view('files.frfidown',[
            'files' => $files,
            'videos' =>$video
        ]);

    }


    public function videoDescribe(Request $request) {

       if($request->isMethod('post')) {

           $describe = $request->input('Video');

          $video = VideoIntroduce::where('vi_id','=',$describe['vi_id'])->first();

           if($video == null) {
               if(VideoIntroduce::create($describe)) {
                   DB::commit();  //提交
                   return redirect()->back()->with('success','描述成功！');
               }else {
                   return redirect()->back()->with('error','描述失败！');
               }
           }else {
               $video->v_title = $describe['v_title'];
               $video->v_letter = $describe['v_letter'];

               if($video->save()) {
                   DB::commit();  //提交
                   return redirect()->back()->with('cuccess','修改描述成功！');
               }else {
                   return redirect()->back()->with('error','修改描述失败！');
               }
           }
       }

    }



}