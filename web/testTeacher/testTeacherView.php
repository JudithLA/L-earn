<?php
//creamos clase de view
	class testTeacherView{


	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}

	//creación de método que te devuelve el HTML
	public function welcomeTestView() {
		//variable con el HTML –¡! con comillas simples–y habría que devolver esa variable
		$resultHTML = "
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset='utf-8'>
        <title></title>
        <script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
        <script type='text/javascript' src='js/main.js'></script>


      </head>
      <body>

        <div id='paso1' class='on'>
          <p>BIENVENIDO AL TEST DE L-EARN</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href='#' id='btn-preview'>Volver atrás</a>
          <a href='#' id='btn-next' class='welcome-test'>Siguiente</a>
        </div>

      </body>
    </html>


		";
		return $resultHTML;
	}


	//creación de método que te devuelve el HTML
	public function testPasoUnoView($asign) {

		$resultHTML = "
			<div id='paso2'>
			<p class='title_section'>Elige una asignatura</p>
			<div class ='asignaturas'>";
			foreach ($asign as $row) {
				 $resultHTML.= "<div data-id='{$row['ID_ASIGN']}' data-nivel='{$row['NIVEL_CURSO']}' class='asign'>{$row['NOMBRE_ASIGN']} <br> {$row['NIVEL_CURSO']}</div>";
			}
			$resultHTML .= "</div>";
			$resultHTML .= "</div>";
			return $resultHTML;
	}


	//creación de método que te devuelve el HTML
	public function testPasoDosView($temas) {
		$resultHTML = "
			<div id='paso3'>
			<p class='title_section'>Elige un tema de tu asignatura</p>
			<select class ='asignaturas'>";
			foreach ($temas as $row) {
				 $resultHTML.= "<option data-id='{$row['ID_TEMAS']}' class='asign' data-trimestre='{$row['TRIMESTRE_TEMAS']}'>{$row['NOMBRE_TEMAS']}</option>";
			}
		$resultHTML .= "</select>";
		$resultHTML .= "</div>";
		$resultHTML .= "<div id='btn-paso2'>Siguiente</div>";
		return $resultHTML;
	}


	//creación de método que te devuelve el HTML
	public function testPasoTresView() {
		$resultHTML = "
			<div id='paso4'>
					<form class='type-text'>
							<input type='radio' name='type-test' class='item-test' value='Entrenamiento'>
							<input type='radio' name='type-test' class='item-test' value='Final'>

							Ponle un título a tu test:
							<input type='text' name='nameTest'>
							Pon una descripcion a tu test:
							<input type='text' name='descripcionTest'>
							<input type='submit' value='Siguiente'>
			<div id='paso4'>Siguiente</div>
			</div>
		";
		return $resultHTML;

	}



	//creación de método que te devuelve el HTML
	public function testPasoCuatroView($vista) {
		$resultHTML = "
			<div id='paso5'>
					Holi
			</div>
		";
		return $resultHTML;

	}



	}

?>
