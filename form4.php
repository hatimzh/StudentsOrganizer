<?php
session_start();
?>

<!DOCTYPE html>

<html>

	<head>

		<title>Page d'étudiant</title>
		<link rel="stylesheet"  href="css/page4.css">
		<script defer type="text/javascript" src="./script.js"></script>

	</head>

	<body>

		<div>
			<h1 class="bien"><a href="./index.html" class="fancy">Notes</a></h1>
		</div>

		<?php

			error_reporting(0);
			$nom = &$_SESSION["nom"];
			$maths = &$_SESSION["maths"];
			$informatique = &$_SESSION["informatique"];

			echo
				'<div class="contenu">
					<form action="form2.php" id="form1" method="post">
						<table class="t2">
							<tr>
								<td style="width: 33%;"><div style="text-align: center;"><input type="submit" class="btn" value="Nouveau" name="nouveau"></div></td>
								<td style="width: 33%;"><div style="text-align: center;"><button type="submit" class="btn" name="enregistrer" style="padding-left: 12px;">Enregistrer</button></div></td>
								<td style="width: 33%;"><div style="text-align: center;"><button type="submit" class="btn" name="quitter">Quitter</button></div></td>
							</tr>
						</table>
					</form>
				</div>';

			// Lecture du fichier

/* 			if(!$fp =fopen("notes.txt","r")) {

				$tab = array();


				echo "Echec de l'ouverture du fichier";
				exit;

			} else {

				try {

					while(($tab = fgetcsv($fp,1000,";")) !== FALSE){
							$c = count($tab);

							echo 
							
							'<form action="form3.php" method="post">
							<input type="text" name="nom" value="'.$tab[0].'" style="width: 16%;" readonly>
							<input type="number" name="math" value="'.$tab[1].'" style="width: 16%;" readonly>
							<input type="number" name="info" value="'.$tab[2].'" style="width: 16%;" readonly>
							<input type="number" name="result" value="'.$tab[3].'" style="width: 16%;" readonly>
							<input type="text" name="mention" value="'.$tab[4].'" style="width: 16%;" readonly>
							<input type="submit" name="modifier" value="M" style="width: 5%;">
							<input type="submit" name="modifier" value="I" style="width: 5%;">
							<input type="submit" name="supprimer" value="S" style="width: 5%;">
							 </form>';

					}	

					fclose($fp);

				} catch(Exception $e){};
			} */

		if(isset($_POST["retour"]) or isset($_POST["annuler"])){

			header('Location: ./form4.php');

		}
			
		if(isset($_POST["ajouter"]) && isset($_POST["nom"]) && $_POST["math"]>=0 && $_POST["info"]>=0 && $_POST["math"]<=20 && $_POST["info"]<=20){

				$var1 = $_POST["nom"];
				$var2 = $_POST["math"];
				$var3 = $_POST["info"];

				$nom[] = $var1;
				$maths[] = $var2;
				$informatique[] = $var3;

				}

				if(isset($_POST["resultat"]) && $_POST["math1"]>=0 && $_POST["info1"]>=0 && $_POST["math1"]<=20 && $_POST["info1"]<=20){

					for($var = 0; $var<count($nom); $var++){
						if($nom[$var]==$_POST["nom1"]){

							$maths[$var] = $_POST["math1"];
							$informatique[$var] = $_POST["info1"];

						}
					}

				}

				$maths = array_values($_SESSION["maths"]);
				$informatique = array_values($_SESSION["informatique"]);

			for($var = count($nom)-1; $var>=0; $var--){
				if(isset($nom[$var])){
					$c1=$nom[$var];
					$c2=$maths[$var];
					$c3=$informatique[$var];
					$c4=($c3+$c2)/2;
							if($c4<10){
							    $Mention = 'Non validee';
							}
							 elseif($c4>=10 && $c4<12){
								$Mention = 'Passable';
							}
							 elseif($c4>=12 && $c4<14){
								$Mention = 'Assez bien';
							}
							 elseif($c4>=14 && $c4<16){
								$Mention = 'Bien';
							}
							 elseif($c4>=16){
								$Mention = 'Tres bien';
							 }
							 else{ $Mention = 'Données manquantes'; }				 

					echo '<form action="formulaire3.php" method="post">
							<input type="text" name="nom" value="'.$c1.'" style="width: 16%;" readonly>
							<input type="number" name="math" value="'.$c2.'" style="width: 16%;" readonly>
							<input type="number" name="info" value="'.$c3.'" style="width: 16%;" readonly>
							<input type="number" name="result" value="'.$c4.'" style="width: 16%;" readonly>
							<input type="text" name="mention" value="'.$Mention.'" style="width: 16%;" readonly>
							<input type="submit" name="modifier" value="M" style="width: 5%;">
							<input type="submit" name="imprimer" value="I" style="width: 5%;">
							<input type="submit" name="supprimer" value="S" style="width: 5%;">
					 </form>';

				}

			}

			$_SESSION["nom"]  = &$nom;
			$_SESSION["maths"] = &$maths;
			$_SESSION["informatique"] = &$informatique;
			
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
