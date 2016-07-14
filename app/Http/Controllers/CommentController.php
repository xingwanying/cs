<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response,Form;
use DB, Hashids, Log, Redirect, Input, Config, Hash, Validator, Gate;
use Auth;
use App\Comment;

class CommentController extends Controller
{
   public function postStore(Request $request){
       $user = Auth::user();
       if (empty($user)) {
           return Redirect::to("/auth/login")
               ->withErrors(["login.failed" => "请先登录"]);
       }else {
           $rules = [
               'content' => "required|max:2000",
               'infor_id' => "required|numeric",
           ];
           $infor_id = $request->get("infor_id");
           $content = $request->get("content");

           $validator = Validator::make($request->all(), $rules);   //验证输入信息的合法性
           if ($validator->passes()) {

               $vObject = new Comment();
               $vObject -> uid = $user -> id;
               $vObject -> infor_id = $infor_id;
               $vObject -> content = $content;
               $vObject->save();
               return Redirect::to("information/detail/" . $infor_id)->with('status', '恭喜小主评论成功!');

           } else {
               return Redirect::to("information/detail/" .$infor_id )->withErrors(["edit.failed" => "数据验证不通过"]);

           }
       }
   }
}
