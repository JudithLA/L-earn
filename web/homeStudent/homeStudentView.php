<?php
	// Clase de la Vista
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
						<title>Home del Profesor</title>
						<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='js/functionsHomeStudent.js'></script>
					</head>
					<body>
						<div class='content'>
							<div class='l col9'>
								<div>
									<h2>Sigue donde lo dejaste</h2>
									<div id='nextTestAsign'>

									</div>
								</div>
							</div>
							<div class='l col3'>
								<div>
									<h3>Mi progreso</h3>
									<div>
										<div id='pFin'></div>
										<div id='pExp'></div>
									</div>
								</div>
							</div>
						</div>
						<div id='ramdomTest' class= 'l col12'>
							<div  class='content'>
								<div>
									<a>
										<h2>Test aleatorio</h2>
										<p>Un test aleatorio consiste en esto.</p>
										<button>HACER TEST</button>
									</a>
								</div>
							</div>
						</div>

						<footer class= 'l col12'>
							<div class='content'>
								<div>
									<h5>Contacto</h5>
									<a href='mailto:contacto@learn.com'>contacto@learn.com</a>
								</div>
								<span>&copy; L-earn " . date("Y") . "</span>
							</div>
						</footer>
					</body>
					</html>
			";
			return $resultHTML;
		}

	}

?>
