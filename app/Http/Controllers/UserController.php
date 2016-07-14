<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use DB, Hashids, Log, Redirect, Input, Config, Hash, Validator, Gate;
use Auth;
class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        echo $user['name'].'登录成功！';
    }

    public function getProfile(){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }else{
            if(!$user-> avatar_img_url){
                $user['avatar_img_url'] = null;
            }else{
                $user['avatar_img_url'] = Config::get("cuc.www_host") . '/' .$user-> avatar_img_url;
            }
            if($user['gender'] == 2 ){
                $user['gender'] = "女";
            }elseif($user['gender'] == 1 ){
                $user['gender'] = "男";
            }else{
                $user['gendere'] = "不详";
            }
            return view('userHome') -> with('user',$user);
        }
    }

    public function getEdit(){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }else {
            if (!$user->avatar_img_url) {
                $user['avatar_img_url'] = null;
            } else {
                $user['avatar_img_url'] = Config::get("cuc.www_host") . '/' . $user->avatar_img_url;
            }
            if ($user['gender'] == 2) {
                $user['gender'] = "女";
            } elseif ($user['gender'] == 1) {
                $user['gender'] = "男";
            } else {
                $user['gendere'] = "不详";
            }
            return view('userEdit')->with('user', $user);
        }
    }

    public function postEdit(Request $request){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }else {
            $rules = [
                'mobile' => "max:200",
                'name' => "max:200",
                'photo' => "image",
                'gender' => "numeric",
            ];
            $validator = Validator::make($request->all(), $rules);   //验证输入信息的合法性
            if ($validator->passes()) {
                $uploaded_img = $request->file('photo');
                $name = $request->get("name");
                $gender = $request->get("gender");
                $mobile = $request->get("mobile");
                    if ($uploaded_img) {
                        $input_img = $uploaded_img->getFileInfo();

                        // TODO 检查相同图片（hash值相同）是否重复上传
                        // 根据文件类型“猜测”文件名后缀，$img_ext为img等
                        $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $input_img);
                        $img_ext = Config::get("cuc.mime2ext." . $mime_type);
                        Log::debug("saveType:" . $img_ext);

                        if (empty($img_ext)) {
                            return Redirect::to("user/edit/")->withErrors(["edit.failed" => "图片类型错误"]);

                        } else {

                            $uri_prefix_img = "user/" . Hashids::connection("information")->encode($user->id);  //获得唯一图文封面的文件地址
                            $saveToDir_img = public_path('upload/img/' . $uri_prefix_img);   //获得完整的路径
                            if (!is_dir($saveToDir_img)) {
                                mkdir($saveToDir_img, 0755, true);
                            }
                            $img_hashid = Hashids::connection("main")->encode(preg_replace('/\./', '', microtime(true)));   //利用时间戳获得文件名
                            Log::debug("$img_hashid");
                            $img_file_name = $img_hashid . '.' . $img_ext;    //联合文件名和后缀

                            $uploaded_img->move($saveToDir_img, $img_file_name);   //保存文件
                            Log::debug("saveToDir:" . $uploaded_img);

                            $user->avatar_img_url = 'upload/img/' . $uri_prefix_img . DIRECTORY_SEPARATOR . $img_file_name;
                            Log::debug("avatar_img_url:" . $user->avatar_img_url);
                            $old_img = public_path('upload/img' . $user->avatar_img_url);
                            //删除旧的img文件
                            if (file_exists($old_img)) {
                                unlink($old_img);
                            }

                        }
                    }
                    $user->name = $name;
                    $user->gender = $gender;
                    $user->mobile = $mobile;
                    $user->save();


                    return Redirect::to("user/profile")->with('status', '恭喜小主修改成功!');

            } else {
                return Redirect::to("user/edit")->withErrors(["edit.failed" => "数据验证不通过"]);

            }
        }
    }
    public function getCreate(){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }else {
            return view("newInfo");
        }

    }


    public function postCreate(Request $request){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }else {
            $rules = [
                'content' => "required|max:2000",
                'title' => "required|max:200",
                'photo' => "required|image",
                'type' => "required|numeric",
            ];

            $validator = Validator::make($request->all(), $rules);   //验证输入信息的合法性
            if ($validator->passes()) {
                $vObject = new information();
                $uploaded_img = $request->file('photo');
                $title = $request->get("title");
                $type = $request->get("type");
                $content = $request->get("content");        //获取html文件的内容
                $usid = $user->id;

                if ($uploaded_img) {
                    $input_img = $uploaded_img->getFileInfo();

                    // TODO 检查相同图片（hash值相同）是否重复上传
                    // 根据文件类型“猜测”文件名后缀，$img_ext为img等
                    $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $input_img);
                    $img_ext = Config::get("cuc.mime2ext." . $mime_type);
                    Log::debug("saveType:" . $img_ext);

                    if (empty($img_ext)) {
                        return Redirect::to("information/create")->withErrors(["create.failed" => "图片类型错误"]);
                    } else {

                        $uri_prefix_img = "information/" . Hashids::connection("information")->encode($usid);  //获得唯一图文封面的文件地址
                        $saveToDir_img = public_path('upload/img/' . $uri_prefix_img);   //获得完整的路径
                        if (!is_dir($saveToDir_img)) {
                            mkdir($saveToDir_img, 0755, true);
                        }
                        $img_hashid = Hashids::connection("main")->encode(preg_replace('/\./', '', microtime(true)));   //利用时间戳获得文件名
                        Log::debug("$img_hashid");
                        $img_file_name = $img_hashid . '.' . $img_ext;    //联合文件名和后缀

                        $uploaded_img->move($saveToDir_img, $img_file_name);   //保存文件
                        Log::debug("saveToDir:" . $uploaded_img);

                        $vObject->cover_img_url = 'upload/img/' . $uri_prefix_img . DIRECTORY_SEPARATOR . $img_file_name;
                        Log::debug("cover_img_url:" . $vObject->cover_img_url);

                    }

                }

                $uri_prefix_h5 = Hashids::connection("information")->encode($usid);
                $saveToDir_h5 = public_path('upload/h5/' . $uri_prefix_h5);//获得完整的路径
                Log::debug("saveToDir:" . $saveToDir_h5);
                if (!is_dir($saveToDir_h5)) {
                    mkdir($saveToDir_h5, 0755, true);
                }
                $h5_hashid = Hashids::connection("main")->encode(preg_replace('/\./', '', microtime(true)));  //利用时间戳获得文件名
                Log::debug("$h5_hashid");
                $h5_file_name = $h5_hashid . "." . "html";  //联合文件名和后缀
                touch($saveToDir_h5 . "/" . $h5_file_name);   //创建文件
//                $content = "<meta charset='utf-8'><meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width'>" . $content;//拼接html的head
                file_put_contents($saveToDir_h5 . "/" . $h5_file_name, $content);   //将html文件的内容保存到对应文件中

                $vObject->html_url = 'upload/h5/' . $uri_prefix_h5 . DIRECTORY_SEPARATOR . $h5_file_name;
                $vObject->title = $title;
                $vObject->uid = $usid;
                $vObject->type = $type;
                $vObject->save();
                return Redirect::to('information/info/0')->with('status', '恭喜小主保存成功!');

            } else {
                return Redirect::to("user/profile")->withErrors(["create.failed" => "数据验证不通过"]);

            }
        }

    }

}