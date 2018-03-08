$(document).ready(function () {
	var url = "http://localhost:8888/L-earn/web/homeStudent/homeStudent.php";

	var showNextTest = function () {
		var data = {
			action: "getNextTest"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",
			success: function (result) {
				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){

					var linkLastTextAsign = document.createElement("a");
					linkLastTextAsign.setAttribute("href", "../doTestFinStudent/doTestFinStudent.php?TestFinId=" + elem.IdNextFinal);

					var imgLastTextAsign = document.createElement("img");
					imgLastTextAsign.setAttribute("alt", "Imagen del tema");
					imgLastTextAsign.setAttribute("src", elem.ImgTema);

					var nameLastTextAsign = document.createElement("div");
					nameLastTextAsign.innerHTML = elem.NombreAsign;

					var btnLastTextAsign = document.createElement("button");
					btnLastTextAsign.innerHTML = "Hacer el siguiente test";

					linkLastTextAsign.append(imgLastTextAsign);
					linkLastTextAsign.append(nameLastTextAsign);
					linkLastTextAsign.append(btnLastTextAsign);

					$("#nextTestAsign").append(linkLastTextAsign);
				});
      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}
	showNextTest();
});
