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
                        <ul>
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
                <h2>Arcu aliquet vel lobortis ata nisl<br />
                    eget augue amet aliquet nisl cep donec</h2>
                <p>Aliquam ut ex ut augue consectetur interdum. Donec amet imperdiet eleifend<br />
                    fringilla tincidunt. Nullam dui leo Aenean mi ligula, rhoncus ullamcorper.</p>
            </header>
            <ul class="icons major">
                <li><span class="icon fa-diamond major style1"><span class="label">Lorem</span></span></li>
                <li><span class="icon fa-heart-o major style2"><span class="label">Ipsum</span></span></li>
                <li><span class="icon fa-code major style3"><span class="label">Dolor</span></span></li>
            </ul>
        </div>
    </section>

    <!-- Carousel -->
    <section class="carousel">
        <div class="reel">

            <article>
                <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Pulvinar sagittis congue</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Fermentum sagittis proin</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Ultrices urna sit lobortis</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Varius magnis sollicitudin</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Pulvinar sagittis congue</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Fermentum sagittis proin</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Ultrices urna sit lobortis</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

            <article>
                <a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
                <header>
                    <h3><a href="#">Varius magnis sollicitudin</a></h3>
                </header>
                <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
            </article>

        </div>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper alt style2">
        <section class="spotlight">
            <div class="image"><img src="images/pic01.jpg" alt="" /></div><div class="content">
                <h2>Magna primis lobortis<br />
                    sed ullamcorper</h2>
                <p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
            </div>
        </section>
        <section class="spotlight">
            <div class="image"><img src="images/pic02.jpg" alt="" /></div><div class="content">
                <h2>Tortor dolore feugiat<br />
                    elementum magna</h2>
                <p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
            </div>
        </section>
        <section class="spotlight">
            <div class="image"><img src="images/pic03.jpg" alt="" /></div><div class="content">
                <h2>Augue eleifend aliquet<br />
                    sed condimentum</h2>
                <p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
            </div>
        </section>
    </section>

    <!-- Three -->
    <section id="three" class="wrapper style3 special">
        <div class="inner">
            <header class="major">
                <h2>Accumsan mus tortor nunc aliquet</h2>
                <p>Aliquam ut ex ut augue consectetur interdum. Donec amet imperdiet eleifend<br />
                    fringilla tincidunt. Nullam dui leo Aenean mi ligula, rhoncus ullamcorper.</p>
            </header>
            <ul class="features">
                <li class="icon fa-paper-plane-o">
                    <h3>Arcu accumsan</h3>
                    <p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
                </li>
                <li class="icon fa-laptop">
                    <h3>Ac Augue Eget</h3>
                    <p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
                </li>
                <li class="icon fa-code">
                    <h3>Mus Scelerisque</h3>
                    <p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
                </li>
                <li class="icon fa-headphones">
                    <h3>Mauris Imperdiet</h3>
                    <p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
                </li>
                <li class="icon fa-heart-o">
                    <h3>Aenean Primis</h3>
                    <p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>Tortor Ut</h3>
                    <p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper style4">
        <div class="inner">
            <header>
                <h2>Arcue ut vel commodo</h2>
                <p>Aliquam ut ex ut augue consectetur interdum endrerit imperdiet amet eleifend fringilla.</p>
            </header>
            <ul class="actions vertical">
                <li><a href="#" class="button fit special">Activate</a></li>
                <li><a href="#" class="button fit">Learn More</a></li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
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