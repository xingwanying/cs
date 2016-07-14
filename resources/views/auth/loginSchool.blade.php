@extends('auth.auth')

@section('htmlheader_title')
    查看课表
@endsection

@section('content')
    <section id="content"class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
            <a class="navbar-brand block" href="{{ url('home') }}"><span class="h1 font-bold">CUC13计科</span></a>
            <section class="m-b-lg">
                <header class="wrapper text-center">
                    <strong>查看课表</strong>
                </header>
                <form action="{{ url('course/show') }}" method="post">
                    <input required type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <input name="username" required type="text"  placeholder="教务在线学号" class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="form-group">
                        <input name="password" required  type="Password" placeholder="教务在线密码" class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('course/show') }}" ><img src="{{$url}}" class="code"></a>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="code" required placeholder="验证码" class="form-control rounded input-lg text-center no-border">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed"></div>
                    <button type="submit" class="btn btn-lg btn-info btn-block btn-rounded">确认</button>
                    
                </form>
            </section>
        </div>
    </section>
@endsection

