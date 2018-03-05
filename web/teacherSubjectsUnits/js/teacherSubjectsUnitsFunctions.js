$(document).ready(function(){

    var urlParams = new URLSearchParams(window.location.search);
    var subjectId = urlParams.get("SubjectId");
    var subjectLevel = urlParams.get("SubjectLevel");
    //console.log(subjectLevel);

    $('#groups-edit').click(function(){
        var url = "http://localhost:8888/teacherSubjectsUnits/teacherSubjectsUnits.php";
        var data = {
            //action conduciría a la función del controller que contenga la query para mostrar todos los grupos posibles para esa asignatura
            action : "getAllGroupsSubjects",
            SubjectId: subjectId,
            SubjectLevel: subjectLevel
        };
            $.ajax({
            url: url,
            data: data,
            method: "GET",  

            success: function (result) {
                console.log(result);
                //resultArray=JSON.parse(result);
                //pruebas: comprobar que saca bien el json y saber cuáles son sus identificadores para llamarlos posteriormente
                //console.log(resultArray);

                // resultArray.forEach(function(element){
                //     // Podemos acceder a la propiedad como si fuese un objeto de JavaScript o  como si fuese un vector
                //     //console.log("la asignatura " + element.SubjectName + " del curso " + element.SubjectLevel);
                //     //console.log("la asignatura  " + element['SubjectName'] + " del curso "  + element['SubjectLevel']);
                //     var nameSubject = element.SubjectName + " " + element.SubjectLevel + ' ESO ';

                //     //comentamos esto porque vamos a intentarlo hacer x ajax y no pasando parámetros por get
                //     var hrefSubject = '../teacherSubjectsUnits/teacherSubjectsUnits.php?action=getSubjectsUnits&SubjectLevel='+ element.SubjectLevel +'&SubjectId=' + element.SubjectId;

                //     var linkSubject = document.createElement('a');
                //     linkSubject.setAttribute('href',hrefSubject);
                //     linkSubject.setAttribute('class', 'teacherSubjects-list-subject');
                //     linkSubject.setAttribute('id', 'teacherSubjects' + element.SubjectId);


                //     var divSubject = document.createElement('div')
                //     divSubject.innerHTML = nameSubject;

                //     linkSubject.append(divSubject);

                //     $('#teacherSubjects-list').append(linkSubject);


                //     });
            },
        //error es un predeteerminado de sistema, pero puedes visualizarlo
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

            });
    });

});