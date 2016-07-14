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

    $("#avatarUpload").on('change', function () {


        if (typeof (FileReader) != "undefined") {

            var reader = new FileReader();
            reader.onload = function (e) {
                var img = e.target.result;
                $("#avatar").attr("src",img) ;
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

//评论
function getComment(id){
    $.ajax({

        method: "GET",
        url:"/comment/show/"+ id,
        success: function (data) {
            $("#commentPart" + id).html(data);
            $("#commentPart" + id).slideToggle("3000");
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
            $('#refreshPart').html(data);
        },
        error: function (err) {
            console.info(err);
        }

    });

}

function favorite(id) {
    $.ajax({
        method: "POST",
        url:  "/information/favorite/" + id,
        data: {
            id: id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data == 403){
                window.location.replace('/auth/login');
            }
            $('#like').text(data);
            $("#heart-o").toggle();
            $("#heart").toggle();
        },
        error: function (err) {
            console.info(err);
        }

    });


}

function cancel(){
    window.location.replace('/information/show');
}

function goBack(type){
    var url = '/information/info/' + type;
    window.location.replace(url);
}

function goBackWork(type){
    var url = '/information/info/0';
    window.location.replace(url);
}

function goBackCMS(){
    var url = '/information/show';
    window.location.replace(url);
}

function goUserInfo(){
    var url = '/user/profile';
    window.location.replace(url);
}

