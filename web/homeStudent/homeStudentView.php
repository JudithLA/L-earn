<?php 
//creamos clase de view
	class HomeStudentView{


	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}	

	//creación de método que te devuelve el HTML
	public function genHomeStudent() {
		//variable con el HTML –¡! con comillas simples–y habría que devolver esa variable
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
						<form>
							<input type='text' name='' placeholder='nombre'>
							<input type='text' name='' placeholder='contraseña'>

							<button>ENTRAR</button>
						</form>
					</div>

				</body>
				</html>
		";
		return $resultHTML;
	}

	}

?>