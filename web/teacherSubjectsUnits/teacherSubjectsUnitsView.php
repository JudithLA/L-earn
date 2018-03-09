<?php
require_once __DIR__ . "/../Commons/Commons.php";

class TeacherSubjectsUnitsView{

	public function __construct(){}
	public function __destruct(){}	

// unitsList() es el método con el que recorremos el resultado de la query que nos han pasado como parámetro (por eso aquí podríamos llamarlo $resultadoQuery o $Pepe, como en JAVA). Así estructuraremos el listado y lo concatenaremos al html de la función de vista.
//el bucle puedes hacerlo con un for [ for ($i=0; $i < 10; $i++)] o con un foreach o lo que quieras
// .= es una forma de asignación que asigna y concatena. primero inicializas una variable en $currentAlumn =''; y a esa variable le asignas/concatenas con .= el recorrido por el bucle entero, es decir, todos sus resultados en bloque.


	public function unitsList($resultadoQuery = null){
		$currentAlumn ='';
		foreach ($resultadoQuery as $element){
			$currentAlumn .= 
				'<li class="units-list-li">
					<div class="units-list-li-name">'.$element['unitName'].'</div>
				</li>';
				
		}
		return $currentAlumn;
	}

	//función para pintar el apartado de los grupos asociados a esa asignatura:
	public function groupsList($resultadoQuery2 = null){
		$currentGroup ='';
		foreach ($resultadoQuery2 as $element){
			$currentGroup .= 
				'<div class="groups-list-group" style="color:blue;">'.$element['groupLevel'].'º'.$element['groupLetter'].'</div>';
				
		}
		return $currentGroup;
	}

	//IMPORTANTE: cuando el método que queremos ejecutar está en la misma clase, señalamos con $this ($this->unitsList($resultadoQuery))
	//para acceder a la posición de un array, si no lo hubiésemos indicado en la consulta de getSubjectsUnitsBreadcrumb, tendríamos que añadir un corchete con el índice así: $resultadoQueryBreadcrumb[0]['SubjectId']
	public function viewUnits($resultadoQueryBreadcrumb, $resultadoQuery = null, $resultadoQuery2 = null){
		$resultHTML = "
			<!DOCTYPE html>
			<html>
			<head>
			<meta charset='utf-8'>
				<title>".$resultadoQueryBreadcrumb['SubjectName']."</title>
				<link rel='stylesheet' type='text/css' href='http://localhost:8888/L-earn/web/Commons/styles/commonStyleTeacher.css'>
				<link rel='stylesheet' type='text/css' href='style/style.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
				<script src='js/teacherSubjectsUnitsFunctions.js'></script>
			</head>
			<body>
			".Commons::teacherHeader()."

			<div class='wrapper'>

			<div class='main teacherSubjectsUnits'>
			<h2 class='breadcrumb-subject breadcrumb' id='".$resultadoQueryBreadcrumb['SubjectId']."'>".$resultadoQueryBreadcrumb['SubjectName']." ".$resultadoQueryBreadcrumb['SubjectLevel']."º</h2>
				<div class='wrapper'>	
					<div class='units display-iblock'>
						<ul class='units-list'>
					".$this->unitsList($resultadoQuery)."
						</ul>
					</div>
					<div class='groups display-iblock'>
						<h2> Grupos Asignados: </h2>
						<div class='groups-list' id='groups-prev-list'>
						".$this->groupsList($resultadoQuery2)."
						<button id='groups-edit' type='button'>MODIFICAR</button>
						</div>
						<form id='groups-edit-list'>
						</form>
						<div id='groups-adv'> </div>
					</div>
				</div>
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