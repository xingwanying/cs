
@extends('layouts.main')

@section('content')
    <article id="main">
        <header>
            <h2 id="infoTitle">通知公告</h2>
            <p>CUC13计算机科学与技术</p>
        </header>
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <div class="inner">

                        <!--图文信息-->
                        <div class="row">
                            <!--图片-->
                            <span class="img left" >
                                <img style="width: 180px;height: 120px;border-radius:10px;" src="images/pic01.jpg"/>
                            </span>
                            <!--文字-->
                            <div class="col-md-6" style="height:auto;width:600px;">
                                <div class="row">
                                    <a href="#" style="border-bottom:none;"><h3>React Native 开发技术周报第十六期 - 入门到实战项目视频教程来袭</h3></a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><p style="">三小时前</p></div>
                                    <div class="col-md-6"><p style="">作品</p></div>
                                </div>
                            </div>
                            <!--评论和点赞-->
                            <div class="col-md-3" style="padding-top: 35px;width: 220px;">
                                <!--评论-->
                                <button  id="commemt" style="padding:0;width: 80px;margin-right: 5px;">
                                    <span class="fa fa-commenting-o"></span>500
                                </button>
                                <!--点赞-->
                                <button id="like" style="padding:0;width: 80px;margin-left: 5px;">
                                    <span class="fa fa-heart-o" id="heart-o"></span><span class="fa fa-heart" id="heart" style="display: none"></span>10
                                </button>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <!--发布评论框-->
                        <div class="commentinput" id="commentinput">
                            <input type="text" id="commenttext" style="width:480px;display:inline;height: 39px;border-top-width: 0;margin-top: 12px;">
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

                    </div>
                </section>
            </div>
        </section>
    </article>
@endsection