
@extends('layouts.main')

@section('content')
    <article id="main">
        <header>
            @if($info['type'] == 0)
                <h2 id="infoTitle">班级风采</h2>
            @elseif($info['type'] == 1)
                <h2 id="infoTitle">通知公告</h2>
            @elseif($info['type'] == 2)
                <h2 id="infoTitle">实习招聘</h2>
            @elseif($info['type'] == 3)
                <h4 id="infoTitle">考研资讯</h4>
            @else
                <h4 id="infoTitle">出国资讯</h4>
            @endif
            <p>CUC13计算机科学与技术</p>
        </header>
        <section class="wrapper style5">
            <div class="inner" style="padding: 0% 12% 0% 18%;">
                <section>
                        @for( $i=0; $i<count($info['data']); $i++)

                        <div class="row">
                            <a href= "getDetial{{ url('/information/detail/' . $info['data'][$i]['id'])}}"  class="col-md-3">
                                 <span class="img left" >
                                    <img src="{{ $info['data'][$i]['cover_img_url'] }}"/>
                                </span>
                            </a>
                            <div class="col-md-7">
                                <a href= "{{ url('/information/detail/' . $info['data'][$i]['id'])}}"  ><h2 style="margin: 0">{{ $info['data'][$i]['title'] }}</h2></a>

                                <p>{{ $info['data'][$i]['updated_at'] }}</p>
                                <div class="bs-example">
                                    <!--评论-->
                                    <button type="button"  id="commemt" onclick="getComment({{$info['data'][$i]['id']}})">
                                        <span class="fa fa-comment"></span>
                                        {{ $info['data'][$i]['comment_count'] }}
                                    </button>
                                    <!--点赞-->
                                    <button type="button" id="like">
                                        <span class="fa fa-heart-o" id="heart-o"></span>
                                        <span class="fa fa-heart" id="heart" style="display: none"></span>
                                        {{ $info['data'][$i]['favorite_count'] }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h6>
                                    @if( $info['data'][$i]['utype'] == "110" )
                                        <span class="label label-warning">小编</span>
                                    @endif
                                        {{ $info['data'][$i]['uname'] }}
                                </h6>
                            </div>
                        </div>
                       <div id="commentPart{{$info['data'][$i]['id']}}" style="display: none">

                       </div>

                        <hr style = "width: 100%;margin-top:5%;margin-bottom:5%">
                    @endfor

                </section>
            </div>
        </section>
    </article>
@endsection