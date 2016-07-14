
@extends('layouts.main')

@section('content')
    <article id="main">
        <header style="background-image: url('{{ asset('/images/default.jpg') }}')">
            <h2 id="infoTitle">文章标题</h2>
            <p>&emsp;</p>
        </header>
        <section class="wrapper style5">
            <div class="inner">
                <section>
                    <h2>图文编辑</h2>
                    <form action="{{  url('user/create') }}" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i>上传封面图片
                                <input name="photo" required id="fileUpload" type="file"/>
                            </div>
                            <p class="help-block">最大不超过1MB</p>
                        </div>

                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input required type="text" name="title"  value="" placeholder="文章标题">
                            </div>
                            <input hidden name="type" value="0">
                            <div class="12u$" style="width: 100%">
                                <textarea class="textarea" placeholder="输入图文内容"  id="infoEdit" name="content"></textarea>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="保存"></li>
                                    <li><input onclick="goBackWork()" type="reset" value="取消" class="special"></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection