<?php
//controller.php capta peticiones de usuario/llamadas y devuelve datos. NUNCA tiene querys. require del archivo model.php y view.php

require_once __DIR__ . "/homeTeacherModel.php";
require_once __DIR__ . "/homeTeacherView.php";

//clase que gestiona las llamadas con la pantalla de login
class HomeTeacherController{
	
	public function infoSession(){
	$_SESSION['id'] = 1;
	//SUBSTRING(nombre_campo, i, numerocaracteresquequierescortar) corta la selección según los parámetros que indiques: el primero es el índice donde quieres que inicie el corte y la siguiente cifra es la cantidad de caracteres que quieres que recorte. SUBSTRING(APELLIDO_PROFE, 1, 1) de un campo como Gómez, extraería una letra empezando por la primera cifra AKA G
	//CONCAT sirve para concatenar en sql. Su funcionamiento es: CONCAT(nombre_campo, ' ') y entre las comillas simples escribir lo que te interese concatenar (un espacio, una frase, un punto...)
		
	$_SESSION['id'] = 1;

	$consult = "SELECT CONCAT(NOMBRE_PROFE, ' ') AS teacherName, CONCAT(SUBSTRING(APELLIDO_PROFE, 1, 1), '. ') AS teacherSurname, IMG_PROFE FROM ALUMN WHERE ID_ALUMN = '{$_SESSION["id"]}'";

	$result = $this->mysqli -> executeQuery($consult);

	$_SESSION['teacherName'] = $result[0]['teacherName'];
	$_SESSION['teacherSurname'] = $result[0]['teacherSurname'];
	$_SESSION['teacherIMG'] = $result[0]['IMG_PROFE'];

}
	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}		

	//método para obtener los grupos a los que imparte clases el profesor
	public function getTeacherGroups(){
		// Instanciamos un objeto de la clase HomeTeacherModel
		$model = new HomeTeacherModel();
		// Devolvemos la función de esa clase (la función de la clase del model.php)
		return $model->TeacherGroups();
	}

	//método para imprimir el view
	public function showViewTeacher(){
		//$_GET['idClass'];
		// Instanciamos un objeto de la clase HomeTeacherView
		$view = new HomeTeacherView();
		// Devolvemos la función de esa clase (la función de la clase del view.php)
		return $view->viewTeacher();
	}
}


?>