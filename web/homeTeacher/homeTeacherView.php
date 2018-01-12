<?php
// FOOTER: para incluir el footer, deberíamos crear un archivo externo y llamarlo con el require. En el código de resultHTML, lo concatenas para llamar al método de la clase () que contoiene el archivo del require
require_once __DIR__ . "/../Commons/Commons.php"

//creamos clase de view
class HomeTeacherView{
	//siempre comenzaremos creando la función Construct (crea la clase)y Destruct (Destruye la clase)
	public function __construct(){}
	public function __destruct(){}	

	//creamos método que devuelva HTML
	public function viewTeacher(){
		// creas una variable ($resultHTML) con el HTML –¡! con comillas simples–y habría que devolver esa variable
		$resultHTML = "
			<!DOCTYPE html>
			<html>
			<head>
			<meta charset='utf-8'>
				<title></title>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
				<script src='js/homeTeacherFunctions.js'></script>
			</head>
			<body>
			<header>
				<nav>
					<ul>
						<li><a href=''>Alumnos</a></li>
						<li><a href=''>Asignaturas</a></li>
						<li><a href=''>Tests</a></li>

					</ul>
				</nav>
			</header>

			<div class='console'>
					<div id='console_group'></div>
				<div class='console_group_crear'><a href=''>CREAR NUEVO GRUPO</a></div>	
			</div>
			".Commons::footer()."

			</body>
			</html>
		";
		return $resultHTML;
	}
}
?>