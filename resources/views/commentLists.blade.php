@foreach($comments as  $comment)
    <div class="comment-list">
        <hr class="comment-line dotline">
        <div class="row ">
            <div class="col-md-2">
                @if($comment['uavatar'] == null)
                    <img src=" {{ asset('images/m21.jpg ')}}" class="img-circle">
                @else
                    <img src="{{ $comment['uavatar'] }}" class="img-circle">
                @endif
                <p>{{ $comment['created_at'] }}</p>
                0
            </div>
            <div class="col-md-8">
                <p><strong>{{ $comment['uname'] }}</strong>说:{{ $comment['content'] }}</p>
            </div>
            <div class="col-md-2">
                <a href=" {{ url('comment/show')  }}" ><i class=" fa fa-comment">回复</i></a>
            </div>
        </div>
    </div>
@endforeach