
@extends('layouts.main')

@section('content')
    <article id="main">
        <header>
            @if($user['avatar_img_url'] == null)
                <img src=" {{ asset('images/m21.jpg ')}}" class="avatar">
            @else
                <img src="{{ $user['avatar_img_url'] }}" class="avatar">
            @endif
            <div>
                <h6 class="inline">
                    @if( $user['role'] == "110" )
                        <span class="label label-warning">小编</span>
                    @endif
                    {{ $user['name'] }}
                </h6>
                @if( $user['gender'] == "女" )
                    <i class="inline fa fa-female"></i>
                @elseif($user['gender'] == "男" )
                    <i class="inline fa fa-male"></i>
                @else
                    <p class="inline">性别不详</p>
                @endif
            </div>
            @if($user['role'] != 110)
                <div style="margin-top: 1%">
                    <a href="{{ url('information/activity') }}" class="button default">发动态</a>
                    <a href="{{ url('user/create') }}" class="button default">发作品</a>
                    <a href="{{ url('course/show') }}" class="button default">查课表</a>
                </div>
            @endif
        </header>
        <section class="wrapper style5">
            <div class="inner">
               <iframe src="$url"></iframe>
            </div>
        </section>
    </article>
@endsection





