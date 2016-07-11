<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <title>cuc13计科</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/mine.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap3-wysihtml5.css') }}">
</head>

<body class="landing">
@if (count($errors) > 0)
    <div class="alert alert-danger" style="margin-bottom: 0px;color:rgb(169, 68, 66) !important;background-color: rgb(235, 204, 209) !important;border-color: rgba(215, 57, 37, 0);">
        <strong>天啦噜！</strong> 出错了囧：<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success" style="margin-bottom: 0px;margin-top: 4%">
        {{ session('status') }}
    </div>
    @endif
<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" >
       @include('layouts.header')
    </header>

    @yield('content')

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; 2013</li><li>CUC | 理工学部 ｜ 计算机科学与技术</li>
        </ul>
    </footer>

</div>
<!-- Scripts -->
<script src="{{ asset('/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.scrollex.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.scrolly.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/skel.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/util.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/main.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/mine.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/js/bootstrap3-wysihtml5.all.min.js') }}"></script>

</body>
</html>