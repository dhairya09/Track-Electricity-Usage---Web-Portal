<?php
	session_start();
	ob_start();

	function message(){
		if(isset($_SESSION["message"])){
			$output = "<div class=\"message\">";
			$output.= htmlentities($_SESSION["message"]);
			$output.= "</div>";

			//clear message after use
			$_SESSION["message"] = null;

			return $output;

		}
	}

		function errors(){
			if(isset($_SESSION["errors"])){
				$mistake = $_SESSION["errors"];

				//clear errors after use
				$mistake = null;

				return $mistake;
			}
		}





?>
