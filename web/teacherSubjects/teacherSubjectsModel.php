<?php 

require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class TeacherSubjectsModel{

		private $mysqli;

		public function __construct(){
			$this-> mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}
		public function __destruct(){}		

		// Método para conectar con bbdd y ejecutar una query que muestre las asignaturas del profesor
		public function teacherSubjectsQuery(){
			//falseamos la sesión:
			$_SESSION ["id"] = 1;

			//query que muestre las asignaturas del profesor y el curso de las mismas ordenadas por el nombre de la asignatura
			$consult = "SELECT ASIGN.ID_ASIGN AS SubjectId, ASIGN.NOMBRE_ASIGN AS SubjectName, ASIGN.NIVEL_ASIGN AS SubjectLevel FROM ASIGN WHERE ASIGN.ID_PROFE='{$_SESSION ["id"]}' ORDER BY ASIGN.NOMBRE_ASIGN";

		//mediante el objeto mysqli, almacenaremos los resultados de la query "$consult" en result. estos serán obtenidos mediante el acceso al atributo $mysqli del método executeQuery(), que está incorporado en MysqlDBImplementation.php.
			$result = $this->mysqli -> executeQuery($consult);

			return $result;
		}


	}
	


 ?>