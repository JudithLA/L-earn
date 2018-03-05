$(document).ready(function(){

    var showSubjects = function () {
        var url = "http://localhost:8888/teacherSubjects/teacherSubjects.php";
        var data = {
            //¿en action se le asigna la función/método del model de la clase de controller?
            action : "getTeacherSubjects",
        };

//LLAMADA A AJAX

        $.ajax({
            url: url,
            data: data,
            method: "GET",

            //success muestra en JSON (porque lo parseas a JSON y lo atribuyes a la variable resultArray) lo que le indiques (dentro del parámetro result) si ha salido todo bien
            success: function (result) {
                resultArray = JSON.parse(result);
                //console.log(resultArray);

                resultArray.forEach(function(element){
                    // Podemos acceder a la propiedad como si fuese un objeto de JavaScript o  como si fuese un vector
                    //console.log("la asignatura " + element.SubjectName + " del curso " + element.SubjectLevel);
                    //console.log("la asignatura  " + element['SubjectName'] + " del curso "  + element['SubjectLevel']);
                    var nameSubject = element.SubjectName + " " + element.SubjectLevel + ' ESO ';

                    //comentamos esto porque vamos a intentarlo hacer x ajax y no pasando parámetros por get
                    var hrefSubject = '../teacherSubjectsUnits/teacherSubjectsUnits.php?action=getSubjectsUnits&SubjectLevel='+ element.SubjectLevel +'&SubjectId=' + element.SubjectId;

                    var linkSubject = document.createElement('a');
                    linkSubject.setAttribute('href',hrefSubject);
                    linkSubject.setAttribute('class', 'teacherSubjects-list-subject');
                    linkSubject.setAttribute('class', 'card-container');
                    linkSubject.setAttribute('id', 'teacherSubjects' + element.SubjectId);


                    var divSubject = document.createElement('div')
                    divSubject.setAttribute('class', 'card-content');

                    divSubject.innerHTML = nameSubject;

                    linkSubject.append(divSubject);

                    $('#teacherSubjects-list').append(linkSubject);


                    });



            },

            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });
    }
showSubjects();
/* -------------- AQUÍ SE CREARÍA OTRA VARIABLE CON UNA FUNCIÓN PARA 
    var showUnits = function(){


    }
*/
});