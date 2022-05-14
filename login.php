<?php
	session_start();
?>

<!DOCTYPE html>

<html>

	<body>

		<?php

/* 			$_identifiant="test";
			$_motdepasse="test";
			$_SESSION["nom"] = array();
			$_SESSION["maths"] = array();
			$_SESSION["informatique"] = array();

			if($_identifiant == $_POST['identifiant'] && $_motdepasse == $_POST['motdepasse']) {
				header("location:" . "formulaire4.php");
			} else
				header("location:" . "formulaire1.html"); */

			$users = array();

			 if(!$fp1 =fopen("login.txt","r")){

				header("location:" . "formulaire1.html");

			} else {

				while(!feof($fp1)){

					if($fp1 == 'Resource id #5'){
						break;
					}

					$ligne = fgets($fp1,200);

					if(strlen($ligne)>0){

						$users = explode(';',$ligne,2);

						if(((strcmp(trim($users[0]),trim($_POST['identifiant']))) == 0) && ((strcmp(trim($users[1]),trim($_POST['motdepasse']))) == 0)){

							header("location:" . "formulaire4.php");
							fclose($fp1);

						}

				}
				
			}

		}

			header("location:" . "formulaire1.html");

	?>

	</body>
	
</html>