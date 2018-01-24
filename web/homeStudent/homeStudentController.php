<?php
	// Incluimos los archivos del Modelo y la Vista
	require_once __DIR__ . "/homeStudentModel.php";
	require_once __DIR__ . "/homeStudentView.php";

	// Clase del Controlador
	class HomeStudentController{

		// Creamos el atributo que almacenará el id del alumno que ha iniciado sesión
		// private $idAlumno;

		//Constructor (crea la clase)
		public function __construct(){

			// Asignamos la variable de sesión con el id del alumno al atributo
			// $this->idAlumno = $_SESSION['idAlumno'];
		}

		//Destructor (destruye la clase)
		public function __destruct(){}

		// Método para mostrar el HTML
		public function viewInfo(){

			/*
			// Necesito datos del modelo.
			// Instanciamos un objeto de la clase HomeStudentModel
			$model = new HomeStudentModel();

			// Llamamos al método del Modelo y le pasamos como parámetro el atributo $idAlumno
			$datosDeModel = $model->getDatos($this->idAlumno);
			*/

			$this->getPercentageStudentExpPoints();
			$this->getStudentFinPoints();
			$this->getInfoStudent();

			// Instanciamos un objeto de la clase HomeStudentView
			$view = new HomeStudentView();
			// Devolvemos el HTML generado en la vista
			return $view->genHomeStudent();
		}

		public function getInfoStudent(){

			$model = new HomeStudentModel();

			$infoStu = $model->infoStudent();


		}

		// Método para obtener el último test final realizado por el alumno
		public function getNextTest(){

			// Instanciamos un objeto de la clase HomeStudentModel
			$model = new HomeStudentModel();

			// Devolvemos la info extraída de la BBDD

			return $model->nextTest();

		}

		// Método para obtener el porcentaje de los puntos de experiencia total del alumno entre todas sus asignaturas
		public function getPercentageStudentExpPoints(){

			// Instanciamos un objeto de la clase HomeStudentModel
			$model = new HomeStudentModel();

			// Devolvemos la info extraída de la BBDD
			$percentage = $model->percentageStudentExpPoints();

			return $_SESSION['percentage'] = $percentage;

		}

		// Método para obtener los puntos finales totales del alumno
		public function getStudentFinPoints(){

			$model = new HomeStudentModel();

			$finPoints = $model->studentFinPoints();

			return $_SESSION['finPoints'] = $finPoints;

		}

	}

?>
