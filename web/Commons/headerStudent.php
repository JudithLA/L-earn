<?php

	class  CommonsStudent{

		public static function header(){

			$headerHTML = "
			<header>
				<a href='http://localhost:8888/L-earn/web/homeStudent/homeStudent.php'>
					<h1>L-EARN</h1>
				</a>
				<nav>
					<ul>
						<li><a href='#'>Tests</a></li>
						<li><a href='http://localhost:8888/L-earn/web/rewardsStudent/rewardsStudent.php'>Recompensas</a></li>
					</ul>
				</nav>
				<span id='headPoints'>" . $_SESSION['finPoints'] . "</span>
				<span id='headPercent'>" . $_SESSION['percentage'] . "</span>
				<span>" . $_SESSION['nameStu'] . $_SESSION['surnameStu'] . "</span>
				<img src='" . $_SESSION['imgStu'] . "' alt='Imagen del usuario'>
			</header>";

			return $headerHTML;
		}
	}

?>
