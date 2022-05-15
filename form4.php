<?php
session_start();
?>

<!DOCTYPE html>

<html>

	<head>

		<title>Page d'étudiant</title>
		<link rel="stylesheet"  href="css/page4.css">
		<script defer type="text/javascript" src="./script.js"></script>
		<link rel = "icon" href = "./css/logo.png" >

	</head>

	<body>

		<div>
			<h1 class="bien"><a href="./index.html" class="fancy">Notes</a></h1>
		</div>

		<?php

			error_reporting(0);
			$nom = &$_SESSION["name"];
			$maths = &$_SESSION["maths"];
			$Physics = &$_SESSION["physics"];

			echo
				'<div class="contenu">
					<form action="form2.php" id="form1" method="post">
						<table class="t2">
							<tr>
								<td style="width: 33%;"><div style="text-align: center;"><input type="submit" class="btn" value="New" name="new"></div></td>
								<td style="width: 33%;"><div style="text-align: center;"><button type="submit" class="btn" name="save" style="padding-left: 12px;">Save</button></div></td>
								<td style="width: 33%;"><div style="text-align: center;"><button type="submit" class="btn" name="exit">Exit</button></div></td>
							</tr>
						</table>
					</form>
				</div>';

			// File reading

/* 			if(!$fp =fopen("marks.txt","r")) {

				$tab = array();


				echo "Error";
				exit;

			} else {

				try {

					while(($tab = fgetcsv($fp,1000,";")) !== FALSE){
							$c = count($tab);

							echo 
							
							'<form action="form3.php" method="post">
							<input type="text" name="name" value="'.$tab[0].'" style="width: 16%;" readonly>
							<input type="number" name="math" value="'.$tab[1].'" style="width: 16%;" readonly>
							<input type="number" name="phy" value="'.$tab[2].'" style="width: 16%;" readonly>
							<input type="number" name="result" value="'.$tab[3].'" style="width: 16%;" readonly>
							<input type="text" name="mention" value="'.$tab[4].'" style="width: 16%;" readonly>
							<input type="submit" name="edit" value="M" style="width: 5%;">
							<input type="submit" name="edit" value="I" style="width: 5%;">
							<input type="submit" name="delete" value="S" style="width: 5%;">
							 </form>';

					}	

					fclose($fp);

				} catch(Exception $e){};
			} */

		if(isset($_POST["back"]) or isset($_POST["reset"])){

			header('Location: ./form4.php');

		}
			
		if(isset($_POST["add"]) && isset($_POST["name"]) && $_POST["math"]>=0 && $_POST["phy"]>=0 && $_POST["math"]<=20 && $_POST["phy"]<=20){

				$var1 = $_POST["name"];
				$var2 = $_POST["math"];
				$var3 = $_POST["phy"];

				$nom[] = $var1;
				$maths[] = $var2;
				$Physics[] = $var3;

				}

				if(isset($_POST["result"]) && $_POST["math1"]>=0 && $_POST["phy1"]>=0 && $_POST["math1"]<=20 && $_POST["phy1"]<=20){

					for($var = 0; $var<count($nom); $var++){
						if($nom[$var]==$_POST["name1"]){

							$maths[$var] = $_POST["math1"];
							$Physics[$var] = $_POST["phy1"];

						}
					}

				}

				$maths = array_values($_SESSION["maths"]);
				$Physics = array_values($_SESSION["physics"]);

			for($var = count($nom)-1; $var>=0; $var--){
				if(isset($nom[$var])){
					$c1=$nom[$var];
					$c2=$maths[$var];
					$c3=$Physics[$var];
					$c4=($c3+$c2)/2;
							if($c4<10){
							    $Mention = 'Not validated';
							}
							 elseif($c4>=10 && $c4<12){
								$Mention = 'Standard pass';
							}
							 elseif($c4>=12 && $c4<14){
								$Mention = 'Honours';
							}
							 elseif($c4>=14 && $c4<16){
								$Mention = 'High honours';
							}
							 elseif($c4>=16){
								$Mention = 'Highest honour';
							 }
							 else{ $Mention = 'Data missed'; }				 

					echo '<form action="form3.php" method="post">
							<input type="text" name="name" value="'.$c1.'" style="width: 16%;" readonly>
							<input type="number" name="math" value="'.$c2.'" style="width: 16%;" readonly>
							<input type="number" name="phy" value="'.$c3.'" style="width: 16%;" readonly>
							<input type="number" name="result" value="'.$c4.'" style="width: 16%;" readonly>
							<input type="text" name="mention" value="'.$Mention.'" style="width: 16%;" readonly>
							<input type="submit" name="edit" value="M" style="width: 5%;">
							<input type="submit" name="print" value="I" style="width: 5%;">
							<input type="submit" name="delete" value="S" style="width: 5%;">
					 </form>';

				}

			}

			$_SESSION["name"]  = &$nom;
			$_SESSION["maths"] = &$maths;
			$_SESSION["physics"] = &$Physics;
			
		?>

		<table class="footer">
				<tr>
					<td><div style="text-align: center;"><a href="https://fr-fr.facebook.com/" target="_blank"><img src="css/fb.png" alt="Facebook" class="social"></td></a></div></td>
					<td><div style="text-align: center;"><a href="https://www.instagram.com/?hl=fr" target="_blank"><img src="css/ig.png" alt="Instagram" class="social"></a></div></td>
					<td><div style="text-align: center;"><a href="https://fr.linkedin.com/" target="_blank"><img src="css/linked.png" alt="LinkedIn" class="social"></a></div></td>
					<td><div style="text-align: center;"><a href="https://twitter.com/?lang=fr" target="_blank"><img src="css/twitter.png" alt="Twitter" class="social"></a></div></td>
					<td><div style="text-align: center;"><a href="https://www.youtube.com/" target="_blank"><img src="css/yt.png" alt="Youtube" class="social"></a></div></td>
				</tr>
		</table>
	
	</body>
</html>
