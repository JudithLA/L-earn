Login =  { fn: {}

        };

window.onload=function(){



Login.fn.AddUser = function (user, email, pass) {
    var url = "http://localhost:8888/L-earn/web/registerTeacher/RegisterReceived.php";
    var data = {
        user: $('#name').val(),
        email: $('#email').val(),
        pass: $('#password').val()
    };
    //$.get(url, data, function(result){alert ("Ha ido Bien la cosa");});

    //$.post(url, data, function(result){alert ("Ha ido Bien la cosa");});

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
}


$("#btn_register").click(function(){
  email = $("#email").val();
  name = $("#name").val();
  password = $("#password").val();
  console.log(name, email, password );
  Login.fn.AddUser(name, email, password);
});

};