<?php
	// Clase de la Vista
	require __DIR__."/../Commons/Commons.php";

	class TestStudentView{

		public function __construct(){}
		public function __destruct(){}


		public function showEntreTest($resultQueryEntre){
			foreach ($resultQueryEntre as $element){
				$testEntre .="
								<a href='#' class='test'>
									<div class=''>" . $element['NombreEntre'] . "</div>
									<div class='test-type'>TEST ENTRENAMIENTO</div>
								</a>
							";
			}
			return $testEntre;
		}

		public function showFinTest($resultQueryFinal){
			foreach ($resultQueryFinal as $element){
				$testFinal .="
								<a href='#' class='test'>
									<div class=''>" . $element['NombreFinal'] . "</div>
									<div class='test-type'>TEST FINAL</div>
								</a>
							";
			}
			return $testFinal;
		}

		public function showTestUnit($resultQueryEntre, $resultQueryFinal){
			$testUnit = "
							<h2>" . $element['NombreAsign'] . "</h2>
							<div id='reticule'>
						" . $this->showEntreTest($resultQueryEntre) . $this->showFinTest($resultQueryFinal) . "</div>";
			return $testUnit;
		}

		// Método que devolverá el HTML
		public function genTestUnit($resultQueryEntre, $resultQueryFinal) {
			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>Test del tema</title>
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsUnitStudent.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content'>
							<div class='l col9'>
								<div>
									" . $this->showTestUnit($resultQueryEntre, $resultQueryFinal) . "
								</div>
							</div>
						</div>
						" . Commons::footer() . "
					</body>
					</html>
			";
			return $resultHTML;
		}

	}

?>
