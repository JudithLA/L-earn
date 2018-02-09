Login =  { fn: {}

        };

window.onload=function(){



Login.fn.AddUser = function (user, email, pass) {
    var url = "http://localhost:8888/L-earn/web/registerTeacher/RegisterReceived.php";
    var data = {
        action: 'checkRegister',
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val()
    };

    $.ajax({
        url: url,
        data: data,
        method: "POST",

        beforeSend: function () {
        },

        success: function (result) {
            console.log(result);

            resultArray = JSON.parse(result);
            if(resultArray['status'] == 'OK'){
            //   window.location.href = resultArray['url'];
                $('#paso1').removeClass('on');
                $('#paso2').addClass('on');
            } else {
                $('.msgError').html(resultArray['msg']);
            }
        },

        error: function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.status);
            alert(textStatus);
            alert(errorThrown);
        }

    });
};

};
