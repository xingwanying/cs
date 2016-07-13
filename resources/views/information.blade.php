
@extends('layouts.main')

@section('content')
    <article id="main">
        <header>
            @if($info['type'] == 0)
                <h2 id="infoTitle">班级风采</h2>
            @elseif($info['type'] == 1)
                <h2 id="infoTitle">通知公告</h2>
            @elseif($info['type'] == 2)
                <h2 id="infoTitle">实习招聘</h2>
            @elseif($info['type'] == 3)
                <h4 id="infoTitle">考研资讯</h4>
            @else
                <h4 id="infoTitle">出国资讯</h4>
            @endif
            <p>CUC13计算机科学与技术</p>
        </header>
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <div class="inner" style="padding: 0% 12% 0% 20%;">
                        @for( $i=0; $i<count($info['data']); $i++)

                        <div class="row">
                            <div class="col-md-3">
                                 <span class="img left" >
                                    <img src="{{ $info['data'][$i]['cover_img_url'] }}"/>
                                </span>
                            </div>
                            <div class="col-md-7">
                                <a href=" {{ url('information/detial/' . $info['data'][$i]['id']) }}" ><h2 style="margin: 0">{{ $info['data'][$i]['title'] }}</h2></a>

                                <p>{{ $info['data'][$i]['updated_at'] }}</p>
                                <div class="bs-example">
                                    <!--评论-->
                                    <button type="button"  id="commemt">
                                        <span class="fa fa-comment"></span>
                                        {{ $info['data'][$i]['comment_count'] }}
                                    </button>
                                    <!--点赞-->
                                    <button type="button" id="like">
                                        <span class="fa fa-heart-o" id="heart-o"></span>
                                        <span class="fa fa-heart" id="heart" style="display: none"></span>
                                        {{ $info['data'][$i]['favorite_count'] }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                @if($info['data'][$i]['uavatar'] == null)
                                    <img src=" {{ asset('images/m21.jpg ')}}" class="img-circle">
                                @else
                                    <img src="{{ $info['data'][$i]['uavatar'] }}" class="img-circle">
                                @endif
                                <h6>
                                    @if( $info['data'][$i]['utype'] == "110" )
                                        <span class="label label-warning">小编</span>
                                    @endif
                                        {{ $info['data'][$i]['uname'] }}
                                </h6>
                            </div>
                            </div>

                        <!--发布评论框-->
                        <div class="commentinput" id="commentinput">
                            <input type="text" id="commenttext" style="width:84%;display:inline;height: 39px;border-top-width: 0;margin-top: 12px;">
                            <button id="sendcom"><span class="fa fa-reply"></span>发送</button>
                        </div>
                        <!--评论内容-->
                        <div id="result" style="margin:5px 0 0 160px;max-width:700px;width:auto;height: auto;display: none;">
                            <div>
                                <!--一条评论-->
                                <div class="row" style="display: table;">
                                    <div class="col-md-3" style="display: table-cell;width:90px;vertical-align:middle;float:none;">
                                        <img class="image compor" src="images/banner.jpg" alt="">
                                    </div>
                                    <div class="col-md-9" style="display: table-cell;vertical-align: middle;padding:0 0 0 0;width: 640px;">
                                        <div class="row">
                                            <p style="margin-bottom:0;line-height:20px;">你说：我也觉得李洁雅是大傻瓜和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和哈哈哈哈哈和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和和哈哈哈哈哈哈哈哈哈和</p>
                                        </div>
                                        <!--回复和点赞评论按钮-->
                                        <div class="row">
                                            <a href="#" style="border-bottom:none;float: right"> <span class="fa fa-heart-o"></span><span class="fa fa-heart" style="display: none"></span></a>
                                            <a href="#" style="border-bottom:none;float: right"><span class="fa fa-commenting-o"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <!--回复评论框-->
                                <div class="row">
                                    <input type="text" style="width:400px;display:inline;height: 20px;border-top-width: 0;margin-top: 12px;margin-left: 150px;">
                                    <a href="#" style="border-bottom:none;padding-left: 10px;padding-top: 5px;"><span class="fa fa-reply"></span></a>
                                </div>
                                <hr style = "width: 100%;margin:5px 0 5px 0;" />

                                <!--一条评论-->
                                <div class="row" style="display: table;">
                                    <div class="col-md-3" style="display: table-cell;width:90px;vertical-align:middle;float:none;">
                                        <img class="image compor" src="images/banner.jpg" alt="">
                                    </div>
                                    <div class="col-md-9" style="display: table-cell;vertical-align: middle;padding:0 0 0 0;width: 640px;">
                                        <div class="row">
                                            <p style="margin-bottom:0;line-height:20px;">你说：我也觉得李洁雅是大傻瓜和哈哈哈哈哈和哈哈哈哈哈哈哈哈哈和</p>
                                        </div>
                                        <!--回复和点赞评论按钮-->
                                        <div class="row">
                                            <a href="#" style="border-bottom:none;float: right"> <span class="fa fa-heart-o"></span><span class="fa fa-heart" style="display: none"></span></a>
                                            <a href="#" style="border-bottom:none;float: right"><span class="fa fa-commenting-o"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <!--回复评论框-->
                                <div class="row">
                                    <input type="text" style="width:400px;display:inline;height: 20px;border-top-width: 0;margin-top: 12px;margin-left: 150px;">
                                    <a href="#" style="border-bottom:none;padding-left: 10px;padding-top: 5px;"><span class="fa fa-reply"></span></a>
                                </div>
                                <hr style = "width: 100%;margin:5px 0 5px 0;" />

                                <!--一条评论-->
                                <div class="row" style="display: table;">
                                    <div class="col-md-3" style="display: table-cell;width:90px;vertical-align:middle;float:none;">
                                        <img class="image compor" src="images/banner.jpg" alt="">
                                    </div>
                                    <div class="col-md-9" style="display: table-cell;vertical-align: middle;padding:0 0 0 0;width: 640px;">
                                        <p style="margin-bottom:0;line-height:20px;">你说：我也觉得李洁雅是大傻瓜和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr style = "width: 100%;margin-top:25px;margin-bottom:25px">
                        @endfor

                    </div>
                </section>
            </div>
        </section>
    </article>
@endsection