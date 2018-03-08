$(document).ready(function () {

    var urlParams = new URLSearchParams(window.location.search);
	var unitId = urlParams.get("UnitId");

	var url = "http://localhost:8888/L-earn/web/testStudent/testStudent.php";

    var titles = function () {
		var data = {
			action : "getTitles",
			UnitId: unitId
		};
		$.ajax({
			url: url,
			data: data,
			method: "GET",
			success: function (result) {
				resultTitles = JSON.parse(result);
                console.log(resultTitles);

                var breadcrumbFirstItem = document.createElement("a");
                breadcrumbFirstItem.setAttribute("href", "../unitStudent/unitStudent.php?AsignId=" + resultTitles.IdAsign);
                breadcrumbFirstItem.innerHTML = resultTitles.NombreAsign;

                var breadcrumbSeparator = document.createElement("span");
                breadcrumbSeparator.innerHTML = " · ";

                var breadcrumbSecondItem = document.createElement("span");
                breadcrumbSecondItem.innerHTML = "Tema "+resultTitles.OrdenTema;

                $("#breadcrumb").append(breadcrumbFirstItem);
                $("#breadcrumb").append(breadcrumbSeparator);
                $("#breadcrumb").append(breadcrumbSecondItem);

                var unitNumber = document.createElement("span");
                unitNumber.innerHTML = "Tema "+resultTitles.OrdenTema+". ";
                var unitTitle = document.createElement("span");
                unitTitle.innerHTML = resultTitles.NombreTema;

                $("#title").append(unitNumber);
                $("#title").append(unitTitle);
      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}
	titles();


    var testEntre = function () {
		var data = {
			action : "getTestEntre",
			UnitId: unitId
		};
		$.ajax({
			url: url,
			data: data,
			method: "GET",
			success: function (result) {
				resultArray = JSON.parse(result);
                console.log(resultArray);

				resultArray.forEach(function(elem){
					var linkTest = document.createElement("a");
					linkTest.setAttribute("href", "../doTestExpStudent/doTestExpStudent.php?TestExpId=" + elem.IdEntre);
					linkTest.setAttribute("class", "test testEntre");

					var nameTest = document.createElement("div");
					nameTest.innerHTML = elem.NombreEntre;

                    var typeTest = document.createElement("div");
					typeTest.innerHTML = "TEST ENTRENAMIENTO";
                    typeTest.setAttribute("class", "test-type");

					linkTest.append(nameTest);
					linkTest.append(typeTest);
					$("#reticule").append(linkTest);
				});
      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}
	testEntre();

    var testFinal = function () {
        var data = {
            action : "getTestFinal",
            UnitId: unitId
        };
        $.ajax({
            url: url,
            data: data,
            method: "GET",
            success: function (result) {
                resultArray = JSON.parse(result);
                console.log(resultArray);

                var linkTest = document.createElement("a");
                linkTest.setAttribute("href", "../doTestFinStudent/doTestFinStudent.php?TestFinId=" + resultArray.IdFinal);
                linkTest.setAttribute("class", "test testFinal");

                var nameTest = document.createElement("div");
                nameTest.innerHTML = resultArray.NombreFinal;

                var typeTest = document.createElement("div");
                typeTest.innerHTML = "TEST FINAL";
                typeTest.setAttribute("class", "test-type");

                linkTest.append(nameTest);
                linkTest.append(typeTest);
                $("#reticule").append(linkTest);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });
    }
    testFinal();

});
