
@extends('layouts.main')

@section('content')
    <article id="main">
        <header style="background-image: url('{{ $info['cover_img_url']  }}')">
            @if($info['uavatar'] == null)
                <img src=" {{ asset('images/m21.jpg ')}}" class="img-circle">
            @else
                <img src="{{ $info['uavatar'] }}" class="img-circle">
            @endif
            <h6>
                @if( $info['utype'] == "110" )
                    <span class="label label-warning">小编</span>
                @endif
                {{ $info['uname'] }}
            </h6>
            <h2 >{{ $info['title'] }}</h2>
            <h4>{{ $info['updated_at'] }}</h4>
        </header>

        <section class="wrapper style5">
            <div class="inner">
                <button onclick="goBack({{ $info['type'] }})" type="button">返回</button>
                <section id="h5">
                    <?php echo $info['html_url']; ?>
                    <form action="{{  url('comment/store') }}" method="POST"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input hidden name="infor_id" value="{{ $info['id'] }}">
                        <div class="12u$ comment-list">
                            <textarea required  name="content" placeholder="小主有话要说?" rows="6"></textarea>
                        </div>
                        <div class="12u$" style="margin-top: 1%">
                            <button type="submit">留言</button>
                        </div>
                    </form>

                    <div class="comment-list">
                        <hr class="comment-line dotline">
                        <div class="row ">
                            <div class="col-md-2">
                                <img class="img-circle " src="http://www.cuccs.com:3838/upload/img/user/9nZvE0qm/XXXgGKMr2B.jpg">
                                <p>2016</p>

                            </div>
                            <div class="col-md-8">
                                <p>你说：我也觉得李洁雅是大傻瓜和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和哈哈哈哈哈和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和和哈哈哈哈哈哈哈哈哈和</p>
                            </div>
                            <div class="col-md-2">
                                <a href=" {{ url('comment/show')  }}" ><i class=" fa fa-comment">回复</i></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>




    </article>
@endsection
