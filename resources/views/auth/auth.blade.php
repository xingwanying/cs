<!DOCTYPE html>
<html>

@include('auth.header')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>天啦噜！</strong> 出错了囧：<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<body style="background: #83D8CF;">
    @yield('content')
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    @include('auth.scripts')
</body>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    $('#login-button').click(setTimeout(function(event){
                event.preventDefault();
                $('form').fadeOut(500);
                $('.login-wrapper').addClass('form-success');
            },5000)
    );
</script>

</html>