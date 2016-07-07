<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Information;
use Response,Form;
use DB, Hashids, Log, Redirect, Input, Config, Hash, Validator, Gate;
use Auth;
use Storage;
use App\Comment;

class InformationController extends Controller
{

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
                $vObject = new Information();
                $uploaded_img = $request->file('photo');
                $title = $request->get("title");
                $usid = $user -> id;

                if ($uploaded_img) {
                    $input_img = $uploaded_img->getFileInfo();

                    // TODO 检查相同图片（hash值相同）是否重复上传
                    // 根据文件类型“猜测”文件名后缀，$img_ext为img等
                    $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $input_img);
                    $img_ext = Config::get("cuc.www_host" . $mime_type);

                    if (empty($img_ext)) {
                        abort(422); // TODO 返回错误信息提示页面
                    }else{
                        $uri_prefix_img = "h5/" . Hashids::connection("information")->encode($user -> id);  //获得唯一图文封面的文件地址
                        $saveToDir_img = storage_path('storage/img/' . $uri_prefix_img);   //获得完整的路径
                        Log::debug("saveToDir:" . $saveToDir_img);
                        if (!is_dir($saveToDir_img)) {
                            mkdir($saveToDir_img, 0755, true);
                        }
                        $img_hashid = Hashids::connection("main")->encode(preg_replace('/\./', '', microtime(true)));   //利用时间戳获得文件名
                        Log::debug("$img_hashid");
                        $img_file_name = $img_hashid . "." . $img_ext;    //联合文件名和后缀
                        $uploaded_img->move($saveToDir_img, $img_file_name);   //保存文件

                        $vObject->cover_img_url = '/' . $uri_prefix_img . DIRECTORY_SEPARATOR . $img_file_name;

                    }

                }

                $vObject->title = $title;
                $vObject->save();
                return Redirect::to('experiment/show');

            } else {
                return Redirect::to("information/show")->withErrors(["create.failed" => "数据验证不通过"]);

            }
        }else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }
    }

}


