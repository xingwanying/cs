<!DOCTYPE HTML>

<html lang="zh-cn">
<head>
    <title>cuc13计科</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="landing">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        @include('layouts.header')
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
                <div>打bug是我们的天职；单身汪是我们的tag；溢出是我们的噩梦。这里是猿类聚集地，有序猿更有序媛，卖得了萌，编得了程，写得了小说画得了画。我们是文艺理工生，艺术细菌built-in。壮哉我大计科！
                </div>
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