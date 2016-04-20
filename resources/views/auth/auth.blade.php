<!DOCTYPE html>
<html>

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

@include('partials.htmlheader')
@yield('content')
@include('auth.footer')
@include('partials.scripts')

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });

</script>

</html>