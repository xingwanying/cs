<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB, Hashids, Log, Redirect, Input, Config, Hash, Validator, Gate,Auth;


class CourseController extends Controller
{



    public function getShow(){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
       }  else {
            $url = 'http://jw.cuc.edu.cn/academic/getCaptcha.do';
            $res = file_get_contents($url);
            $uri_prefix_code = Hashids::connection("user")->encode($user -> id);
            $saveToDir_code = public_path('upload/code/' . $uri_prefix_code);//获得完整的路径
            Log::debug("saveToDir:" . $saveToDir_code);
            if (!is_dir($saveToDir_code)) {
                mkdir($saveToDir_code, 0755, true);
            }
            $code_hashid = Hashids::connection("main")->encode(preg_replace('/\./', '', microtime(true)));  //利用时间戳获得文件名
            Log::debug("$code_hashid");
            $code_file_name = $code_hashid . "." . "png";  //联合文件名和后缀
            touch($saveToDir_code . "/" . $code_file_name);   //创建文件
            file_put_contents($saveToDir_code . "/" . $code_file_name, $res);

            $imagePath = Config::get("cuc.www_host") . '/upload/code/' . $uri_prefix_code . DIRECTORY_SEPARATOR . $code_file_name;


            return view("auth.loginSchool") -> with('url',$imagePath);

        }

    }

    public function postShow(Request $request){
        $user = Auth::user();
        if (empty($user)) {
            return Redirect::to("/auth/login")
                ->withErrors(["login.failed" => "请先登录"]);
        }  else {

            $url = 'http://jw.cuc.edu.cn/academic/common/security/login.jsp?login_error=1';
            return file_put_contents($url);
//            $post['j_username'] = '201311113026';
//            $post['j_password'] = '3108651';
//            $post['groupId'] = '';
//            $post['Button1'] = iconv('utf-8', 'gb2312', '登录');
//            $result = $curl->curl_request($url,$post,'', 1);
//            print_r($result);
//

//            $name = $request -> get('name');
//            $password = $request -> get("password");
//            $code = $request -> get("code");
//            $post_data = array(
//
//                'j_username' => $name,
//                'j_password' => $password,
//                'j_captcha' =>  $code,
//
//            );
//
//            $postdata = http_build_query($post_data);
//            $options = array(
//
//                'http' => array(
//                    'method' => 'POST',
//
////                    'Cookie' => $cookie,
//
//                    'header' => 'Content-type:application/x-www-form-urlencoded',
//
//                    'content' => $postdata,
//
//                    'timeout' => 15 * 60 // 超时时间（单位:s）
//
//                )
//
//            );
//
//            $context = stream_context_create($options);
//            $url = "http://jw.cuc.edu.cn/academic/j_acegi_security_check";
//            $result = file_get_contents($url, false, $context);
//            return $result;
//
//
//            if(!$user-> avatar_img_url){
//                $user['avatar_img_url'] = null;
//            }else{
//                $user['avatar_img_url'] = Config::get("cuc.www_host") . '/' .$user-> avatar_img_url;
//            }
//            if($user['gender'] == 2 ){
//                $user['gender'] = "女";
//            }elseif($user['gender'] == 1 ){
//                $user['gender'] = "男";
//            }else{
//                $user['gendere'] = "不详";
//            }
//            return view('course') -> with('user',$user);


        }

    }


    public function getLogin(){

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://jw.cuc.edu.cn/academic/getCaptcha.do");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, true); //if you want headers
        $output=curl_exec($ch);
        curl_close($ch);
        $cookie = preg_split('/:/',$output);
        print_r($cookie);

//        $dejavu = app_path("../../../doc/img.py");
//
//
//        $ret_last = exec($dejavu);
//
//        var_dump($ret_last);


    }
}
