
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cloudlab</title>

    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <style type="text/css">
        body,td,th { font-family: "Source Sans Pro", sans-serif; }
        body { background-color: #2B2B2B; }
    </style>
</head>
<body>
<div class="wrapper">

    <div class="container">
        <h1>Welcome</h1>
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
                <input type="password" name="password" placeholder="Password" id="password">
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

<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $('#login-button').click(setTimeout(function(event){
        event.preventDefault();
        $('form').fadeOut(500);
        $('.wrapper').addClass('form-success');

    },5000)
    );
</script>
</body>
</html>
