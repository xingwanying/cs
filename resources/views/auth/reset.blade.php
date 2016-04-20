@extends('auth.auth')

@section('htmlheader_title')
    重置密码
@endsection

@section('content')

    <div class="login-container">
        <h1>MOOE</h1>
        <h2>信息安全实验平台</h2>
        <h4>重置密码</h4>

        <form action="{{ url('password/reset') }}" method="post" class="form">
            <input required type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="token" value="{{ $token }}">
            <div >
                <input name="email" type="email" value="{{ old('email') }}" placeholder="邮箱">
            </div>
            <div>
                <input name="password" type="password" placeholder="新密码">
            </div>
            <div >
                <input  name="password_confirmation" type="password" placeholder="确认新密码">
            </div>
            <button type="submit">重置密码</button>

        </form>
    </div>

@endsection
