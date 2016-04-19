<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>cuccs</title>

    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <style type="text/css">
        body,td,th { font-family: "Source Sans Pro", sans-serif; }
        body { background-color: #2B2B2B; }
    </style>
</head>
<body>
<div class="wrapper">

    <div class="container">
        <h1>Welcome</h1>
    </div>

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

</div>

<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $('#login-button').click(function(event){
        event.preventDefault();
        $('form').fadeOut(500);
        $('.wrapper').addClass('form-success');
    });
</script>
</body>
</html>

