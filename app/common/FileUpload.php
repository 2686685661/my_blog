<?php


namespace App\common;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;

use App\Http\Controllers\Controller;


class FileUpload
{

    // 文件上传方法
    public function upload($files)
    {

        if(is_array($files)) {   //批量上传

            $names = [];
            foreach ($files as $file) {
                $name = $this->uploads($file);
                if($name) {
                    array_push($names,$name);
                }else {
                    return false;
                }

            }

            return $names;
        }

        if(!is_array($files)){                //单个上传

            $name = $this->uploads($files);

            if($name) {
                return $name;
            }else {
                return false;
            }
        }

        return false;

    }

    public function uploads($file) {

        if($file->isValid()) {
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientOriginalExtension();
            if($this->istype($type)) {
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

                $bool = Storage::disk('upload')->put($filename, file_get_contents($realPath));

                return ['filetype'=>$type,'filename'=>$filename];
            }
        }

        return false;
    }

    public function istype($type) {

        $fileTypes = array('html','css','doc','txt','png','jpg','jpeg','image','mp4','ogg','zip');

        if(in_array($type,$fileTypes)) {
            return $type;
        }

        return false;
    }
}
