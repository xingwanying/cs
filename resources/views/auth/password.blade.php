@extends('auth.auth')

@section('htmlheader_title')
    密码找回
@endsection

@section('content')
    <div class="login-container">
        <h1>MOOE</h1>
        <h2>信息安全实验平台</h2>
        <h4>密码找回</h4>
        <form method="POST" action="/password/email"  class="form">
            <input required type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div >
                <input  required name="email" type="email" value="{{ old('email') }}" placeholder="邮箱">
            </div>

            <div >
                <button type="submit"  id="login-button">发送密码重置链接</button>
            </div><!-- /.col -->
            <p class="text-muted text-center" style="margin-top: 1%">
                <small>已经有账号？</small>
            </p>
            <div >
                <a style="width: 42%;margin-left: 29%" class="btn btn-lg btn-info btn-block rounded" href="{{ url('auth/login') }}">登录</a>
            </div>

            <p class="text-muted text-center" style="margin-top: 1%">
                <small>还没有账号？</small>
            </p>
            <div >
                <a style="width: 42%;margin-left: 29%" class="btn btn-lg btn-info btn-block rounded" href="{{ url('auth/register') }}">注册</a>
            </div><!-- /.col -->
        </form>
    </div>
@endsection
