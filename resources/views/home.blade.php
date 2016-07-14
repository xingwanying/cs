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
                <h2>盘点下我们的大神老师们</h2>
                <p>问在性格各异，教学风格各成一派的中传计算机学院的老师的教导下学习，是一种怎样的体验？最佳答案如下：
                </p>
            </header>
            <ul class="features">
                <li class="icon fa-flag-o">
                    <h3>行走江湖的扈少侠</h3>
                    <p> 扈少侠原本是中科院的数学博士，却因长久以来对编程的深沉的爱，自学了编程的全套武功，并研发出独家秘笈，自此独步江湖数十载。一边广收弟子，传道授业；一边闭关修炼，设计游戏。作为扈少侠的真传弟子们，希望诸君能够恪守门规，潜心修学，有朝一日得以继承衣钵，逐草四方，俯瞰江湖</p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>老顽童“周伯通”</h3>
                    <p>金大侠笔下的周伯通是秉性纯真，名副其实的老顽童。而咱们的周老师和晓宏爷爷老师都对“1+1”问题有着莫名的偏执和喜好，都对自己的学生细心呵护，不忍苛责。他们都是我们最喜欢也最最可爱的“老顽童”搭档。
                    </p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>走国际化路线的Mr.Lin</h3>
                    <p> Mr.Lin就是咱们最霸气的课程-计算机网络的任课教师。在他的带领下，大计科的小伙伴们走上了国际化道路。949页的纯英文教材，95%的课堂教学使用英语教学。于是英语渣渣的我们默默告诉自己：People who know it are no better than those who love it,Those who love it are no better than the ones who love to know it.(知之者不如好之者，好之者不如乐之者）
                    </p>
                </li>
                <li class="icon fa-flag-o">
                    <h3>美女教师梁红</h3>
                    <p>犹记得在大二学年得知要学习大物时，想象中的大物老师应该是一个戴着厚厚的眼镜片，像爱因斯坦一样的中年男老师。当看到一个优雅、知性、睿智的女老师时，着实感到十分意外。上了梁老师的物理史，第一次知道二进制和阴阳学之间也有着千丝万缕的联系。也喜欢上了梁老师带着个人风格，张弛有度的教学方式。同时也坚信并非美女都是花瓶。</p>
                </li>
            </ul>
        </div>
    </section>
    <!-- Three -->
    <section id="two" class="wrapper alt style2">
        <section class="spotlight">
            <div class="image"><img src="images/10.jpg" alt="" /></div><div class="content">
                <h2>新年聚餐</h2>
                <p>2014年最后一天，wuli相亲相爱的计科大家庭相约在新疆娜依提餐厅，有美食，美酒，还有萌萌哒的计科人儿们~天地之大却只消酌两壶，与你们一纸一书驰骋广院，闲了共叙同窗情，馋了同去娜依提。时光很瘦，滑过指尖。这一路与你们同行，便是我之大幸。
                </p>
            </div>
        </section>
        <section class="spotlight">
            <div class="image"><img src="images/11.jpg" alt="" /></div><div class="content">
                <h2>行走的四楼联盟</h2>
                <p>壮哉计科四楼小分队！时光荏苒，岁月如梭。如今杨慧咩同学（左一）的短发不再，计科高冷女神洁雅（右二）的萌萌哒齐刘海也不知所踪，啦啦同学也（右一）是名花有主，独留我们一群单身狗相互慰藉。只愿各位小主早日变成白富美，迎娶高富帅走上人生巅峰！记得“苟富贵，勿相忘！”
                </p>
            </div>
        </section>
        <section class="spotlight">
            <div class="image"><img src="images/5.jpg" alt="" /></div><div class="content">
                <h2>支教小白杨</h2>
                <p>大二暑假期间，计科班萌主同学和学霸豪奶奶同学和参与了中国传媒大学小白杨支教队活动。去到了江西省罗文小学，和那里的小盆友们共度了一个有趣又充实的假期。据两位同学回忆，支教期间最美的还是夜晚满天的繁星，是在北京看不到的景色（好羡慕）</p>
            </div>
        </section>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper style4">
        <div class="inner">
            <header>
                <h2>微信公众平台</h2>
                <p>账号：13计算机科学与技术</p>
                <p>班级官方公众平台,小菌子机器人专业陪聊</p>
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