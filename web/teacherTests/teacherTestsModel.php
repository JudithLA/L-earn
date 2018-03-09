<?php 

require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class TeacherTestsModel{

		private $mysqli;

		public function __construct(){
			$this-> mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
		}
		public function __destruct(){}		

		// Método para conectar con bbdd y ejecutar una query que muestre los tests de un profesor de todas las asignaturas que imparte
		public function teacherTestsQuery(){

			$consult = "SELECT FINAL.ID_FINAL AS IdTestFinal, FINAL.NOMBRE_FINAL AS NombreTestFinal, FINAL.DESCR_FINAL AS DesTestFinal, ASIGN.ID_ASIGN AS AsignTest, ASIGN.NOMBRE_ASIGN AS AsignNameTest, CURSO.NIVEL_CURSO AS LevelTest FROM FINAL
					INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS 
					INNER JOIN ASIGN ON TEMAS.ID_TEMAS = ASIGN.ID_ASIGN
					INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
					INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
					INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
					WHERE ASIGN.ID_PROFE='{$_SESSION ["id"]}' GROUP BY FINAL.ID_FINAL
				UNION ALL
				SELECT ENTRE.ID_ENTRE AS IdTestEntre, ENTRE.NOMBRE_ENTRE AS NombreTestEntre, ENTRE.DESCR_ENTRE AS DesTestEntre,  ASIGN.ID_ASIGN AS AsignTest, ASIGN.NOMBRE_ASIGN AS AsignNameTest, CURSO.NIVEL_CURSO AS LevelTest FROM ENTRE
						INNER JOIN TEMAS ON ENTRE.ID_TEMAS = TEMAS.ID_TEMAS 
						INNER JOIN ASIGN ON TEMAS.ID_TEMAS = ASIGN.ID_ASIGN
						INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
						INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
						INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
						WHERE ASIGN.ID_PROFE='{$_SESSION ["id"]}' GROUP BY ENTRE.ID_ENTRE
						";	

		
		//mediante el objeto mysqli, almacenaremos los resultados de la query "$consult" en result. estos serán obtenidos mediante el acceso al atributo $mysqli del método executeQuery(), que está incorporado en MysqlDBImplementation.php.
			$result = $this->mysqli -> executeQuery($consult);

			return $result;
		}


	}
	

 ?>