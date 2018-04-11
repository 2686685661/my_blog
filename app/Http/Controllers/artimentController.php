<?php


namespace App\Http\Controllers;

use App\MyModel\Artiment;
use Symfony\Component\HttpFoundation\Request;

class artimentController extends Controller

{


    public function artimentciew(Request $request) {

        if($request->isMethod('post')) {

            $this->validate($request, [

                'Reply.reply' => 'required|min:1|max:140',

            ], [

                'required' => ':attribute 不能为空',

                'min' => ':attribute 长度低于要求',

                'max' => ':attribute 长度高于要求',

            ], [

                'Reply.reply' => '回复评论内容',

            ]);


            $reply =$request->input('Reply');

            $ment = Artiment::find($reply['id']);

            $ment->reply = $reply['reply'];

            if($ment->save()) {
                return redirect()->back()->with('success','回复'.$ment->comname.'成功');
            }else {
                return redirect()->back()->with('error','回复'.$ment->comname.'失败');
            }
        }



        $artiments = Artiment::paginate(10);

        return parent::_view('artical.artiment',[

            'artiments' => $artiments

        ]);

    }


    public function mentdelete($id) {

        $thement = Artiment::find($id);

        if($thement->comid == 0) {

            $many = Artiment::where('comid','=',$thement->id)

                ->get();

            foreach ($many as $the) {
                $the->delete();
            }


            if(!count($many)) {

                if($thement->delete()) {

                    return redirect('artiment/artimentlist')->with('success', '删除成功-' . $id);

                }

            }else {

                return redirect('artiment/artimentlist')->with('error', '删除失败-' . $id);

            }

//            return redirect('artiment/artimentlist')->with('success', '删除成功-' . $id);
        }else {

            if($thement->delete()) {

                return redirect('artiment/artimentlist')->with('success', '删除成功-' . $id);

            }else {

                return redirect('artiment/artimentlist')->with('error', '删除失败-' . $id);

            }
        }
    }
}