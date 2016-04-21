<!DOCTYPE HTML>

<html>
<head>
    <title>cuc13计科</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css" />
    <!--[if lte IE 8]><link href="{{ asset('/css/ie8.css') }}" rel="stylesheet" type="text/css" /><![endif]-->
    <!--[if lte IE 9]><link href="{{ asset('/css/ie9.css') }}" rel="stylesheet" type="text/css" /><![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ asset('/js/ie/html5shiv.js') }}"></script>
    <script src="{{ asset('/js/ie/respond.min.js') }}"></script>
    <script src="{{ asset('/js/ie/excanvas.js') }}"></script>
    <![endif]-->

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
                            <li><a href="＃"><i class='fa fa-home'></i>主页</a></li>
                            <li><a href="#"><i class='fa fa-bullhorn'></i>公告</a></li>
                            <li><a href="#"><i class='fa fa-anchor'></i>风采</a></li>
                            <li><a href="#"><i class='fa fa-group'></i>动态</a></li>
                            <li><a href="#"><i class='fa fa-info'></i>资讯</a></li>
                            <li><a href="#"><i class='fa fa-gears'></i>功能</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

    </header>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2>CUCCS</h2>
            <h3>2013</h3>
            <p>我们不生产代码<br>我们是代码的搬运工</p>
            @if(!Auth::check())
            <ul class="actions">
                <li><a href="{{  url('auth/login') }}" class="button special">登录</a></li>
                <li><a href="{{  url('auth/register') }}" class="button default">注册</a></li>
            </ul>
            @endif
        </div>

        <a href="#one" class="more scrolly"></a>

    </section>

    <!-- One -->
    <section id="one" class="wrapper style1 special">
        <div class="inner">
            <header class="major">
                <h2>中国传媒大学2013级计算机科学与技术班级介绍</h2>
                <p>少数名族 10人 / 30人</p>
                <p>这是介绍巴拉巴拉巴巴巴巴巴我还没想好，写点儿啥呢？<br>
                    占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
            </header>
            <ul class="icons major">
                <li>班主任：张晶晶</li>
                <li>辅导员：王曼霖</li>
            </ul>
        </div>
    </section>

    <!-- Carousel -->
    <section class="carousel">
        <div class="reel">

            <article>
                <a href="#" class="image featured"><img id="cover" src="images/1.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/2.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/3.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/4.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/5.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/6.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/7.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/9.jpg" /></a>
            </article>
            <article>
                <a href="#" class="image featured"><img id="cover" src="images/8.jpg" /></a>
            </article>

        </div>
    </section>
    <!-- Two -->
    <section id="three" class="wrapper style3 special">
        <div class="inner">
            <header class="major">
                <h2>这里放资讯？或者其他什么都可以</h2>
                <p>占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑<br />
                    占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
            </header>
            <ul class="features">
                <li class="icon fa-paper-plane-o">
                    <h3>党团建设</h3>
                    <p>占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>党团建设</h3>
                    <p>占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>党团建设</h3>
                    <p>占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>党团建设</h3>
                    <p>占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>党团建设</h3>
                    <p>占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>党团建设</h3>
                    <p>占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑</p>
                </li>
            </ul>
        </div>
    </section>
    <!-- Three -->
    <section id="two" class="wrapper alt style2">
        <section class="spotlight">
            <div class="image"><img src="images/10.jpg" alt="" /></div><div class="content">
                <h2>活动名称</h2>
                <p>活动的内容描述<br>继续占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占</p>
            </div>
        </section>
        <section class="spotlight">
            <div class="image"><img src="images/11.jpg" alt="" /></div><div class="content">
                <h2>活动名称</h2>
                <p>活动的内容描述<br>继续占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占</p>
            </div>
        </section>
        <section class="spotlight">
            <div class="image"><img src="images/5.jpg" alt="" /></div><div class="content">
                <h2>活动名称</h2>
                <p>活动的内容描述<br>继续占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占坑占</p>
            </div>
        </section>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper style4">
        <div class="inner">
            <header>
                <h2>微信公众平台</h2>
                <p>账号：13计算机科学与技术</p>
                <p>来一段功能介绍巴拉巴拉巴啦巴拉巴拉巴拉巴拉巴啦巴拉巴拉拉巴拉巴拉巴啦巴拉巴拉</p>
            </header>
            <ul class="actions vertical">
                <img style="width: 70%" src="images/q.jpg">
                <h2 style="margin-left: 10%"> 扫  一  扫</h2>
            </ul>
        </div>
    </section>

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

</body>
</html>