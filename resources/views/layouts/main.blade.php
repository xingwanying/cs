<!DOCTYPE HTML>

<html lang="zh-cn">
<head>
    <title>cuc13计科</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/mine.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
</head>
<body class="landing">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="{{ url('/home') }}">CUCCS</a></h1>
        <nav id="nav">
            <ul>
                <li class="special">
                    <a href="#menu" class="menuToggle"></a>
                    <div id="menu">
                        <a href="#menu" class="menuToggle"></a>
                        @if(Auth::check())

                            @if( Auth::user()->avatar_img_url )
                                <a herf="#"> <img src="{{asset( Auth::user()->avatar_img_url) }}" class="img-circle"
                                                  style="width: 40px;height: 40px;"> </a>
                            @else
                                <a herf="#"><img src="{{ asset('/images/m21.jpg') }}" class="img-circle"></a>
                            @endif
                            <a style="margin-right: 20%" herf="#"> {{ Auth::user()->name }}</a>

                            <a href="{{ url('auth/logout') }}" class="button default" >注销</a>

                        @else
                            <ul>
                                <li><a href="{{  url('auth/login') }}">登录</a></li>
                                <li><a href="{{  url('auth/register') }}">注册</a></li>
                            </ul>

                        @endif
                        <ul style="margin-top: 10%">
                            <li><a href="#"><i class='fa fa-home'></i>主页</a></li>
                            <li><a href="#"><i class='fa fa-bullhorn'></i>公告</a></li>
                            <li><a href="#"><i class='fa fa-anchor'></i>风采</a></li>
                            <li><a href="#"><i class='fa fa-group'></i>动态</a></li>
                            <li><a href="#"><i class='fa fa-info'></i>资讯</a></li>
                            <li><a href="{{ url('information/create') }}"><i class='fa fa-gears'></i>功能</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

    </header>

    @yield('content')

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; 2013</li><li>CUC | 理工学部 ｜ 计算机科学与技术</li>
        </ul>
    </footer>

</div>
<!-- Scripts -->
<script src="{{ asset('/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.scrollex.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.scrolly.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/skel.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/util.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/main.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/mine.js')}}" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
</body>
</html>