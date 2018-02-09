<?php
require_once __DIR__ . "/../Commons/Commons.php";

class TeacherSubjectsUnitsView{

	public function __construct(){}
	public function __destruct(){}	

// studentsList() es el método con el que recorremos el resultado de la query que nos han pasado como parámetro (por eso aquí podríamos llamarlo $resultadoQuery o $Pepe, como en JAVA). Así estructuraremos el listado y lo concatenaremos al html de la función de vista.
//el bucle puedes hacerlo con un for o con un foreach o lo que quieras
	/*
			for ($i=0; $i < 10; $i++) { 
		}

	*/
	// .= es una forma de asignación que asigna y concatena. primero inicializas una variable en $currentAlumn =''; y a esa variable le asignas/concatenas con .= el recorrido por el bucle entero, es decir, todos sus resultados en bloque.
	public function studentsList($resultadoQuery = null){
		$currentAlumn ='';
		foreach ($resultadoQuery as $element){
			$currentAlumn .= 
				'<li class="list-alumn">
					<div class="list-alumn name">'.$element['AlumnName'].' '.$element['AlumnSurname'].'</div>
					<div class="list-alumn exp">'.$element['AlumnExperience'].'</div>
					<div class="list-alumn points">'.$element['AlumnPoints'].'</div>
				</li>';
				
		}
		return $currentAlumn;
	}

	//IMPORTANTE: cuando el método que queremos ejecutar está en la misma clase, señalamos con $this ($this->studentsList($resultadoQuery))
	public function viewStudents($resultadoQuery = null){
		$resultHTML = "
			<!DOCTYPE html>
			<html>
			<head>
			<meta charset='utf-8'>
				<title></title>
				<link rel='stylesheet' type='text/css' href='style/styleStudent.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			</head>
			<body>
			".Commons::teacherHeader()."

			<div class='main teacherStudents'>
				<ul class='list'>
			".$this->studentsList($resultadoQuery)."
				</ul>
			</div>
			".Commons::footer()."

			</body>
			</html>
		";
		return $resultHTML;
	}
	


}
?>