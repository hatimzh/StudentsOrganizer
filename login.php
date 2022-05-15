<?php
	session_start();
?>

<!DOCTYPE html>

<html>

	<body>

		<?php

/* 			$_login="test";
			$_password="test";
			$_SESSION["name"] = array();
			$_SESSION["maths"] = array();
			$_SESSION["physics"] = array();

			if($_login == $_POST['login'] && $_password == $_POST['password']) {
				header("location:" . "form4.php");
			} else
				header("location:" . "index.html"); */

			$users = array();

			 if(!$fp1 =fopen("login.txt","r")){

				header("location:" . "index.html");

			} else {

				while(!feof($fp1)){

					if($fp1 == 'Resource id #5'){
						break;
					}

					$ligne = fgets($fp1,200);

					if(strlen($ligne)>0){

						$users = explode(';',$ligne,2);

						if(((strcmp(trim($users[0]),trim($_POST['login']))) == 0) && ((strcmp(trim($users[1]),trim($_POST['password']))) == 0)){

							header("location:" . "form4.php");
							fclose($fp1);

						}

				}
				
			}

		}

			header("location:" . "index.html");

	?>

	</body>
	
</html>
