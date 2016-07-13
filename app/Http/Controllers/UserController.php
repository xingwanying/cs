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
            if($user['gender'] == 0 ){
                $user['gender'] = " 女";
            }elseif($user['gender'] == 1 ){
                $user['gender'] = "男";
            }else{
                $user['gendere'] = "不详";
            }
            return view('userHome') -> with('user',$user);
        }
    }

    public function getPersonal(){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }else{
            return $user;
        }
    }
}