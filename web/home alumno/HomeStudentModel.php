<?php 
	// Incluimos el archivo con la conexión a base de datos
	require_once "MysqlDBImplementation.php";

	//creamos clase 
	class HomeStudentModel{

		//Constructor (crea la clase)
		public function __construct(){}

		//Destructor (Destruye la clase)
		public function __destruct(){}		

		/* 
		 * Método para consultar la base de datos y ejecutar una query
		 * para mostrar la información actual del alumno
		*/
		public function showCurrentInfo(){

			// Creamos un objeto de la clase MysqlDBImplementation y abrimos conexión con base de datos
			// Parámetros: host, puerto, nombre de base de datos, usuario, contraseña
			$mysqli = new MysqlDBImplementation("localhost", "8888", "DBLEARN", "root", "learn");

			// Definimos la query
			$consult = "SELECT * FROM ALUMN WHERE ID_ALUMN = '{$_SESSION ["id"]}'";

			//Ejecución de query en la base de datos mediante el objeto mysqli.
			//almacenamos en $result los resultados de la query "$consult" ejecutando el método query()  
			$result = $mysqli -> query($consult);

			//inicialiamos id =0, porque si no hay resultados no nos devolvería 0 al controlador sino "vacío" y daría fallo
			$id = 0;
			
			//recorremos toda las filas de la tabla con el metodo mysqli_fecth_assoc()
			//le pasamos al método nuestra query ($result)
			while($row = mysqli_fetch_assoc($result)){
				
				//almacenamos en $id el resultado de la query &consult (valor del campo ID_PRO)
				//será cero si no encuantra ningúna fila con NOM_PRO=name y CON_PRO=password
				$id = $row["ID_PRO"];

			}

			return $id;
		}


	}
	


 ?>