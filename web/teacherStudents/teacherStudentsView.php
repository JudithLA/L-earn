<?php
require_once __DIR__ . "/../Commons/Commons.php";

class TeacherStudentsView{

	public function __construct(){}
	public function __destruct(){}	

// studentsList() es el método encargado de recorrer el resultado de la query que nos han pasado como parámetro (por eso aquí podríamos llamarlo $resultadoQuery o $Pepe, como en JAVA). Así estructuraremos el listado y lo concatenaremos al html de la función de vista.
//el bucle puedes hacerlo con un for [for ($i=0; $i < 10; $i++) { ] o con un foreach o lo que quieras

	// .= es una forma de asignación que asigna y concatena. primero inicializas una variable en $currentAlumn =''; y a esa variable le asignas/concatenas con .= el recorrido por el bucle entero, es decir, todos sus resultados en bloque.
	public function studentsList($resultadoQuery = null){
		$currentAlumn ='';
		foreach ($resultadoQuery as $element){
			$currentAlumn .= 
				'<li class="list-alumn">
					<div class="list-alumn name display-iblock">'.$element['AlumnName'].' '.$element['AlumnSurname'].'</div>
					<div class="list-alumn exp display-iblock">'.$element['AlumnExperience'].' exp. </div>
					<div class="list-alumn points display-iblock">'.$element['AlumnPoints'].' pts.</div>
				</li>';
				
		}
		return $currentAlumn;
	}

	//IMPORTANTE: cuando el método que queremos ejecutar está en la misma clase, señalamos con $this ($this->studentsList($resultadoQuery))
	// $resultadoQuery = null asegura que si no le pasamos parámetro, le asigna el valor nulo
	public function viewStudents($resultadoQueryBreadcrumb = null, $resultadoQuery = null){
		$resultHTML = "
			<!DOCTYPE html>
			<html>
			<head>
			<meta charset='utf-8'>
				<title>".$resultadoQueryBreadcrumb['AlumnLevel'].$resultadoQueryBreadcrumb['AlumnLetter']."</title>
				<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/Commons/styles/commonStyleTeacher.css'>
				<link rel='stylesheet' type='text/css' href='style/style.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			</head>
			<body>
			".Commons::teacherHeader()."
			<div class='wrapper'>

			<h2 class='breadcrumb-subject breadcrumb'>".$resultadoQueryBreadcrumb['AlumnLevel']."º".$resultadoQueryBreadcrumb['AlumnLetter']."</h2>

			<div class='main teacherStudents'>

				<ul class='list'>
			".$this->studentsList($resultadoQuery)."
				</ul>
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