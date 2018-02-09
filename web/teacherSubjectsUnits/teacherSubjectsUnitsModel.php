<?php 
require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

class TeacherSubjectsUnitsModel{

	private $mysqli;

	public function __construct(){
		//definimos la conexión en construct para que todas las funciones puedan tirar de ella
		$this-> mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
	}
	public function __destruct(){}		

// Método para conectar con bbdd y ejecutar query que muestre los alumnos del grupo recogido por id en teacherStudentsController.php
	public function getSubjectsUnitsQuery($varSubjectId){
		//session para falsear el profesor
		//$_SESSION['id'] = 1;

		//query para mostrar los alumnos del grupo recogido por id en teacherStudentsController.php
		$consult = "SELECT ALUMN.NOMBRE_ALUMN AS AlumnName, ALUMN.APELLIDO_ALUMN AS AlumnSurname, ALUMN.EXPERIENCIA_ALUMN AS AlumnExperience, ALUMN.PUNTOS_ALUMN AS AlumnPoints FROM ALUMN WHERE ALUMN.ID_CURSO={$varSubjectId} ORDER BY ALUMN.APELLIDO_ALUMN";
	//mediante el objeto mysqli, almacenaremos los resultados de la query "$consult" en result. estos resultados serán obtenidos mediante el acceso al atributo $mysqli del método executeQuery(), que está incorporado en MysqlDBImplementation.php.
		//echo $consult;
		$result = $this->mysqli -> executeQuery($consult);

		return $result;

		}


	}
	


 ?>