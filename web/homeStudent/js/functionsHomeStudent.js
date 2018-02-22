$(document).ready(function () {

	// Función para mostrar el siguiente test
	var showLastTest = function () {

		var url = "http://localhost:8888/L-earn/web/homeStudent/homeStudent.php";

		var data = {
			action : "getLastTest"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",

			success: function (result) {

				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){

					// Creamos un enlace
					var linkLastTextAsign = document.createElement('a');
					linkLastTextAsign.setAttribute('href', '#');

					// Creamos una imagen
					var imgLastTextAsign = document.createElement('img');
					imgLastTextAsign.setAttribute('alt', 'Imagen del tema');
					imgLastTextAsign.setAttribute('src', elem.ImgTema);

					// Creamos un div
					var nameLastTextAsign = document.createElement('div');
					nameLastTextAsign.innerHTML = elem.NombreAsign;

					// Creamos un botón
					var btnLastTextAsign = document.createElement('input');
					btnLastTextAsign.setAttribute('type', 'button');
					btnLastTextAsign.setAttribute('value', 'Hacer el siguiente test');

					linkLastTextAsign.append(imgLastTextAsign);
					linkLastTextAsign.append(nameLastTextAsign);
					linkLastTextAsign.append(btnLastTextAsign);

					$('#nextTestAsign').append(linkLastTextAsign);

				});
      		},

			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

	showLastTest();


});
