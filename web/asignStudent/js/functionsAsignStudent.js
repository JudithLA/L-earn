$(document).ready(function () {
	var showAsignStudent = function () {

		var url = "http://localhost:8888/L-earn/web/asignStudent/asignStudent.php";

		var data = {
			action : "getAsignStudent"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",

			success: function (result) {
				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){
					var urlAsign = '../unitStudent/unitStudent.php?action=getUnitsStudent&AsignId=' + elem.IdAsign;

					var linkAsign = document.createElement('a');
					linkAsign.setAttribute('href', urlAsign);

					var imgAsign = document.createElement('img');
					imgAsign.setAttribute('alt', 'Imagen del tema');
					imgAsign.setAttribute('src', elem.ImgTema);

					var nameAsign = document.createElement('div');
					nameAsign.innerHTML =elem.NombreAsign;

					var btnDoTest = document.createElement('button');
					btnDoTest.setAttribute('id', 'btnDoTest');
					btnDoTest.innerHTML = "Hacer test";

					linkAsign.append(imgAsign);
					linkAsign.append(nameAsign);
					linkAsign.append(btnDoTest);

					$('#testAsign').append(linkAsign);
				});
      		},

			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

	showAsignStudent();

});
