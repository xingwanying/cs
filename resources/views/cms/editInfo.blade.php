
@extends('layouts.main')

@section('content')
    <article id="main">
        <header style="background-image: url('{{ $info['cover_img_url'] }}')">
            <h2 id="infoTitle">文章标题</h2>
            <p>&emsp;</p>
        </header>
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <h2>图文编辑</h2>
                    <form action="{{  url('information/edit/' . $info['id']) }}" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i>上传封面图片
                                <input name="photo"  id="fileUpload" type="file"/>
                            </div>
                            <p class="help-block">最大不超过1MB</p>
                        </div>

                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input  type="text" name="title"  value="{{ $info['title'] }}" placeholder="文章标题">
                            </div>
                            <div class="6u$ 12u$">
                                <div class="select-wrapper">
                                    <select name="type" id="demo-category">
                                        <option>- 选择图文类型 -</option>
                                        <option  <?php if($info['type']=="0") echo "selected"; ?> value="0">作品</option>
                                        <option  <?php if($info['type']=="1") echo "selected"; ?> value="1">公告</option>
                                        <option  <?php if($info['type']=="2") echo "selected"; ?> value="2">实习招聘</option>
                                        <option  <?php if($info['type']=="3") echo "selected"; ?> value="3">考研资讯</option>
                                        <option  <?php if($info['type']=="4") echo "selected"; ?> value="4">出国资讯</option>
                                    </select>
                                </div>
                            </div>
                            <div class="12u$" style="width: 100%">
                                <textarea class="textarea" placeholder="输入图文内容"  id="infoEdit" name="content">
                                    {{ $info['html_url'] }}
                                </textarea>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="保存"></li>
                                   <li><input  type="reset" onclick="cancel()" value="取消" class="special"></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection