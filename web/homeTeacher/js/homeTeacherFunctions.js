$(document).ready(function(){

    var showGroups = function () {
        //definimos variable para la url del archivo de destino destino
        var url = "http://localhost:8888/homeTeacher/homeTeacher.php";
        //variable data que almacena los datos que mandamos al archivo de destino
        // data en este caso almacenará el método get del controller.php
        var data = {
            //¿en action se le asigna el método de mostrar del view.php?
            action : "getTeacherGroups",
        };


//LLAMADA A AJAX

        $.ajax({
            url: url,
            data: data,
            method: "POST",

/*
            //beforeSend es opcional para bloquear pestañas, preparar HTML...
            beforeSend: function () {
            },
*/
            //success muestra en JSON (porque lo parseas a JSON y lo atribuyes a la variable resultArray) lo que le indiques (dentro del parámetro result) si ha salido todo bien
            success: function (result) {
                resultArray = JSON.parse(result);
                //para comprobar que saca bien el json y saber cuáles son los identificados para llamarlos en el bucle foreach
                //console.log(resultArray);

                resultArray.forEach(function(element){
                    // Podemos acceder a la propiedad como si fuese un objeto de JavaScript
                    // console.log("el curso" + element.GroupLevel + "tiene una letra " + element.GroupLetter);
                    // Podemos acceder a la propiedad como si fuese un vector
                    //console.log(“el id” + element[‘id’] + “está asociado a “ + element[‘alumno’]);
                    var currentGroup = element.GroupLevel + ' ESO ' + element.GroupLetter;

                    var linkNameGroup = '../teacherStudents/teacherStudents.php?action=getStudentsGroups&GroupId=' + element.GroupId;

                    var linkGroup = document.createElement('a');
                    linkGroup.setAttribute('href',linkNameGroup);
                    //linkGroup.setAttribute('class', '');

                    var divGroup = document.createElement('div')
                    divGroup.innerHTML = currentGroup;
                    linkGroup.setAttribute('class', '');

                    //var linkAddGroup = document.createElement('a');
                    //linkGroup.setAttribute('href',currentGroup);
                    //linkGroup.setAttribute('class', '');

                    linkGroup.append(divGroup);

                    $('#console_group').append(linkGroup);


                    });
                

            },

            //error es un predeteerminado de sistema, pero puedes visualizarlo
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });
/*
        $.ajax({
            url: url,
            data: data,
            method: "GET",

            beforeSend: function () {
            },

            success: function (result) {
                resArray = JSON.parse(result);
                alert ('la operación ha salido '+ resArray['status']+' con resultado '+ resArray.result);
                console.log(resArray);
            },

            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });
*/
    }
//llamada a la función para que se ejecute
showGroups();
});