<!DOCTYPE html>
<html lang="zh">
@include('partials.htmlheader')
<body>

@include('partials.header')

<div id="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="container">
            <!-- Page Content Here -->
            @yield('main-content')
        </section>
    </div>

@include('partials.footer')

</div>
@include('partials.scripts')

</body>
</html>
