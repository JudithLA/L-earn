$(document).ready(function () {

	var urlParams = new URLSearchParams(window.location.search);
	var asignId = urlParams.get("AsignId");

	var title = function () {
		var url = "http://localhost:8888/L-earn/web/unitStudent/unitStudent.php";
		var data = {
			action : "getTitle",
			AsignId: asignId
		};
		$.ajax({
			url: url,
			data: data,
			method: "GET",
			success: function (result) {
				resultArray = JSON.parse(result);

				var asignName = document.createElement("span");
				asignName.innerHTML = resultArray.NombreAsign;
				$("#title").append(asignName);
      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}
		});
	}
	title();

	var units = function () {
		var url = "http://localhost:8888/L-earn/web/unitStudent/unitStudent.php";
		var data = {
			action : "getUnits",
			AsignId: asignId
		};
		$.ajax({
			url: url,
			data: data,
			method: "GET",
			success: function (result) {
				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){
					var linkUnit = document.createElement("a");
					linkUnit.setAttribute("href", "../testStudent/testStudent.php?UnitId=" + elem.IdTema);
					linkUnit.setAttribute("class", "unit trim" + elem.TrimTema);

					var imgUnit = document.createElement("img");
					imgUnit.setAttribute("alt", "Imagen del tema");
					imgUnit.setAttribute("src", elem.ImgTema);

					var nameUnit = document.createElement("div");
					nameUnit.innerHTML = elem.NombreTema;

					linkUnit.append(imgUnit);
					linkUnit.append(nameUnit);
					$("#reticule").append(linkUnit);
				});
      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}
	units();

	var passedQuarter = function () {
		var url = "http://localhost:8888/L-earn/web/unitStudent/unitStudent.php";
		var data = {
			action : "getPassedQuarter",
			AsignId: asignId
		};
		$.ajax({
			url: url,
			data: data,
			method: "GET",
			success: function (result) {
				resultArray = JSON.parse(result);

				var currentQuarter = resultArray.LAST_QUARTER;
				console.log("Trimestre actual: "+currentQuarter);

				// si es de 0 al trimestre actual

      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}
	passedQuarter();


});
