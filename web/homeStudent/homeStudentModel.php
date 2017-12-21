<?php 
	// Incluimos el archivo con la conexión a BBDD
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	// Clase del Modelo
	class HomeStudentModel{

		// Creamos un atributo
		private $mysqli;

		// Constructor (crea la clase)
		public function __construct(){

			// Creamos un objeto de la clase MysqlDBImplementation, se lo pasamos al atributo $mysqli y abrimos conexión con base de datos
			// Parámetros: host, puerto, nombre de base de datos, usuario, contraseña
			
			$this->mysqli = new MysqlDBImplementation("localhost", "3306", "DBLEARN", "root", "learn");

			


		}

		//Destructor (destruye la clase)
		public function __destruct(){}		

		// Método consultar la BBDD y obtener el último test final realizado por el alumno
		// Habrá que pasar el ID_ALUMN por parámetro: public function nextTest($idAlumno){WHERE ALUMN.ID_ALUMN = '{$idAlumno}'}
		public function nextTest(){
			
			$_SESSION['id'] = 1;
			// Definimos la query
			$consult = "SELECT FINAL.ID_FINAL AS FinalTest, REL_ALUMN_FINAL.ID_FINAL AS IdLastTestDone, REL_ALUMN_FINAL.FECHA_REL_ALUMN_FINAL AS DateLastTestDone, TEMAS.ICON_TEMAS AS ImgTema, ASIGN.NOMBRE_ASIGN AS NombreAsign FROM ALUMN
						INNER JOIN REL_ALUMN_FINAL ON ALUMN.ID_ALUMN = REL_ALUMN_FINAL.ID_ALUMN
						INNER JOIN FINAL ON REL_ALUMN_FINAL.ID_FINAL = FINAL.ID_FINAL
						INNER JOIN TEMAS ON FINAL.ID_TEMAS = TEMAS.ID_TEMAS
						INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN
						WHERE ALUMN.ID_ALUMN = '{$_SESSION["id"]}' ORDER BY REL_ALUMN_FINAL.FECHA_REL_ALUMN_FINAL DESC";

			// Llamada al método executeQuery() mediante el acceso al atributo $mysqli para ejecutar la query en la BBDD
			// Almacenamos en $result los resultados de la query "$consult"
			$result = $this->mysqli -> executeQuery($consult);
			
			// Almacenamos el resultado de la query
			//$lastTestDone = $result;

			return $result;
		}

		// Método consultar la BBDD y obtener el porcentaje de los puntos de experiencia total del alumno entre todas sus asignaturas
		public function percentageStudentExpPoints(){

			// Definimos la query
			// Habrá que modificar el ID_ALUMN por '{$_SESSION ["id"]}'
			$consult = "SELECT (ALUMN.EXPERIENCIA_ALUMN*100)/(SELECT COUNT(ENTRE.ID_ENTRE)*4 AS TotalExperiencia FROM ENTRE
        				INNER JOIN TEMAS ON ENTRE.ID_TEMAS = TEMAS.ID_TEMAS
        				INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN) AS Porcentaje
						FROM ALUMN WHERE ALUMN.ID_ALUMN = 1";

			// Llamada al método executeQuery() mediante el acceso al atributo $mysqli para ejecutar la query en la BBDD
			// Almacenamos en $result los resultados de la query "$consult"
			$result = $this->mysqli -> executeQuery($consult);

			// Almacenamos el resultado de la query (valor del resultado de la operación Porcentaje)
			$percentage = $result[0]['Porcentaje'];

			return $percentage;
		}

		// Método consultar la BBDD y obtener los puntos finales totales del alumno
		public function studentFinPoints(){

			// Definimos la query
			// Habrá que modificar el ID_ALUMN por '{$_SESSION ["id"]}'
			$consult = "SELECT PUNTOS_ALUMN FROM ALUMN WHERE ID_ALUMN = 1";

			// Llamada al método executeQuery() mediante el acceso al atributo $mysqli para ejecutar la query en la BBDD
			// Almacenamos en $result los resultados de la query "$consult"
			$result = $this->mysqli -> executeQuery($consult);
				
			// Almacenamos el resultado de la query (únicamente el valor del campo PUNTOS_ALUMN)
			$finalPoints = $result[0]['PUNTOS_ALUMN'];

			return $finalPoints;
		}

	}
// $m = new HomeStudentModel();
// $result = $m->percentageStudentExpPoints();
// print_r($result);
 ?>