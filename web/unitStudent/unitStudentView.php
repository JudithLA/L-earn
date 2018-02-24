<?php
	// Clase de la Vista
	require __DIR__."/../Commons/Commons.php";

	class UnitStudentView{
		public function __construct(){}
		public function __destruct(){}

		public function genUnitsStudent() {
			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>Temas de las asignaturas del alumno</title>
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsUnitStudent.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content'>
							<div class='l col9'>
								<div id='reticule'>

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
