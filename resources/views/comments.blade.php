<div class="comment" id="commentList" >
    @foreach($comments as  $comment)
        <div class="comment-list">
            <div class="row ">
                <div class="col-md-2">
                    @if($comment['uavatar'] == null)
                        <img src=" {{ asset('images/m21.jpg ')}}" class="img-circle">
                    @else
                        <img src="{{ $comment['uavatar'] }}" class="img-circle">
                    @endif
                    <p>{{ $comment['created_at'] }}</p>

                </div>
                <div class="col-md-8">
                    <p><strong>{{ $comment['uname'] }}</strong>说:{{ $comment['content'] }}</p>
                </div>
                <div class="col-md-2">
                    <a href=" {{ url('comment/show')  }}" ><i class=" fa fa-comment">回复</i></a>
                </div>
            </div>
            <hr class="comment-line dotline">
        </div>
    @endforeach
        <form action="{{  url('comment/store') }}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input hidden name="infor_id" value="{{ $infor_id}}">
            <div class="row">
                <div class="col-md-9">
                    <input name="content" type="text" >
                </div>

                <div class="col-md-3">
                    <button type="submit">发送</button>
                </div>

            </div>
        </form>

</div>

