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
use App\Comment;
use App\UserFavorite;

class InformationController extends Controller
{
    public function getShow()
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
            $info_output = information::orderBy('updated_at', 'desc')->select('id', 'title', 'cover_img_url', 'updated_at','type')->paginate(11);
            $info_output = $info_output->toArray();
            for ($info_int = 0; $info_int < count($info_output['data']); $info_int++) {
                $info_output['data'][$info_int]['cover_img_url'] = Config::get("cuc.www_host") . '/' . $info_output['data'][$info_int]['cover_img_url'];
            }
            return view("cms.info")->with('info', $info_output);
        } else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }

    }

    public function getCreate()
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
            return view("cms.newInfo");
        } else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }

    }

    public function postCreate(Request $request)
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
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
                return Redirect::to('information/show')->with('status', '恭喜小主保存成功!');

            } else {
                return Redirect::to("information/create")->withErrors(["create.failed" => "数据验证不通过"]);

            }
        } else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }
    }

    public function getInfodetail($id)
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
            $info_output = Information::find($id);
            $editor = User::find($info_output['uid']);
            $info_output['uname'] = $editor -> name;
            $info_output['utype'] = $editor -> role;
            $info_output['uavatar'] = $editor -> avatar_img_url;
            $info_output['cover_img_url'] = Config::get("cuc.www_host") . '/' . $info_output['cover_img_url'];
            if(!$editor-> avatar_img_url){
                $info_output['uavatar'] = null;
            }else{
                $info_output['uavatar'] = Config::get("cuc.www_host") . '/' .$editor-> avatar_img_url;
            }
            if (file_exists($info_output['html_url'])) {
                $info_output['html_url'] = file_get_contents($info_output['html_url']);
            } else {
                $info_output['html_url'] = null;
            }
            return view("cms.detail")->with('info',$info_output);

        }


    }

    public function getEdit($id)
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
            $info_output = information::find($id);
            if ($info_output) {
                $info_output['cover_img_url'] = Config::get("cuc.www_host") . '/' . $info_output['cover_img_url'];
                $info_output['html_url'] = public_path($info_output['html_url']);
                if (file_exists($info_output['html_url'])) {
                    $info_output['html_url'] = file_get_contents($info_output['html_url']);
                } else {
                    $info_output['html_url'] = null;
                }
                return view("cms.editInfo")->with('info', $info_output);
            } else {
                return Redirect::to("/information/show")
                    ->withErrors(["exit.failed" => "图文不存在"]);
            }

        } else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }

    }

    public function postEdit(Request $request, $id)
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
            $rules = [
                'content' => "max:2000",
                'title' => "max:200",
                'photo' => "image",
                'type' => "numeric",
            ];
            $validator = Validator::make($request->all(), $rules);   //验证输入信息的合法性
            if ($validator->passes()) {
                $vObject = Information::find($id);
                if ($vObject) {
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
                            return Redirect::to("information/edit/" . $id)->withErrors(["edit.failed" => "图片类型错误"]);

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

                    $uri_prefix_h5 = Hashids::connection("information")->encode($usid);  //获得唯一百科的文件地址
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
                    $vObject->op_uid = $usid;
                    $vObject->type = $type;
                    $vObject->save();
                    //删除旧的html和img文件
                    $old_html = public_path('upload/h5' . $vObject->html_url);
                    if (file_exists($old_html)) {
                        unlink($old_html);
                    }
                    $old_img = public_path('upload/img' . $vObject->cover_img_url);
                    if (file_exists($old_img)) {
                        unlink($old_img);
                    }
                    return Redirect::to("information/show")->with('status', '恭喜小主修改成功!');

                } else {
                    return Redirect::to("information/show")
                        ->withErrors(["exit.failed" => "图文不存在"]);
                }


            } else {
                return Redirect::to("information/edit/" . $id)->withErrors(["edit.failed" => "数据验证不通过"]);

            }
        } else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }
    }

    public function postDelete($id)
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
            $vObject = Information::find($id);
            $vObject->delete();
            $info_output = information::orderBy('updated_at', 'desc')->select('id', 'title', 'cover_img_url', 'updated_at')->paginate(11);
            $info_output = $info_output->toArray();
            $info_data['current_page'] = $info_output['current_page'];
            $info_data['last_page'] = $info_output['last_page'];
            for ($info_int = 0; $info_int < count($info_output['data']); $info_int++) {
                $info_output['data'][$info_int]['cover_img_url'] = Config::get("cuc.www_host") . '/' . $info_output['data'][$info_int]['cover_img_url'];
            }
            $info_data['data'] = $info_output['data'];
            return view("cms.deleteInfo")->with('info', $info_output);
        } else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }

    }

    public function getSearch($search)
    {
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        } elseif ($user->role == 110) {
            $info_output = Information::where('title', 'like', '%' . $search . '%')->select('id', 'title', 'cover_img_url', 'updated_at')->paginate(11);
            $info_output = $info_output->toArray();
            $info_data['current_page'] = $info_output['current_page'];
            $info_data['last_page'] = $info_output['last_page'];
            for ($info_int = 0; $info_int < count($info_output['data']); $info_int++) {
                $info_output['data'][$info_int]['cover_img_url'] = Config::get("cuc.www_host") . '/' . $info_output['data'][$info_int]['cover_img_url'];
            }

            $info_data['data'] = $info_output['data'];

            $info_data['key'] = $search;

            return view("cms.searchInfo")->with('info', $info_data);

        } else {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "禁止越权使用"]);
        }

    }

    public function getInfo($type)
    {
        $user = Auth::user();
        $info_output = information::where('type',$type)->orderBy('updated_at', 'desc')->select('id', 'title', 'cover_img_url', 'updated_at','type','uid','op_uid','comment_count','favorite_count')->paginate(10);
        $info_output = $info_output->toArray();
        for( $info_int=0; $info_int<count($info_output['data']); $info_int++){
            if($user){
                $ufl = UserFavorite::where('infor_id',$info_output['data'][$info_int]['id'])->where('uid',$user -> id) -> get();
                $like = count($ufl);
                $info_output['data'][$info_int]['is_like'] = $like;

            }else{
                $info_output['data'][$info_int]['is_like'] = 0;
            }
            $info_output['data'][$info_int]['cover_img_url'] = Config::get("cuc.www_host") . '/' . $info_output['data'][$info_int]['cover_img_url'];
            $editor = User::find($info_output['data'][$info_int]['uid']);
            $info_output['data'][$info_int]['uname'] = $editor->name;
            $info_output['data'][$info_int]['utype'] = $editor-> role;
            if(!$editor-> avatar_img_url){
                $info_output['data'][$info_int]['uavatar'] = null;
            }else{
                $info_output['data'][$info_int]['uavatar'] = Config::get("cuc.www_host") . '/' .$editor-> avatar_img_url;
            }
        }
        $info_output['type'] = $type;


        return view("information")->with('info',$info_output);


    }

    public function getDetail($id)
    {

        $info_output = Information::find($id);
        $editor = User::find($info_output['uid']);
        $info_output['uname'] = $editor -> name;
        $info_output['utype'] = $editor -> role;
        $info_output['uavatar'] = $editor -> avatar_img_url;
        $info_output['cover_img_url'] = Config::get("cuc.www_host") . '/' . $info_output['cover_img_url'];
        if(!$editor-> avatar_img_url){
            $info_output['uavatar'] = null;
        }else{
            $info_output['uavatar'] = Config::get("cuc.www_host") . '/' .$editor-> avatar_img_url;
        }
        if (file_exists($info_output['html_url'])) {
            $info_output['html_url'] = file_get_contents($info_output['html_url']);
        } else {
            $info_output['html_url'] = null;
        }
        $comment = Comment::where('infor_id',$id)->get();
        for($i=0;$i<count($comment);$i++){
            $user = User::find($comment[$i]->uid);
            $comment[$i]['uname'] = $user -> name;
            if(!$user-> avatar_img_url){
                $comment[$i]['uavatar'] = null;
            }else{
                $comment[$i]['uavatar'] = Config::get("cuc.www_host") . '/' .$user-> avatar_img_url;
            }
        }

        return view("infoDetail")->with('info',$info_output)->with('comments',$comment);


    }


    public function postFavorite($id){
        $user = Auth::user();
        if (empty($user)) {
            return 403;
            }else{

            $uid = $user ->id;
            $info = Information::find($id);
            Log::debug($info);
            $ufl = new UserFavorite();
            $ufl_in_db = $ufl->whereUid($uid)->where('infor_id',$id)->get();
            Log::debug($ufl_in_db);
            if(count($ufl_in_db) != 0){
                if(empty($ufl_in_db[0] -> deleted_at)){
                    $ufl_in_db[0] -> delete();
                    $info -> favorite_count =  $info -> favorite_count - 1;  //取赞
                    $info -> save();
                }else{
                    UserFavorite::withTrashed()->where("id", $ufl_in_db[0]->id)->restore();
                    $info -> favorite_count =  $info -> favorite_count + 1;  //点赞
                    $info -> save();
                }

            }else{
                Log::debug('favorite_count:'.$info -> favorite_count);
                $info -> favorite_count =  $info -> favorite_count + 1;  //点赞
                $info -> save();

                $ufl -> uid = $uid;
                $ufl -> infor_id = $id;
                $ufl -> save();
            }
            return $info -> favorite_count;

        }
    }


}
