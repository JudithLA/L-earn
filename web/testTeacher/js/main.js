Login =  { fn: {},
          tema: "",
          tipoTest:"",
          idTest:"",
          question:0

        };

window.onload=function(){


$('#btn-next').click(function(){
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
              var paso1 = document.getElementById('paso1');
              console.log(paso1.parentNode);
              $('#paso1').after(paso2);
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

                  var id_tema = $(this).find(":selected").data('id');
                  console.log(id_tema);
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
  console.log(id_tema);
  Login.tema = id_tema;
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
                  $( "form.type-text" ).submit(function( event ) {
                      var tipoTest = $('input[name=type-test]:checked').val();
                      var tituloTest = $('input[name=nameTest]').val();
                      var descripcionTest = $('input[name=descripcionTest]').val();
                      alert (tipoTest);
                      event.preventDefault();
                      Login.fn.funcionCuatro(tipoTest, tituloTest, descripcionTest);
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


};



Login.fn.funcionCuatro = function(tipoTest, tituloTest, descripcionTest){
  console.log(Login);
  var url = "http://localhost:8888/L-earn/web/testTeacher/testTeacher.php";
  Login.tipoTest = tipoTest;
  var data = {
      action: 'testPasoCuatroController',
      tipoTest : tipoTest,
      titulo: tituloTest,
      descripcion : descripcionTest,
      tema : Login.tema
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
                  var paso5 = document.createElement("div").innerHtml = resultArray.html;
                  var paso4 = document.getElementById('paso4');
                  console.log(paso5);
                  $('#paso4').after(paso5);
                  $('#paso4').removeClass('on');
                  $('#paso5').addClass('on');
                  $( ".btn-start-test" ).click(function () {
                      var idTest = $('#paso5').data('idtest');
                      var tipoTest = $('#paso5').data('tipo');
                      event.preventDefault();
                      Login.fn.funcionCinco(idTest, tipoTest);
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
  };


  Login.fn.funcionCinco = function(idTest, tipoTest){
    console.log(Login);
    Login.idTest = idTest;
    var url = "http://localhost:8888/L-earn/web/testTeacher/testTeacher.php";
    var data = {
        action: 'testPasoCincoController',
        idTest : idTest,
        tipoTest : tipoTest
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
                    var paso6 = document.createElement("div").innerHtml = resultArray.html;
                    var paso5 = document.getElementById('paso5');
                    console.log(paso5);
                    $('#paso5').after(paso6);
                    $('#paso5').removeClass('on');
                    $('#paso6').addClass('on');
                    $( ".btn-next-pregunta" ).click(function() {
                        var enunciado = $('input[name=enunciado]').val();
                        var s1 = [];
                        var idTest = $('input[name=enunciado]').data('id');

                        var tipoTest = $('input[name=enunciado]').data('tipo');
                        $(".item-respuesta").each(function(){
                            var row = [];
                            row.push($(this).find('input[name=enunciado]').val());
                            row.push($(this).find(':selected').data('peso'));
                            var correctAnswer = $(this).find('input[name=true]:checked').val();
                            console.log(correctAnswer);

                            if(typeof(correctAnswer) == "undefined"){
                            //if(!correctAnswer){
                              correctAnswer = '0';
                            }else {
                              correctAnswer = '1';
                            }
                            row.push(correctAnswer);

                            // add the temp array to the main array
                            s1.push(row);
                        });

                        event.preventDefault();
                        console.log(s1);

                        Login.fn.funcionSeis(enunciado, s1, idTest, tipoTest);
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
    };


    function save(){
      $('#paso6').find('input').val('');
      $('.pesoRespuesta').selectedIndex = '1';
      var pregunta = $('.btn-next-pregunta').data('test');
      console.log(pregunta);
      Login.question++;
      console.log(Login.question);
      if(Login.question == 10){
        alert('FIN');
      }
    }


    Login.fn.funcionSeis = function(enunciado, s1, idTest, tipoTest){
      console.log(Login);
      var url = "http://localhost:8888/L-earn/web/testTeacher/testTeacher.php";
      Login.tipoTest = tipoTest;
      var data = {
          action: 'testPasoSeisController',
          enunciado : enunciado,
          s1: s1,
          idTest: idTest,
          tipoTest: tipoTest
      };

      save();

      $.ajax({
          url: url,
          data: data,
          method: "POST",

          beforeSend: function () {
          },

          success: function (result) {
            // resultArray = JSON.parse(result);
            //     if(resultArray['status'] == 'OK'){
            //           var paso5 = document.createElement("div").innerHtml = resultArray.html;
            //           var paso4 = document.getElementById('paso4');
            //           console.log(paso5);
            //           $('#paso4').after(paso5);
            //           $('#paso4').removeClass('on');
            //           $('#paso5').addClass('on');
            //           $( ".btn-start-test" ).click(function () {
            //               var tipoTest = $('input[name=type-test]:checked').val();
            //               var tituloTest = $('input[name=nameTest]').val();
            //               event.preventDefault();
            //               // Login.fn.funcionCinco();
            //           });
            //     } else {
            //           $('.msgError').html(resultArray['html']);
            //       }
            },

            error: function (jqXHR, textStatus, errorThrown) {
                // alert(jqXHR.status);
                // alert(textStatus);
                // alert(errorThrown);
            }

            });
      };

};
