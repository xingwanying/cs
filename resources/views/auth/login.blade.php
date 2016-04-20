@extends('auth.auth')

@section('htmlheader_title')
    登录
@endsection

@section('content')

    <div class="login-container">
        <h1>MOOE</h1>
        <h2>信息安全实验平台</h2>
        <h4>登录</h4>
        <form method="POST" action="/auth/login"  class="form">
            <input required type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div>
                <input required type="email" name="email" placeholder="email" value="{{ old('email') }}">
            </div>

            <div>
                <input required name="password" type="password" placeholder="密码">
            </div>
            <div class="row">
                <div class="col col-xs-6 checkbox icheck">
                    <label style="padding-left: 51%;">
                        <input name="remember" type="checkbox"> 记住登录
                    </label>
                </div>
                <div class="col col-xs-6" style="margin-top: 1%">

                    <a  href="{{ url('/password/email') }}" class="text-muted text-center" style="margin:10% 0 0 -60%;">
                        忘了密码？
                    </a>
                </div>
            </div>

            <div >
                <button type="submit"  id="login-button">登 录</button>
            </div><!-- /.col -->

            <p class="text-muted text-center" style="margin-top: 1%">
                <small>还没有账号？</small>
            </p>
            <div >
                <a style="width: 42%;margin-left: 29%" class="btn btn-lg btn-info btn-block rounded" href="{{ url('auth/register') }}">注册</a>
            </div><!-- /.col -->

        </form>
    </div>

@endsection



