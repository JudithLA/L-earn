function createRadioButton(textLabel, valResponse, idAppend) {
	var label = document.createElement("label");
	label.innerHTML = textLabel;

	var radio = document.createElement("input");
	radio.setAttribute('type', 'radio');
	radio.setAttribute('name', 'responses');
	radio.setAttribute('value', valResponse);

	label.prepend(radio);

	$("#"+idAppend).append(label);
}

$(document).ready(function () {
    var globals = {};
    globals.finPoints = 0;
    globals.questions = [];
    globals.responses = [];

    var urlParams = new URLSearchParams(window.location.search);
	var testFinId = urlParams.get("TestFinId");

    var testFinalName = function () {
        var url = "http://localhost:8888/L-earn/web/doTestFinStudent/doTestFinStudent.php";
        var data = {
            action : "getTestFinalName",
            TestFinId: testFinId
        };
        $.ajax({
            url: url,
            data: data,
            method: "GET",
            success: function (result) {
                resultTitles = JSON.parse(result);
                // console.log(resultTitles);

                var breadcrumbFirstItem = document.createElement("a");
                breadcrumbFirstItem.setAttribute("href", "../unitStudent/unitStudent.php?AsignId=" + resultTitles.IdAsign);
                breadcrumbFirstItem.innerHTML = resultTitles.NombreAsign;

                var breadcrumbSeparator1 = document.createElement("span");
                breadcrumbSeparator1.innerHTML = " · ";

                var breadcrumbSecondItem = document.createElement("a");
                breadcrumbSecondItem.setAttribute("href", "../testStudent/testStudent.php?UnitId=" + resultTitles.IdTema);
                breadcrumbSecondItem.innerHTML = "Tema "+resultTitles.OrdenTema;

                var breadcrumbSeparator2 = document.createElement("span");
                breadcrumbSeparator2.innerHTML = " · ";

                var breadcrumbThirdItem = document.createElement("span");
                breadcrumbThirdItem.innerHTML = "Test final";

                $("#breadcrumb").append(breadcrumbFirstItem);
                $("#breadcrumb").append(breadcrumbSeparator1);
                $("#breadcrumb").append(breadcrumbSecondItem);
                $("#breadcrumb").append(breadcrumbSeparator2);
                $("#breadcrumb").append(breadcrumbThirdItem);

                var testName = document.createElement("h3");
                testName.setAttribute("class", "test-title");
                testName.innerHTML = resultTitles.NombreFin;

                var testDesc = document.createElement("div");
                testDesc.setAttribute("class", "test-descr");
                testDesc.innerHTML = resultTitles.DescripcionFin;

                var makeTest = document.createElement("button");
                makeTest.setAttribute("id", "btnDoTest");
                makeTest.innerHTML = "Hacer test";
                $("#test-do").append(testName);
                $("#test-do").append(testDesc);
                $("#test-do").append(makeTest);

                $("#step-0").addClass("stepsSelected");

                $("#btnDoTest").on("click", function() {
                    doTestFinal();
                })
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });
    }
    testFinalName();

	var testFinalQuestions = function () {

		var url = "http://localhost:8888/L-earn/web/doTestFinStudent/doTestFinStudent.php";
		var data = {
			action : "getFinalQuestions",
			TestFinId: testFinId
		};
		$.ajax({
			url: url,
			data: data,
			method: "GET",
			success: function (result) {
				resultArray = JSON.parse(result);
				// console.log(resultArray);
				resultArray.forEach(function(elem){
					globals.questions.push(
						[parseInt(elem.PreguIdFin), elem.PreguntaFin]
					);
				});

				// console.log(globals.questions[0]);

			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});

    }
    testFinalQuestions();

	var testFinalResponses = function () {

		var url = "http://localhost:8888/L-earn/web/doTestFinStudent/doTestFinStudent.php";
		var data = {
            action : "getFinalResponses",
            TestFinId: testFinId
        };
        $.ajax({
            url: url,
            data: data,
            method: "GET",
            success: function (result) {
                resultArray = JSON.parse(result);
                // console.log(resultArray);
                resultArray.forEach(function(elem){
                    globals.responses.push(
                        [parseInt(elem.RespuIdFin), elem.RespuestaFin, parseInt(elem.PesoFin), parseInt(elem.CorrectaFin)]
                    );
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            }

        });

	}
	testFinalResponses();


    var doTestFinal = function () {
        $("#test-do").empty();
		// console.log(globals.questions[0]);
		console.log(globals.responses[0]);
		console.log(globals.responses[1]);
		console.log(globals.responses[2]);
		console.log(globals.responses[3]);

		var questionItem = document.createElement("div");
		questionItem.setAttribute("class", "questionItem");
		questionItem.innerHTML = globals.questions[0][1];

		$("#test-do").append(questionItem);

		var form = document.createElement("form");
		form.setAttribute("id", "responsesForm");
		$("#test-do").append(form);

		createRadioButton(globals.responses[0][1], globals.responses[0][0], "responsesForm");
		createRadioButton(globals.responses[1][1], globals.responses[1][0], "responsesForm");
		createRadioButton(globals.responses[2][1], globals.responses[2][0], "responsesForm");
		createRadioButton(globals.responses[3][1], globals.responses[3][0], "responsesForm");

		var continueTest = document.createElement("button");
		continueTest.setAttribute("id", "btnContinueTest");
		continueTest.innerHTML = "Continuar";
		$("#test-do").append(continueTest);

		$("label").on("click", function (event) {
			event.preventDefault();

			var idReponse = parseInt($(this).children().val());
			console.log(idReponse);
			console.log(globals.responses[idReponse][3]);

			if (globals.responses[idReponse][3] == 1){
				// $('label',this).css("background-color", "#66CDAA");
				console.log("correcta");
			} else {
				console.log("incorrecta");
			}
		});

        $("#btnContinueTest").on("click", function() {
            
        })
    }

});
