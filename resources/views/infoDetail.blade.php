
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
                <button onclick="goBack()" type="button">返回</button>

        </header>

        <section class="wrapper style5">
            <div class="inner">
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

                  @include("commentLists")
                </section>
            </div>
        </section>




    </article>
@endsection
