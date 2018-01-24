<?php
	require_once __DIR__ . "/../ConnectSupport/Implementation/MysqlDBImplementation.php";

	class RewardsStudentModel{

		private $mysqli;

		public function __construct(){

			$this->mysqli = new MysqlDBImplementation("127.0.0.1", "8889", "DBLEARN", "root", "learn");

		}

		public function __destruct(){}

		public function rewards(){

			$_SESSION['id'] = 1;

			$consult = "SELECT REL_ALUMN_RECOM.ID_RECOM AS RelRecomId, RECOM.ID_RECOM AS RecomId, RECOM.NOMBRE_RECOM AS RecomName, CONCAT(RECOM.COSTE_RECOM, ' PTOS.') AS RecomCost FROM RECOM LEFT JOIN REL_ALUMN_RECOM ON RECOM.ID_RECOM = REL_ALUMN_RECOM.ID_RECOM AND REL_ALUMN_RECOM.ID_ALUMN = ".$_SESSION['id'];

			$result = $this->mysqli -> executeQuery($consult);

			return $result;

		}
	}
	// $m = new RewardsStudentModel();
	// $result = $m->rewards();
	// print_r($result);
?>
