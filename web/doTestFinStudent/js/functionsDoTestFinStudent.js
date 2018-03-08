function createRadioButton(textLabel, valResponse, idAppend) {
	var label = document.createElement("label");
	label.setAttribute("class", "answer");
	label.innerHTML = textLabel;

	var radio = document.createElement("input");
	radio.setAttribute('type', 'radio');
	radio.setAttribute('name', 'responses');
	radio.setAttribute('value', valResponse);

	label.prepend(radio);
	$("#"+idAppend).append(label);
}

function getDate() {
	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth()+1;
	var day = date.getDate();

	return [year, month, day].join("-");
}

$(document).ready(function () {
    var globals = {};
    globals.finPoints = 0;
    globals.questions = [];
    globals.responses = [];
	globals.currentQuestionIndex = 0;
	globals.currentResponseMinIndex = 0;
	globals.currentResponseMaxIndex = 0;
	globals.points = 0;

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
				resultArray.forEach(function(elem){
					globals.questions.push(
						[parseInt(elem.PreguIdFin), elem.PreguntaFin]
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
		$("#step-0").removeClass("stepsSelected");
		$("#step-1").addClass("stepsSelected");

		function loadQuestion(currentQuestion) {
			var questionItem = document.createElement("div");
			questionItem.setAttribute("class", "questionItem");
			questionItem.innerHTML = globals.questions[currentQuestion][1];
			$("#test-do").append(questionItem);

			var form = document.createElement("form");
			form.setAttribute("id", "responsesForm");
			$("#test-do").append(form);
		}
		loadQuestion(globals.currentQuestionIndex);

		function loadResponses() {
			globals.currentResponseMinIndex = globals.currentQuestionIndex * 4;
			globals.currentResponseMaxIndex = (globals.currentQuestionIndex * 4)+3;

			for (var i = globals.currentResponseMinIndex; i <= globals.currentResponseMaxIndex; i++) {
				createRadioButton(globals.responses[i][1], i, "responsesForm");
			}
		}
		loadResponses();

		var continueTest = document.createElement("button");
		continueTest.setAttribute("id", "btnContinueTest");
		continueTest.innerHTML = "Continuar";
		$("#test").append(continueTest);

		function checkAnswer() {
			$("label").on("click", function (event) {
				event.preventDefault();

				var indexReponse = $(this).children().val();

				if (globals.responses[indexReponse][3] == 1){
					console.log("correcta");
					$(this).closest("label").addClass("correct-answer");
				} else {
					console.log("incorrecta");
					$(this).closest("label").addClass("incorrect-answer");

					$("input[name=responses]").each(function(){
					    var indexAnswers = $(this).val();
						if (globals.responses[indexAnswers][3] == 1){
							console.log("correcta");
							$(this).closest("label").addClass("correct-answer");
						}
					})
				}

				globals.points += globals.responses[indexReponse][2];
			});
		}
		checkAnswer();

		function sendResultTest() {
			var date = getDate();

			var url = "http://localhost:8888/L-earn/web/doTestFinStudent/doTestFinStudent.php";
			var data = {
	            action: "getResultTest",
				date: date,
	            points: globals.points,
				TestFinId: testFinId
	        };
	        $.ajax({
	            url: url,
	            data: data,
	            method: "GET",
	            success: function (result) {
	                pointsUpdate = JSON.parse(result);
					var previousValue = $("#headPoints").text();

					$("#headPoints").prop('Counter', previousValue).animate({
						Counter: pointsUpdate
					},{
						duration: 2500,
						easing: 'swing',
						step: function (now) {
							$(this).text(Math.ceil(now));
						}
					});
	            },
	            error: function (jqXHR, textStatus, errorThrown) {
	                alert(jqXHR.status);
	                alert(textStatus);
	                alert(errorThrown);
	            }

	        });
		}

        $("#btnContinueTest").on("click", function() {
			globals.currentQuestionIndex ++;
			$("#test-do").empty();

			if (globals.currentQuestionIndex >= 10) {
				$("#test-do").html(globals.points);
				sendResultTest();
			}else {
				loadQuestion(globals.currentQuestionIndex);
				loadResponses();
				checkAnswer();
			}
        });
    }

});
