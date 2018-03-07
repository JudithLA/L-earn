$(document).ready(function(){

    var showTests = function () {
        var url = "http://localhost:8888/teacherTests/teacherTests.php";
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

                // resultArray.forEach(function(element){
                //     // Podemos acceder a la propiedad como si fuese un objeto de JavaScript o  como si fuese un vector
                //     //console.log("la asignatura " + element.SubjectName + " del curso " + element.SubjectLevel);
                //     //console.log("la asignatura  " + element['SubjectName'] + " del curso "  + element['SubjectLevel']);
                //     var nameSubject = element.SubjectName + " " + element.SubjectLevel + ' ESO ';

                //     //comentamos esto porque vamos a intentarlo hacer x ajax y no pasando parámetros por get
                //     var hrefSubject = '../teacherTestsUnits/teacherTestsUnits.php?action=getTestsUnits&SubjectLevel='+ element.SubjectLevel +'&SubjectId=' + element.SubjectId;

                //     var linkSubject = document.createElement('a');
                //     linkSubject.setAttribute('href',hrefSubject);
                //     linkSubject.setAttribute('class', 'teacherTests-list-subject');
                //     linkSubject.setAttribute('class', 'card-container');
                //     linkSubject.setAttribute('id', 'teacherTests' + element.SubjectId);


                //     var divSubject = document.createElement('div')
                //     divSubject.setAttribute('class', 'card-content');

                //     divSubject.innerHTML = nameSubject;

                //     linkSubject.append(divSubject);

                //     $('#teacherTests-list').append(linkSubject);


                //    });



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