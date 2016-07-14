<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}