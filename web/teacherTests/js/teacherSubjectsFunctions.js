$(document).ready(function(){

    var showTests = function () {
        var url = "http://localhost:8888/L-earn/web/teacherTests/teacherTests.php";
        var data = {
            action : "getTeacherTests",
        };

        $.ajax({
            url: url,
            data: data,
            method: "GET",

            success: function (result) {
                resultArray = JSON.parse(result);
                console.log(resultArray);

                resultArray.forEach(function(element){
                    var cardTest= "<span class='display-block destacado'>" + element.DesTestFinal + "</span>"  + element.AsignNameTest + ' ' + element.LevelTest + ' ESO ';
                    var hrefSubject = '../teacherTests/teacherTests.php?action=getTestsUnits&SIdTestFinal='+ element.IdTestFinal;

                    var linkTest = document.createElement('a');
                    linkTest.setAttribute('href',hrefSubject);
                    linkTest.setAttribute('class', 'teacherTests-list');
                    linkTest.setAttribute('class', 'card-container');
                    linkTest.setAttribute('id', 'teacherTests' + element.SubjectId);


                var divSubject = document.createElement('div')
                divSubject.setAttribute('class', 'card-content display-block');



                divSubject.innerHTML = cardTest;

                linkTest.append(divSubject);

                $('#teacherTests-list').append(linkTest);


                });



            },

            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });
    }
showTests();
/* -------------- AQUÍ SE CREARÍA OTRA VARIABLE CON UNA FUNCIÓN PARA LOS FILTROS 
    var filter1 = function(){


    }
*/
});