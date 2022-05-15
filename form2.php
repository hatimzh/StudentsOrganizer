<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>

	<title>Formulaire</title>
	<link rel="stylesheet"  href="css/page2.css">
  <script defer type="text/javascript" src="./script.js"></script>

</head>

<body>

    <?php 

        if(isset($_POST["enregistrer"])){

          $tab = array();

          $fp = fopen('./notes.txt',"w+");

          $moyenne = -1;

          $mention = 'NULL';

          for($var = 0; $var<count($_SESSION["nom"]); $var++) {

              $tab[0]=$_SESSION["nom"][$var];
              $tab[1]=$_SESSION["maths"][$var];
              $tab[2]=$_SESSION["informatique"][$var];

              $moyenne = ($_SESSION["maths"][$var] + $_SESSION["informatique"][$var]) / 2;

              $tab[3]=$moyenne;

							if($moyenne<10){
							    $Mention = 'Non validee';
							}
							 elseif($moyenne>=10 && $moyenne<12){
								$Mention = 'Passable';
							}
							 elseif($moyenne>=12 && $moyenne<14){
								$Mention = 'Assez bien';
							}
							 elseif($moyenne>=14 && $moyenne<16){
								$Mention = 'Bien';
							}
							 elseif($moyenne>=16){
								$Mention = 'Tres bien';
							 }
							 else{ $Mention = 'Données manquantes'; }	


              $tab[4]=$Mention;
   
              fputcsv($fp,$tab,";");
              fwrite($fp,PHP_EOL);

          }

          fclose($fp);

          header("location:" . "index.html");

        } elseif(isset($_POST["quitter"])) {

     	   <script>

                if(confirm("Voulez-vous enregistrer?") == true){

                    window.location.href = "form4.php";

                } else {

                    window.location.href = "index.html";

                }

            </script>;

        } elseif (isset($_POST["nouveau"])){

      <div class="contenu" style="margin-top: 200px;">
          <form name="loginform" action="form4.php" method="post">
            <table class="t2">
              <tr>        
                <td colspan="2">  
                  <div style="text-align: center; margin-bottom: -15px;"> 
                  <a href="index.html"><img src="css/logo.png" alt="logo" class="logo"></a>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="detail" style="width: 50%;">Etudiant</td>
                <td style="width: 50%;"><div class="input"><input type="text" name="nom" placeholder="Entrer le nom"></div></td>
              </tr>
              <tr> 
                <td class="detail" style="width: 50%;">Maths</td>
                <td><div class="input"><input type="number" step="0.25" name="math" placeholder="Entrer une note"></div></td>
              </tr>
              <tr> 
                <td class="detail" style="width: 50%;">Informatique</td>
                <td><div class="input"><input type="number" step="0.25" name="info" placeholder="Entrer une note"></div></td>
              </tr>
              <tr>
                <td>
                  <div style="text-align: center;"><input type="submit" name="ajouter" value="Resultat" class="btn"></div>
                </td>
                <td>
                  <div style="text-align: center;"><input type="submit" name="annuler" value="Annuler" class="btn"></div>
                </td>
              </tr>
              </table>
  
          </form>
      </div>;

        }

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
      
</html>
