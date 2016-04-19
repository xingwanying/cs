@extends('default')
@section('htmlheader_title')
@endsection
@section('main-content')
<div class="login-wrapper">

    <div class="login-container">
        <h1>Welcome</h1>
        <h2>13CUC计算机科学与技术</h2>
        {{--<form class="form">--}}
        {{--<input type="text" placeholder="Username">--}}
        {{--<input type="password" placeholder="Password">--}}
        {{--<button type="submit" id="login-button">Login</button>--}}
        {{--</form>--}}
        <form method="POST" action="/auth/login"  class="form">
            {!! csrf_field() !!}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul style="color:red;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <input type="text" name="name" placeholder="用户名" value="{{ old('name') }}">
            </div>

            <div>
                <input type="password" name="password" placeholder="密码" id="password">
            </div>

            {{--<div>--}}
            {{--<input type="checkbox" name="remember"> 记住我--}}
            {{--</div>--}}

            <div>
                <button type="submit" id="login-button">登录</button>
            </div>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

</div>

@endsection

