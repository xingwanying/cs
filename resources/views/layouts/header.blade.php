<h1><a href="{{ url('/') }}">CUCCS</a></h1>
<nav id="nav">
    <ul>
        <li class="special">
            <a href="#menu" class="menuToggle"></a>
            <div id="menu">
                @if(Auth::check())
                    <div class="row">
                        <div class="col-md-6">
                            @if( Auth::user()->avatar_img_url )
                                <img src="{{asset( Auth::user()->avatar_img_url) }}" class="img-circle" style="width: 40px;height: 40px;">
                            @else
                                <img src="{{ asset('/images/m21.jpg') }}" class="img-circle">
                            @endif
                            <div style="margin-right: 20%" > {{ Auth::user()->name }}</div>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('auth/logout') }}" class="button default" >注销</a>
                        </div>
                    </div>

                @else
                    <ul>
                        <li><a href="{{  url('auth/login') }}">登录</a></li>
                        <li><a href="{{  url('auth/register') }}">注册</a></li>
                    </ul>

                @endif
                <ul style="margin-top: 10%">
                    @if(Auth::check())
                        @if(Auth::user() -> role == 110)
                            <li><a href="{{ url('information/show') }}"><i class='fa fa-gears'></i>图文管理</a></li>
                            <li><a href="{{ url('user/profile') }}"><i class='fa fa-user'></i>个人中心</a></li>
                        @else
                            <li><a href="{{ url('home') }}"><i class='fa fa-home'></i>首页</a></li>
                            <li><a href="{{ url('user/profile') }}"><i class='fa fa-user'></i>个人中心</a></li>
                            <li><a href="{{ url('information/info/1') }}"><i class='fa fa-bullhorn'></i>公告通知</a></li>
                            <li><a href="{{ url('information/info/0') }}"><i class='fa fa-anchor'></i>班级风采</a></li>
                            {{--<li><a href="{{ url('information/activity') }}"><i class='fa fa-group'></i>计科圈</a></li>--}}
                            <li><a href="{{ url('information/info/2') }}"><i class='fa fa-info'></i>实习招聘</a></li>
                            <li><a href="{{ url('information/info/3') }}"><i class='fa fa-info'></i>考研资讯</a></li>
                            <li><a href="{{ url('information/info/4') }}"><i class='fa fa-info'></i>出国资讯</a></li>
                            <li><a href="{{ url('course/show') }}"><i class='fa fa-book'></i>课表</a></li>
                        @endif
                    @else
                        <li><a href="{{ url('home') }}"><i class='fa fa-home'></i>首页</a></li>
                        <li><a href="{{ url('user/profile') }}"><i class='fa fa-user'></i>个人中心</a></li>
                        <li><a href="{{ url('information/info/1') }}"><i class='fa fa-bullhorn'></i>公告</a></li>
                        <li><a href="{{ url('information/info/0') }}"><i class='fa fa-anchor'></i>风采</a></li>
                        {{--<li><a href="{{ url('information/activity') }}"><i class='fa fa-group'></i>计科圈</a></li>--}}
                        <li><a href="{{ url('information/info/2') }}"><i class='fa fa-info'></i>实习招聘</a></li>
                        <li><a href="{{ url('information/info/3') }}"><i class='fa fa-info'></i>考研资讯</a></li>
                        <li><a href="{{ url('information/info/4') }}"><i class='fa fa-info'></i>出国资讯</a></li>
                        <li><a href="{{ url('course/show') }}"><i class='fa fa-book'></i>课表</a></li>
                    @endif


                </ul>
            </div>
        </li>
    </ul>
</nav>
