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


var Id; //获取模态框当前对应删除元素的id
function getId(id) {
    // alert(id);
    Id = id;
}

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

//搜索
function getInfo(key) {
    if (event.keyCode == 13) {
        $.ajax({

            method: "GET",
            url: "/information/search/" + key,
            success: function (data) {
                console.log("success!:" + data);
                $("#searchPart").html(data);
            },
            error: function (err) {
                console.info(err);
            }

        })

    }
}
function get_Info() {
    var key = $("#infoSearch").val();
    $.ajax({

        method: "GET",
        url: "/information/search/" + key,
        success: function (data) {
            $("#searchPart").html(data);
        },
        error: function (err) {
            console.info(err);
        }

    })
}
var last = $("#last").val();
var current = $("#current").val();
//分页
function getNextPage(url) {
    if (current === last) {
        $("#next").addClass("disabled");
    } else {
        current++;
        console.log("当前页数：" + current);
        window.location.replace(url + current);
    }


}
function getPreviousPage(url) {
    if (current == 1) {
        $("#pre").addClass("disabled");
    } else {
        current--;
        console.log("当前页数：" + current);
        window.location.replace(url + current);

    }

}

function infoDelete() {
    $.ajax({
        method: "POST",
        url:  "/information/delete/" + Id,
        data: {
            id: Id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            $('#refreshPart').html(data);
        },
        error: function (err) {
            console.info(err);
        }

    });


}


function cancel(){
    window.location.replace('/information/show');
}

$(document).ready(function() {
    //点赞
    $("#like").click(function () {
        $("#heart-o").toggle();
        $("#heart").toggle();
    });
    //评论
    $("#commemt").click(function () {
        $("#commentinput").slideToggle("3000");
    });
    //发送评论
    $("#sendcom").click(function () {
        $("#commentinput").slideUp("3000");
        // $("#commenttext").attr("value","");
        $("#result").show();
        $("#commenttext").val("");
    });

})
