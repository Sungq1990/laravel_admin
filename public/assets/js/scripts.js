
jQuery(document).ready(function() {

    /*
        Background slideshow
    */
    $.backstretch([
      "assets/img/backgrounds/1.jpg"
    , "assets/img/backgrounds/2.jpg"
    , "assets/img/backgrounds/3.jpg"
    ], {duration: 3000, fade: 750});


    /*
        Form validation
    */
    $('.register form').submit(function(){
        $(this).find("label[for='phone']").html('手机号');
        $(this).find("label[for='checkcode']").html('验证码');

        var phone = $(this).find('input#phone').val();
        var checkcode = $(this).find('input#checkcode').val();

        if(phone == '') {
            $(this).find("label[for='phone']").append("<span style='display:none' class='red'> - 请输入手机号.</span>");
            $(this).find("label[for='phone'] span").fadeIn('medium');
            return false;
        }
        if(checkcode == '') {
            $(this).find("label[for='checkcode']").append("<span style='display:none' class='red'> - 请输入验证码.</span>");
            $(this).find("label[for='checkcode'] span").fadeIn('medium');
            return false;
        }
    });

    $('#getCheckCode').click(function () {
        var form = $('.register form');
        var phone = form.find('input#phone').val();
        if (phone == '') {
            var msg = "请输入手机号";
            form.find("label[for='phone'] span").html("");
            form.find("label[for='phone']").append("<span style='display:none' class='red'> - " + msg + ".</span>");
            form.find("label[for='phone'] span").fadeIn('medium').fadeOut(5000);
        } else {
            if (!isPhoneNo(phone)) {
                msg = "手机号不合法";
                form.find("label[for='phone'] span").html("");
                form.find("label[for='phone']").append("<span style='display:none' class='red'> - " + msg + ".</span>");
                form.find("label[for='phone'] span").fadeIn('medium').fadeOut(5000);
                return false;
            }
            var URL = "/sendMsg?phone="+phone;
            $.get(URL,function () {
                alert("发送成功")
            });
        }
    });

    function isPhoneNo(phone) {
        var pattern = /^1[345789]\d{9}$/;
        return pattern.test(phone);
    }

});
