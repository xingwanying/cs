<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Infomation;
use Response,Form;
use DB, Hashids, Log, Redirect, Input, Config, Hash, Validator, Gate;
use Auth;
use App\Comment;

class InformationController extends Controller
{
    public function getShow(){
        $user = Auth::user();
        if (empty($user)){
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }elseif($user->role == 110){
            return view("cms.info");
        }else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }

    }
    public function getCreate()
    {
        $user = Auth::user();
        if (empty($user)){
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }elseif($user->role == 110){
            return view("cms.newInfo");
        }else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }

    }
    public function postCreate(Request $request)
    {
        $user = Auth::user();
        if (empty($user)){
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }elseif($user->role == 110){
            $rules = [
                'content' => "required|max:2000",
                'title' => "required|max:200",
                'photo' => "required|image",
                'type' => "required|numeric",
            ];

            $validator = Validator::make($request->all(), $rules);   //验证输入信息的合法性
            if ($validator->passes()) {
                $vObject = new Infomation();
                $uploaded_img = $request->file('photo');
                $title = $request->get("title");
                $type = $request->get("type");
                $content = $request->get("content");        //获取html文件的内容
                $usid = $user -> id;

                if ($uploaded_img) {
                    $input_img = $uploaded_img->getFileInfo();

                    // TODO 检查相同图片（hash值相同）是否重复上传
                    // 根据文件类型“猜测”文件名后缀，$img_ext为img等
                    $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $input_img);
                    $img_ext =  $mime_type;

                    if (empty($img_ext)) {
                        abort(422); // TODO 返回错误信息提示页面
                    }else{

                        $uri_prefix_img = "information/" . Hashids::connection("information")->encode($usid);  //获得唯一图文封面的文件地址
                        $saveToDir_img = storage_path('upload/img/' . $uri_prefix_img);   //获得完整的路径
                        Log::debug("saveToDir:" . $saveToDir_img);
                        if (!is_dir($saveToDir_img)) {
                            mkdir($saveToDir_img, 0755, true);
                        }
                        $img_hashid = Hashids::connection("main")->encode(preg_replace('/\./', '', microtime(true)));   //利用时间戳获得文件名
                        Log::debug("$img_hashid");
                        $img_file_name = $img_hashid . "." . $img_ext;    //联合文件名和后缀
                        $uploaded_img->move($saveToDir_img, $img_file_name);   //保存文件

                        $vObject->cover_img_url = $uri_prefix_img . DIRECTORY_SEPARATOR . $img_file_name;

                    }

                }

                $uri_prefix_h5 = "/information/" . Hashids::connection("information")->encode($usid);  //获得唯一百科的文件地址
                $saveToDir_h5 = storage_path('upload/h5' . $uri_prefix_h5);//获得完整的路径
                Log::debug("saveToDir:" . $saveToDir_h5);
                if (!is_dir($saveToDir_h5)) {
                    mkdir($saveToDir_h5, 0755, true);
                }
                $h5_hashid = Hashids::connection("main")->encode(preg_replace('/\./', '', microtime(true)));  //利用时间戳获得文件名
                Log::debug("$h5_hashid");
                $h5_file_name = $h5_hashid . "." . "html";  //联合文件名和后缀
                touch($saveToDir_h5 . "/" . $h5_file_name);   //创建文件
                $content = "<meta charset='utf-8'><meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>" . $content;//拼接html的head
                file_put_contents($saveToDir_h5 . "/" . $h5_file_name, $content);   //将html文件的内容保存到对应文件中

                $vObject->html_url = $uri_prefix_h5 . DIRECTORY_SEPARATOR . $h5_file_name;
                $vObject -> title = $title;
                $vObject -> uid = $usid;
                $vObject -> type = $type;
                $vObject->save();
                return Redirect::to('information/show');

            } else {
                return Redirect::to("information/show")->withErrors(["create.failed" => "数据验证不通过"]);

            }
        }else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }
    }

}


