$(document).ready(function(){

    var showStudents = function (groupId) {
        var url = "http://localhost:8888/L-earn/web/teacherStudents/teacherStudents.php";
        // data almacena el método get del controller.php
        var data = {
            action : "getStudentsGroups",
            GroupId : groupId
        };

//LLAMADA A AJAX
    $.ajax({
        url: url,
        data: data,
// ¿ESTO EN ESTE CASO SERÍA GET, NO?
        method: "GET",  

/*
        //beforeSend es opcional para bloquear pestañas, preparar HTML...
        beforeSend: function () {
        },
*/
    //success muestra en JSON lo que le indiques si ha salido todo bien
        success: function (result) {
            console.log(result);
            resultArray=JSON.parse(result);
            //pruebas: comprobar que saca bien el json y saber cuáles son sus identificadores para llamarlos posteriormente
            console.log(resultArray);
        },
    //error es un predeteerminado de sistema, pero puedes visualizarlo
        error: function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.status);
            alert(textStatus);
            alert(errorThrown);
        }

        });
    }

showStudents();
});