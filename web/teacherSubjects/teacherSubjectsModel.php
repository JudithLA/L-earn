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
			$consult = "SELECT DISTINCT ASIGN.ID_ASIGN AS SubjectId, ASIGN.NOMBRE_ASIGN AS SubjectName, CURSO.NIVEL_CURSO AS SubjectLevel FROM ASIGN
				INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
				INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
				INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
				WHERE PROFE.ID_PROFE ='{$_SESSION ["id"]}' ORDER BY ASIGN.NOMBRE_ASIGN";

			/*
			//otra forma de hacerla misma query:
			$consult = "SELECT DISTINCT CURSO.NIVEL_CURSO AS SubjectLevel, ASIGN.ID_ASIGN AS SubjectId, ASIGN.NOMBRE_ASIGN AS SubjectName FROM PROFE
					INNER JOIN ASIGN ON PROFE.ID_PROFE = ASIGN.ID_PROFE
					INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
					INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
					WHERE PROFE.ID_PROFE ='{$_SESSION ["id"]}'";
			*/

		//mediante el objeto mysqli, almacenaremos los resultados de la query "$consult" en result. estos serán obtenidos mediante el acceso al atributo $mysqli del método executeQuery(), que está incorporado en MysqlDBImplementation.php.
			$result = $this->mysqli -> executeQuery($consult);

			return $result;
		}


	}
	
// (SELECT CURSO.NIVEL_CURSO FROM ASIGN
// 				INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
// 				INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
// 				INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
// 				WHERE PROFE.ID_PROFE =1 GROUP BY CURSO.NIVEL_CURSO) AS SubjectLevel

 ?>