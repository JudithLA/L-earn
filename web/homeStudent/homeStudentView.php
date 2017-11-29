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
						<link rel='stylesheet' type='text/css' href='" . __DIR__ . "/style/styleStudent.css'>
						<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
						<script src='" . __DIR__ . "/js/loginProfe.js'></script>
					</head>
					<body>
						<div>
							<div>
								<h2>Mis asignaturas</h2>
							</div>
						</div>
						<div>
							<div>
								<h3>Mi progreso</h3>
							</div>
						</div>
						<div>
							<div>
								<a>
									<h2>Test aleatorio</h2>
									<p>Un test aleatorio consiste en esto.</p>
									<button>HACER TEST</button>
								</a>
							</div>
						</div>
						<footer>
							<div>
								<h5>Contacto</h5>
								<a href='mailto:contacto@learn.com'>contacto@learn.com</a>
							</div>
							<span>&copy; L-earn " . date("Y") . "</span>
						</footer>
					</body>
					</html>
			";
			return $resultHTML;
		}

	}

?>