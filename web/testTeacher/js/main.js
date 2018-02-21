Login =  { fn: {}

        };

window.onload=function(){


$('.btn-siguiente').click(function(){
  var url = "http://localhost:8888/L-earn/web/testTeacher/testTeacher.php";
  var data = {
    action: 'testPasoUnoController'
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
              var paso2 = document.createElement("div").innerHtml = resultArray.html;
              var paso1 = document.getElementById('window-test-1');
              console.log(paso2.parentNode);
              $('#window-test-1').after(paso2);
              $('#paso1').removeClass('on');
              $('#paso2').addClass('on');
              $('.asign').click(function () {
                  var id_asign = $(this).data("id");
                  var nivel_asign = $(this).data("nivel");
                  Login.fn.funcionDos(id_asign, nivel_asign);
              });
          } else {
              $('.msgError').html(resultArray['html']);
          }
      },

      error: function (jqXHR, textStatus, errorThrown) {
          alert(jqXHR.status);
          alert(textStatus);
          alert(errorThrown);
      }

  });
});


Login.fn.funcionDos = function(id_asign, nivel_asign){
  var url = "http://localhost:8888/L-earn/web/testTeacher/testTeacher.php";
  var data = {
    action: 'testPasoDosController',
    asign: id_asign,
    nivel: nivel_asign
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
              var paso3 = document.createElement("div").innerHtml = resultArray.html;
              var paso2 = document.getElementById('paso2');
              console.log(paso2.parentNode);
              $('#paso2').after(paso3);
              $('#paso2').removeClass('on');
              $('#paso3').addClass('on');
              $('.asignaturas').on('change', function () {
                  var id_tema = $(this).data("id");
                  Login.fn.funcionTres(id_tema);
              });
          } else {
              $('.msgError').html(resultArray['html']);
          }
      },

      error: function (jqXHR, textStatus, errorThrown) {
          alert(jqXHR.status);
          alert(textStatus);
          alert(errorThrown);
      }

  });
}


Login.fn.funcionTres = function(id_tema){
  var url = "http://localhost:8888/L-earn/web/testTeacher/testTeacher.php";
  var data = {
    action: 'testPasoTresController',
    tema: id_tema
  };

  $.ajax({
      url: url,
      data: data,
      method: "POST",

      beforeSend: function () {
      },

      success: function (result) {
        resultArray = JSON.parse(result);
            if(resultArray['status'] == 'OK'){
            var paso4 = document.createElement("div").innerHtml = resultArray.html;
            var paso3 = document.getElementById('paso3');
            console.log(paso4);
            $('#paso3').after(paso4);
            $('#paso3').removeClass('on');
            $('#paso4').addClass('on');
            // $('.btn-paso3').on('change', function () {
            //     var id_asign = $(this).data("id");
            //     var trimestre = $(this).data("trimestre");
            //     alert(id_asign);
            //     Login.fn.funcionTres(id_asign);
            // });
      } else {
            $('.msgError').html(resultArray['html']);
        }
        },

        error: function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.status);
            alert(textStatus);
            alert(errorThrown);
        }

        });
        }

};
