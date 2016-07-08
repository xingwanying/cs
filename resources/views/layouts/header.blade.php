<h1><a href="{{ url('/') }}">CUCCS</a></h1>
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
                    <li><a href="{{ url('information/show') }}"><i class='fa fa-gears'></i>功能</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
