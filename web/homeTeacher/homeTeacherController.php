<?php
//controller.php capta peticiones de usuario/llamadas y devuelve datos. NUNCA tiene querys. require del archivo model.php y view.php

require_once __DIR__ . "/homeTeacherModel.php";
require_once __DIR__ . "/homeTeacherView.php";

//clase que gestiona las llamadas con la pantalla de login
class HomeTeacherController{
	
	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}		

	public function getTeacherInfo(){
			$model = new HomeTeacherModel();
			$infoStu = $model->infoTeacher();
	}

	//método para obtener los grupos a los que imparte clases el profesor
	public function getTeacherGroups(){
		// Instanciamos un objeto de la clase HomeTeacherModel
		$model = new HomeTeacherModel();
		// Devolvemos la función de esa clase (la función de la clase del model.php)
		return $model->TeacherGroups();
	}

	//método para imprimir el view
	public function showViewTeacher(){
		$this->getTeacherInfo();
		// Instanciamos un objeto de la clase HomeTeacherView
		$view = new HomeTeacherView();
		// Devolvemos la función de esa clase (la función de la clase del view.php)
		return $view->viewTeacher();
	}
}


?>