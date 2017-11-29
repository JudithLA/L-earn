
Login =  { fn: {}

        };

Login.fn.AddUser = function (user, email, pass) {
    var url = "http://localhost:8888/registerTeacher/registerReceived.php";
    var data = {
        user: user,
        email: email,
        pass: pass
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
            resultArray = JSON.parse(result);
            if(resultArray['status'] == 'OK'){
              window.location.href = resultArray['url'];
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
  email = $("#email").html();
  name = $("#name").html();
  password = $("password").html();

  Login.fn.AddUser(user, email, password);
});
