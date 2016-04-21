@extends('auth.auth')

@section('htmlheader_title')
    重置密码
@endsection

@section('content')
    <section id="content"class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
            <a class="navbar-brand block" href="{{ url('password/reset') }}"><span class="h1 font-bold">CUC13计科</span></a>
            <section class="m-b-lg">
                <header class="wrapper text-center">
                    <strong>重置密码</strong>
                </header>
                <form action="{{ url('password/reset') }}" method="post">
                    <input required type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input name="email" type="email" value="{{ old('email') }}" placeholder="邮箱"
                               class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="form-group">
                        <input name="password" type="Password" placeholder="新的密码" class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="form-group">
                        <input  name="password_confirmation" type="Password" placeholder="确认密码" class="form-control rounded input-lg text-center no-border">
                    </div>
                    <div class="line line-dashed"></div>
                    <button type="submit" class="btn btn-lg btn-info btn-block btn-rounded">重置密码</button>
                </form>
            </section>
        </div>
    </section>
@endsection
