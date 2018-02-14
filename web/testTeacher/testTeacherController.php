<?php
require_once __DIR__ . "/testTeacherModel.php";
require_once __DIR__ . "/testTeacherView.php";


class testTeacherController {

				//Constructor (crea la clase)
				/*function __construct(){

				}

				//Destructor (Destruye la clase)
				function __destruct(){

				}*/


				public function welcomeTestController(){
									$view = new testTeacherView();
									return $view->welcomeTestView();
				}

				public function testPasoUnoController(){
					  $idUser = 1;
						$model = new testTeacherModel();
						$asign = $model -> testPasoUnoModel($idUser);
						$view = new testTeacherView();
						$select = $view -> testPasoUnoView($asign);
						$cent['status'] = 'OK';
						$cent['html'] = $select;
						return $cent;
				}










}
?>
