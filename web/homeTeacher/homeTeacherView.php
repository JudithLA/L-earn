<?php
// FOOTER: para incluir el footer, deberíamos crear un archivo externo y llamarlo con el require. En el código de resultHTML, lo concatenas para llamar al método de la clase () que contoiene el archivo del require
//cuando introduzcamos el footer, hay que descomentar esto y la línea 40
require_once __DIR__ . "/../Commons/Commons.php";

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
				<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/Commons/styles/commonStyleTeacher.css'>
				<link rel='stylesheet' type='text/css' href='style/style.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
				<script src='js/homeTeacherFunctions.js'></script>
			</head>
			<body>
			".Commons::teacherHeader()."
			<div class='wrapper'>
			<div class='console'>
					<div id='console_group'></div>
				<div class='console_group_crear'><a href=''>CREAR NUEVO GRUPO</a></div>	
			</div>
			</div>

			".Commons::footer()."
			</body>
			</html>
		";
		return $resultHTML;
	}
}
?>