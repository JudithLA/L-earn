"<?php 
//creamos clase de view
	class LoginView{


	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}	

	//creación de método que te devuelve el HTML
	public function genLogin() {
		//variable con el HTML –¡! con comillas simples–y habría que devolver esa variable
		$resultHTML = "
			<!DOCTYPE html>
				<html>
				<head>
				<meta charset='utf-8'>
					<title></title>
				<link rel='stylesheet' type='text/css' href='login.css'>
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