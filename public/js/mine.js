function getToken() {
    var email =  $("#email").val();
    $.ajax({

        method: "GET",
        url:"http://www.certification.com:8888/mail/send?email="+email,
        success: function (data) {
            console.log(data);
            $('#res').text(data);
        },
        error:function( err ) {
            console.info( JSON.stringify(err));
        }

    });


}
$(document).ready(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5(
        {
        "toolbar": {
            "html": true,
            "image": true,
            "fa": true
        }

    });
    //图片预览
    $("#fileUpload").on('change', function () {


        if (typeof (FileReader) != "undefined") {

            var reader = new FileReader();
            reader.onload = function (e) {
                var img = e.target.result;
               $("#main header").css("background-image","url(" +img +")") ;
            };

            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("你的浏览器不支持FileReader接口。无法看到图片预览");
        }
    });
    $("[name='title']").blur(function(){
        $("#infoTitle").text($("[name='title']").val());
    });
});



