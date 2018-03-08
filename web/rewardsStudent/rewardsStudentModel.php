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

			$consult = "SELECT RECOM.ID_RECOM AS RecomId, RECOM.NOMBRE_RECOM AS RecomName, RECOM.COSTE_RECOM AS RecomCost FROM RECOM
						LEFT JOIN REL_ALUMN_RECOM ON RECOM.ID_RECOM = REL_ALUMN_RECOM.ID_RECOM";
			$result = $this->mysqli -> executeQuery($consult);

			return $result;
		}

		public function rewardsGotten(){
			$_SESSION['id'] = 1;

			$consult = "SELECT REL_ALUMN_RECOM.ID_RECOM AS RelRecomId, RECOM.ID_RECOM AS RecomId FROM RECOM
						INNER JOIN REL_ALUMN_RECOM ON RECOM.ID_RECOM = REL_ALUMN_RECOM.ID_RECOM
						WHERE REL_ALUMN_RECOM.ID_ALUMN = '{$_SESSION["id"]}'";
			$result = $this->mysqli -> executeQuery($consult);

			return $result;
		}

		public function updateFinPoints($costReward, $rewardId){
			$_SESSION['id'] = 1;

			$consult  = "INSERT INTO REL_ALUMN_RECOM (ID_RECOM,ID_ALUMN) VALUES ({$rewardId}, '{$_SESSION["id"]}')";
			$result = $this->mysqli -> modifyQuery($consult);

			$consult  = "UPDATE ALUMN SET PUNTOS_ALUMN = PUNTOS_ALUMN - {$costReward} WHERE ID_ALUMN = '{$_SESSION["id"]}'";
			$result = $this->mysqli -> modifyQuery($consult);
			$_SESSION['finPoints'] -= $costReward;

			return $_SESSION['finPoints'];
		}

	}

?>
