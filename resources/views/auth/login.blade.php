<!DOCTYPE html>

    <html>
    <head>
        <title>CUC13计科</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="{{ asset('/css/login.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>天啦噜！</strong> 出错了囧：<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <!-- Header -->
    <header id="header">
        <a href="{{ url('home') }}"><h1>CUCCS</h1></a>
        <p>关注我们<br />
            微信公众号：13计算机科学与技术</p>
    </header>

    <!-- Signup Form -->
    <form id="signup-form" action="{{ url('auth/login') }}" method="post">
        <input required type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input required id="email" name="email" type="email"  value="{{ old('email') }}" placeholder="邮箱">
        <input required name="password" type="password" placeholder="密码" class="form-control rounded input-lg text-center no-border">
        <button type="submit" >登录</button>
    </form>
    <!-- Footer -->
    <footer id="footer">
        <a  href="{{ url('/password/email') }}" style="color: #4cb6cb" herf="#">忘记密码？</a>

        <p>
            <small>还没有账号？</small>
            <a href="{{ url('auth/register') }}" class="btn btn-lg btn-info btn-block rounded">新建一个账号</a>
        </p>
        <ul class="copyright">
            <li>&copy; 2013</li><li>CUC  |  理工学部 ｜ 计算机科学与技术</li>
        </ul>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('/js/login.js') }}"></script>

    </body>
</html>
