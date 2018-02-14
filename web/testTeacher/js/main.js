Login =  { fn: {}

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
              console.log(paso2.parentNode);
              $('#paso1').after(paso2);
              $('#paso1').removeClass('on');
              $('#paso2').addClass('on');
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


};
