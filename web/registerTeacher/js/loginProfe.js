Login =  { fn: {}

        };

window.onload=function(){



Login.fn.AddUser = function (user, email, pass) {
    var url = "http://localhost:8888/L-earn/web/registerTeacher/RegisterReceived.php";
    var data = {
        action: 'checkRegister',
        user: $('#name').val(),
        email: $('#email').val(),
        pass: $('#password').val()
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
}



Login.fn.selectCenter = function () {
    var url = "http://localhost:8888/L-earn/web/registerTeacher/RegisterReceived.php";
    var data = {
      // accion a ejecutar en servidor
      action : 'getCenter',
      // parametro que indica que es profesor
      userType: 'profesor'
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
            console.log(resultArray);
            if(resultArray['status'] == 'OK'){
              var paso3 = document.createElement("div").innerHtml = resultArray.html;
              var paso2 = document.getElementById('paso2');
              console.log(paso2.parentNode);
                $('#paso2').after(paso3);
                $('#paso2').removeClass('on');
                $('#paso3').addClass('on');
                $('.boton').click(function(){
                  alert('hola');
                  var idCentro = $('#centros').find(":selected").attr('value');
                  console.log(idCentro);
                  Login.fn.selectCurse();
                });
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


Login.fn.selectCurse = function () {
  var idCentro = $('#centros').find(":selected").attr('value');
    var url = "http://localhost:8888/L-earn/web/registerTeacher/RegisterReceived.php";
    var data = {
      // accion a ejecutar en servidor
      action : 'insertCenter',
      // parametro que indica que es profesor
      idCenter: idCentro
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
            console.log(resultArray);
            if(resultArray['status'] == 'OK'){
                var paso4 = document.createElement("div").innerHtml = resultArray.html;
                var paso3 = document.getElementById('paso3');
                console.log(paso3.parentNode);
                $('#paso3').after(paso4);
                $('#paso3').removeClass('on');
                $('#paso4').addClass('on');
                
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


$("#box_profe").click(function(){
  Login.fn.selectCenter();
});


};
