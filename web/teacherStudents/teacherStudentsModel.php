<?php 
require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

class TeacherStudentsModel{

	private $mysqli;

	public function __construct(){
		//cuando hay varias funciones, definimos la conexión en construct para que todas puedan tirar de ella
		$this-> mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
	}
	public function __destruct(){}		

// Método para conectar con bbdd y ejecutar query que muestre los alumnos del grupo recogido por id en teacherStudentsController.php
	public function getTeacherStudents($varIdGroup){
		//session para falsear el profesor
		//$_SESSION['id'] = 1;

		//query para mostrar los alumnos del grupo recogido por id en teacherStudentsController.php
		$consult = "SELECT ALUMN.NOMBRE_ALUMN AS AlumnName, ALUMN.APELLIDO_ALUMN AS AlumnSurname, ALUMN.EXPERIENCIA_ALUMN AS AlumnExperience, ALUMN.PUNTOS_ALUMN AS AlumnPoints FROM ALUMN WHERE ALUMN.ID_CURSO={$varIdGroup} ORDER BY ALUMN.APELLIDO_ALUMN";
	//mediante el objeto mysqli, almacenaremos los resultados de la query "$consult" en result. estos resultados serán obtenidos mediante el acceso al atributo $mysqli del método executeQuery(), que está incorporado en MysqlDBImplementation.php.
		//echo $consult;
		$result = $this->mysqli -> executeQuery($consult);

		return $result;

		}

		public function getTeacherStudentsBreadcrumb($varIdGroup){
		$consult = "SELECT CURSO.NIVEL_CURSO AS AlumnLevel, CURSO.LETRA_CURSO AS AlumnLetter FROM CURSO
			WHERE CURSO.ID_CURSO={$varIdGroup}";
		$result = $this->mysqli -> executeQuery($consult);

		//indicamos que del array que va a devolvernos, solo nos interesa la posición 0 —la primera—; aunque también podríamos hacerlo en la concatenación en function viewUnits
		return $result[0];
	}


	}
	


 ?>