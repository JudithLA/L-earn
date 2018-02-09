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

        <div class='window-test-1'>
          <p>BIENVENIDO AL TEST DE L-EARN</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href='#' class='btn-atras'>Volver a atrás</a>
          <a href='#' class='btn-siguiente'>Siguiente</a>
        </div>

      </body>
    </html>


		";
		return $resultHTML;
	}





	}

?>
