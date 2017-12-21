$(document).ready(function () {

	// Función para mostrar el siguiente test
	var showNextTest = function () {
		
		var url = "http://localhost/web/homeStudent/homeStudent.php";

		var data = {
			action : "getNextTest"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",

			success: function (result) {

				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){
					// Accedemos al último test
					var nexTest = parseInt(elem.FinalTest) + 1;

					// Creamos un enlace
					var linkLastTextAsign = document.createElement('a');
					linkLastTextAsign.setAttribute('href', nexTest);

					// Creamos una imagen
					var imgLastTextAsign = document.createElement('img');
					imgLastTextAsign.setAttribute('alt', 'Imagen del tema');
					imgLastTextAsign.setAttribute('src', elem.ImgTema);

					// Creamos un div
					var nameLastTextAsign = document.createElement('div');
					nameLastTextAsign.innerHTML = elem.NombreAsign;

					// Creamos un botón
					var btnLastTextAsign = document.createElement('button');
					btnLastTextAsign.innerHTML = "Hacer el siguiente test";

					linkLastTextAsign.append(imgLastTextAsign);
					linkLastTextAsign.append(nameLastTextAsign);
					linkLastTextAsign.append(btnLastTextAsign);

					// console.log("El FinalTest es " + elem.FinalTest + ", el IdLastTestDone es " + elem.IdLastTestDone + ", el DateLastTestDone es " + elem.DateLastTestDone + " y el nombre de la asignatura es " + elem.NombreAsign);
					
					$('#nextTestAsign').append(linkLastTextAsign);
				});

				// $('#asign').html(nombreAsign);
            },

			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

	showNextTest();

	// Función para mostrar los puntos finales
	var showFinPoints = function () {
		
		// Almacenamos en una variable la url del archivo de destino 
		var url = "http://localhost/web/homeStudent/homeStudent.php";

		// Almacenamos en una variable los datos que mandamos al archivo de destino
		// Aquí llamamos al método del Controlador
		var data = {
			action : "getStudentFinPoints"
		};


		$.ajax({
			url: url,
			data: data,
			method: "POST",

			// Si todo ok, imprimimos los datos en el HTML
			success: function (result) {

				$('#pFin').html('Puntuación: ' + result);
            },

            // Si error, mostramos en alerts mensajes
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

	// Ejecutamos la función
	showFinPoints();

	// Función para mostrar el porcentaje de experiencia
	var showPercentage = function () {
		
		var url = "http://localhost/web/homeStudent/homeStudent.php";

		var data = {
			action : "getPercentageStudentExpPoints"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",

			success: function (result) {

				$('#pExp').html('Experiencia: ' + result + '%');
            },

			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

	showPercentage();


});