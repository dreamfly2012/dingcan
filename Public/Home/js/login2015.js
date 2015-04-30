//登陆操作
function loginSubmit(callback) {
    $('#loginsubmit').text('正在登录...');
    $.ajax({
        url: __LOGIN_HANDLE_URL__,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        data: $("#formlogin").serialize(),
        error: function () {
            showMesInfo("网络超时，请稍后再试", "error");
        },
        success: function (result) {
            if (result) {
                if (result.status) {
                    var isIE = !-[1,];
                    if (isIE) {
                        var link = document.createElement("a");
                        link.href = result.url;
                        link.style.display = 'none';
                        document.body.appendChild(link);
                        link.click();
                    } else {
                        window.location = result.url;
                    }
                    return;
                }
            }

            if (result.empty_username || result.empty_password || result.error_user_name_password) {
                showMesInfo(result.message,'error');
                clearPwd();
            }


            $("#loginsubmit").html("登&nbsp;&nbsp;&nbsp;&nbsp;录");
        }
    });
}

function showMesInfo(msg, type) {
    $('.login-form .msg-wrap').empty();
    if (type == 'warn') {
        var info = '<div class="msg-warn"><b></b>' + msg + '</div>';
        $('.login-form .msg-wrap').append(info);
    }
    if (type == 'error') {
        var info = '<div class="msg-error"><b></b>' + msg + '</div>';
        $('.login-form .msg-wrap').append(info);
    }
}

function clearPwd() {
    $("#password").val("");
}

$(document).ready(function () {
    $("#loginsubmit").click(function () {
        loginSubmit();
    });
});






