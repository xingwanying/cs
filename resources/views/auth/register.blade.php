@extends('auth.auth')

@section('htmlheader_title')
    注册
@endsection

@section('content')
    <div class="login-container">
        <h1>MOOE</h1>
        <h2>信息安全实验平台</h2>
        <h4>注册</h4>
        <form action="{{ url('auth/register') }}" method="post" class="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <input  required type="text" name="name" placeholder="用户名" value="{{ old('name') }}">
            </div>

            <div >
                <input  required name="email" type="email" value="{{ old('email') }}" placeholder="邮箱">
            </div>
            <div>
                <input  required name="password" type="Password" placeholder="密码">
            </div>
            <div >
                <input  required  name="password_confirmation" type="Password" placeholder="确认密码">
            </div>
            <button type="submit">注册</button>

            <div class="line line-dashed"></div>

            <p class="text-muted text-center" style="margin-top: 1%">
                <small>已经有账号？</small>
            </p>
            <div >
                <a style="width: 42%;margin-left: 29%" class="btn btn-lg btn-info btn-block rounded" href="{{ url('auth/login') }}">登录</a>
            </div><!-- /.col -->

        </form>
    </div>

@endsection



