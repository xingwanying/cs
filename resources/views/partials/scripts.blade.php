
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--login page-->
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $('#login-button').click(setTimeout(function(event){
                event.preventDefault();
                $('form').fadeOut(500);
                $('.login-wrapper').addClass('form-success');
            },5000)
    );
</script>