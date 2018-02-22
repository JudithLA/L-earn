<?php
	// Clase de la Vista
	require __DIR__."/../Commons/Commons.php";

	class HomeStudentView{

		//Constructor (crea la clase)
		public function __construct(){}

		//Destructor (destruye la clase)
		public function __destruct(){}


		// Método que devolverá el HTML
		public function genHomeStudent() {
			// Variable con el HTML –con comillas simples–
			$resultHTML = "
				<!DOCTYPE html>
					<html>
					<head>
						<meta charset='utf-8'>
						<title>Home del Alumno</title>
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsHomeStudent.js'></script>
					</head>
					<body>
						" . Commons::headerStudent() . "
						<div class='content' id='currentInfo'>
							<div class='' id='nextTestAsign-wrap'>
								<div>
									<h2>Sigue donde lo dejaste</h2>
									<div id='nextTestAsign'>

									</div>
								</div>
							</div>
							<div id='progress'>
								<div>
									<h2>Mi progreso</h2>
									<div>
										<div id='pFin'>Puntuación: " . $_SESSION['finPoints'] . " PTOS.</div>
										<div id='pExp'>Experiencia: " . $_SESSION['percentage'] . " EXP.</div>
									</div>
								</div>
							</div>
						</div>
						<div id='ramdomTest' class= ''>
							<div  class='content'>
								<div>
										<h2>Test aleatorio</h2>
										<p>Un test aleatorio consiste en esto.</p>
										<input type='button' value='HACER TEST'>
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
