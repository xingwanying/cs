
@extends('layouts.main')

@section('content')
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <div  style="margin:10px 100px 10px 150px;">
                    <div>
                        <h3 style="margin-bottom: 5px;">修改信息</h3>
                    </div>
                    <form action="{{  url('user/edit') }}" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row" style="margin-bottom: 1%">
                            <div class="col-md-6 inftitle" style="height: 120px;">
                                @if($user['avatar_img_url'] == null)
                                    <img src=" {{ asset('images/m21.jpg ')}}" id="avatar" style="height:90px;width:90px;margin-left: 25px;border-radius:50%;">
                                @else
                                    <img src="{{ $user['avatar_img_url'] }}" id="avatar" style="height:90px;width:90px;margin-left: 25px;border-radius:50%;"/>
                                @endif
                            </div>
                            <div class="col-md-6" style="padding-top: 25px;padding-left: 40px;">
                                <a  class="a-upload" style="border-bottom:none;width:170px;height:40px;padding-left: 18px;">
                                    <input type="file" style="height:40px;" name="photo" id="avatarUpload"><span class="fa fa-paperclip" style="margin:8px 0 0 12px"></span>上传新头像
                                </a>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 1%">
                            <div class="col-md-6 inftitle"><label for="name" style="float:right;margin: 5px auto;">昵称</label></div>
                            <div class="col-md-6 inf" style="padding-left: 0;width: 570px"><input type="text" name="name" value="{{ $user['name'] }}" /></div>
                        </div>
                        <div class="row" style="margin-bottom: 1%">
                            <div class="col-md-6 inftitle"><label style="float:right;">性别</label></div>
                            <div class="col-md-6 inf" style="padding-left: 0;width: 570px">
                                <div style="width: 180px;float: left;">
                                    <input type="radio" name="gender"  <?php if($user['gender'] == "男") echo "checked";?> id="male" value="1" /><label for="male"><span class="fa fa-mars"></span>男孩子</label>
                                </div>
                                <div style="width: 180px;float: left;">
                                    <input type="radio" name="gender" id="female" <?php if($user['gender'] == "女") echo "checked";?> value="2"/><label for="female"><span class="fa fa-venus" ></span>女孩子</label>
                                </div>
                                <div style="width: 180px;float: left;">
                                    <input type="radio" name="gender" id="others"  <?php if($user['gender'] == "不详") echo "checked";?> value="0"/><label for="others">其<span class="fa fa-venus-mars" ></span>他</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 2%">
                            <div class="col-md-6 inftitle"><label for="phonenum" style="float:right;margin: 5px auto;">手机号</label></div>
                            <div class="col-md-6 inf" style="padding-left: 0;width: 570px"><input type="text" id="phonenum"  name="mobile" value="{{ $user['mobile'] }}" /></div>
                        </div>
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="保存"></li>
                                <li><input onclick="goUserInfo()" type="reset" value="取消" class="special"></li>
                            </ul>
                        </div>
                    </form>
                </div>


            </div>
        </section>
    </article>
@endsection





