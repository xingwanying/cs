<!DOCTYPE html>
<html style="background-color: rgb(226, 225, 202);">


@include('partials.htmlheader')
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

<body>
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
    @include('auth.footer')
    @include('partials.scripts')
</body>
</html>