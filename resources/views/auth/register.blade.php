@extends('auth.auth')

@section('htmlheader_title')
    注册
@endsection

@section('content')
    <section id="content"class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
            <a class="navbar-brand block" href="{{ url('home') }}"><span class="h1 font-bold">CUC13计科</span></a>
            <section class="m-b-lg">
                <header class="wrapper text-center">
                    <strong>注册</strong>
                </header>
                <form action="{{ url('auth/register') }}" method="post">
                    <input required type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <input name="name" type="text" value="{{ old('name') }}" placeholder="用户名" class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" value="{{ old('email') }}" placeholder="邮箱"
                               class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="form-group">
                        <input name="password" type="Password" placeholder="密码" class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="form-group">
                        <input  name="password_confirmation" type="Password" placeholder="确认密码" class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="line line-dashed"></div>
                    <button type="submit" class="btn btn-lg btn-info btn-block btn-rounded">注册</button>

                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center">
                        <small>已经有了账户？</small>
                    </p>
                    <a href="{{ url('auth/login') }}" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i
                                class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">登录</span></a>
                </form>
            </section>
        </div>
    </section>
@endsection



