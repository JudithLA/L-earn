<?php 
require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

class TeacherSubjectsUnitsModel{

	private $mysqli;

	public function __construct(){
		$this-> mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");
	}
	public function __destruct(){}		


	public function getSubjectsUnitsBreadcrumb($varSubjectId, $varSubjectLevel){
		//query para mostrar en el breadcrumb la asignatura en la que te encuentras		CORREGIDA
		$consult = "SELECT ASIGN.ID_ASIGN AS SubjectId, ASIGN.NOMBRE_ASIGN AS SubjectName, CURSO.NIVEL_CURSO AS SubjectLevel FROM ASIGN
				INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
				INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO = CURSO.ID_CURSO
				INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
				WHERE PROFE.ID_PROFE='{$_SESSION ["id"]}'  AND ASIGN.ID_ASIGN={$varSubjectId} AND CURSO.NIVEL_CURSO={$varSubjectLevel}";
		$result = $this->mysqli -> executeQuery($consult);

		//indicamos que del array que va a devolvernos, solo nos interesa la posición 0 —la primera—; aunque también podríamos hacerlo en la concatenación en function viewUnits
		return $result[0];
	}

	public function getSubjectsUnitsQuery($varSubjectId, $varSubjectLevel){
		//query para mostrar los temas de la asignatura seleccionada 	CORREGIDA
		$consult = "SELECT DISTINCT TEMAS.NOMBRE_TEMAS AS unitName, TEMAS.ID_TEMAS AS unitId, CURSO.NIVEL_CURSO FROM TEMAS
	INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
	INNER JOIN REL_CURSO_ASIGN ON ASIGN.ID_ASIGN = REL_CURSO_ASIGN.ID_ASIGN
    INNER JOIN CURSO ON REL_CURSO_ASIGN.ID_CURSO=CURSO.ID_CURSO
	INNER JOIN PROFE ON ASIGN.ID_PROFE = PROFE.ID_PROFE
				WHERE PROFE.ID_PROFE ='{$_SESSION ["id"]}' AND TEMAS.ID_ASIGN={$varSubjectId} AND CURSO.NIVEL_CURSO={$varSubjectLevel}";
	//mediante el objeto mysqli, almacenaremos los resultados de la query "$consult" en result. estos resultados serán obtenidos mediante el acceso al atributo $mysqli del método executeQuery(), que está incorporado en MysqlDBImplementation.php.
		$result = $this->mysqli -> executeQuery($consult);

		return $result;

	}

	//query para mostrar los grupos asociados a una asignatura 	CORREGIDA
	public function getSubjectsGroupsQuery($varSubjectId,$varSubjectLevel){
		$consult = "SELECT PROFE.NOMBRE_PROFE, ASIGN.NOMBRE_ASIGN, CURSO.NIVEL_CURSO AS groupLevel, CURSO.LETRA_CURSO AS groupLetter, CURSO.ID_CURSO AS groupId FROM CURSO
			INNER JOIN REL_CURSO_ASIGN ON CURSO.ID_CURSO=REL_CURSO_ASIGN.ID_CURSO 
			INNER JOIN ASIGN ON REL_CURSO_ASIGN.ID_ASIGN=ASIGN.ID_ASIGN
            INNER JOIN PROFE ON ASIGN.ID_PROFE=PROFE.ID_PROFE
            WHERE CURSO.NIVEL_CURSO={$varSubjectLevel} AND ASIGN.ID_PROFE='{$_SESSION ["id"]}' AND REL_CURSO_ASIGN.ID_ASIGN={$varSubjectId}";
		$result = $this->mysqli -> executeQuery($consult);

		return $result;
	}

	//query para mostrar todos los grupos de un curso de un centro de un profe y que te muestre si están asignados actualmente o no 
	//la diferencia entre UNION y UNION ALL es que UNION elimina duplicados
	public function getSubjectsAllGroupsQuery($varSubjectId,$varSubjectLevel){
		$consult = "SELECT CURSO.ID_CURSO AS groupId, CURSO.NIVEL_CURSO AS groupLevel, CURSO.LETRA_CURSO AS groupLetter, 0 as groupChecked FROM CURSO
				INNER JOIN CENTR ON CURSO.ID_CENTR = CENTR.ID_CENTR
				INNER JOIN PROFE ON CENTR.ID_CENTR = PROFE.ID_CENTR
				WHERE PROFE.ID_PROFE=1 AND CURSO.NIVEL_CURSO=1 AND CURSO.ID_CURSO NOT In (SELECT CURSO.ID_CURSO FROM CURSO
							INNER JOIN REL_CURSO_ASIGN ON CURSO.ID_CURSO=REL_CURSO_ASIGN.ID_CURSO 
							INNER JOIN ASIGN ON REL_CURSO_ASIGN.ID_ASIGN=ASIGN.ID_ASIGN
				            INNER JOIN PROFE ON ASIGN.ID_PROFE=PROFE.ID_PROFE
				            WHERE CURSO.NIVEL_CURSO=1 AND ASIGN.ID_PROFE=1 AND REL_CURSO_ASIGN.ID_ASIGN=1)
			UNION ALL
			SELECT CURSO.ID_CURSO AS groupId, CURSO.NIVEL_CURSO AS groupLevel, CURSO.LETRA_CURSO AS groupLetter, 1 AS groupChecked FROM CURSO
				INNER JOIN REL_CURSO_ASIGN ON CURSO.ID_CURSO=REL_CURSO_ASIGN.ID_CURSO 
				INNER JOIN ASIGN ON REL_CURSO_ASIGN.ID_ASIGN=ASIGN.ID_ASIGN
	            INNER JOIN PROFE ON ASIGN.ID_PROFE=PROFE.ID_PROFE
	            WHERE CURSO.NIVEL_CURSO={$varSubjectLevel} AND ASIGN.ID_PROFE='{$_SESSION ["id"]}' AND REL_CURSO_ASIGN.ID_ASIGN={$varSubjectId}";
		$result = $this->mysqli -> executeQuery($consult);

		return $result;
	}

	public function modifyGroupsSubjectsQuery ($varSubjectId,$varGroupId){
			//var_dump($varSubjectId); var_dump($varGroupId); 
			
			//$insertQuery = "UPDATE REL_CURSO_ASIGN SET ID_GRUPO = {$varGroupId} WHERE ID_ASIGN = {$varSubjectId} AND ";

			// en la siguiente línea, ¿llamamos al método modifyQuery o executeQuery?
			$result = $this->mysqli -> modifyQuery($insertQuery);

			return $result;
	}

}

 ?>