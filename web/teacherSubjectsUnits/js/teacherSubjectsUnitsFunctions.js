$(document).ready(function(){

    var urlParams = new URLSearchParams(window.location.search);
    var subjectId = urlParams.get("SubjectId");
    var subjectLevel = urlParams.get("SubjectLevel");

    var checkArray = new Array();
    var noCheckArray = new Array ();

//el one lo puse para que tras haber modificado una vez, tengas que recargar la página para volver a hacerlo, porque si no llegaba un momento en el que desaparecía
    $('#groups-edit').one('click', function(){
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
                resultArray=JSON.parse(result);
                console.log(resultArray);

                // var ocultarList = document.getElementById('groups-prev-list');
                // ocultarList.style.display = 'none';
                $('#groups-prev-list').hide();


                resultArray.forEach(function(element){
                    var asignadosCheckbox = document.createElement('input');
                    asignadosCheckbox.setAttribute('type','checkbox');
                    asignadosCheckbox.setAttribute('name','groupId');
                    asignadosCheckbox.setAttribute('class','groupsCheckboxes')
                    asignadosCheckbox.setAttribute('value', element.groupId);
                    asignadosCheckbox.setAttribute('id', element.groupId);
                    if (element.groupChecked == 1) {
                        //con checked no sale nada en html, solo se muestra en pantalla como chequeado; con setAttribute sí que sale en html
                         asignadosCheckbox.checked = true;
                         //asignadosCheckbox.setAttribute('checked', 'checked')
                    };
                       

                    var asignadosGroups = document.createElement('label');
                    asignadosGroups.setAttribute('for', 'asignadosGroup' + element.groupId);
                    asignadosGroups.innerHTML = element.groupLevel + " " + element.groupLetter;


                    var asignadosForm = document.createElement('div');
                    asignadosForm.setAttribute('class', 'list-items_item');

                    asignadosForm.append(asignadosCheckbox);
                    asignadosForm.append(asignadosGroups);

                    $('#groups-edit-list').append(asignadosForm);

                    });

                var asignadosGuardar = document.createElement('button');
                    asignadosGuardar.setAttribute('type', 'button');
                    asignadosGuardar.setAttribute('id', 'groups-edit-list-save');
                    asignadosGuardar.innerHTML='GUARDAR';
                $('#groups-edit-list').append(asignadosGuardar);

                //el siguiente on('click') no funciona como función externa; por eso lo especificamos aquí y llamamos a una función que hemos definido fuera.
                $('#groups-edit-list-save').on('click', function(){
                    
                    $('.groupsCheckboxes').each(function(){
                        if($(this).is(':checked')){
                            //alert($(this).attr('id'));
                            checkArray.push($(this).attr('id'));
                        } else {
                            //alert($(this).attr('id'));
                            noCheckArray.push($(this).attr('id'));
                        }

                    });    

                    modifyGroups(); 
                });
            },

            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });
    });



//aquí definimos la función a la que llamamos cuando queremos guardar los cambios de los grupos asignados
//faltaría definir la llamada a ajax para hacer el update con los nuevos datos con la bbdd
    var modifyGroups = function(){
        console.log('checked: ' + JSON.stringify(checkArray), JSON.stringify(noCheckArray));

        $('#groups-edit-list').hide();

        $('#groups-adv').html('<span> Refresque la página para comprobar los cambios. </span>');


        var url = "http://localhost:8888/teacherSubjectsUnits/teacherSubjectsUnits.php";
        var data = {
            //action conduciría a la función del controller que contenga la query para mostrar todos los grupos posibles para esa asignatura
            action : "modifyGroupsSubjects",
            checkGroups: checkArray,
            noCheckGroups: noCheckArray,
            SubjectId: subjectId,
            SubjectLevel: subjectLevel

        };

        $.ajax({
            url: url,
            data: data,
            method: "POST",  

            success: function (result) {
                

            },

            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });


    }



});