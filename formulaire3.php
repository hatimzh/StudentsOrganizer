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

   <div class="contenu" style="margin-top: 200px;">

   <?php

		if(isset($_POST["modifier"])){

        echo

              '<form name="loginform" action="formulaire4.php" method="post">
                <table class="t2">
                  <tr>        
                    <td colspan="2">  
                      <div style="text-align: center; margin-bottom: -15px;"> 
                      <a href="formulaire1.html"><img src="css/logo.png" alt="logo" class="logo"></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="detail" style="width: 50%;">Etudiant</td>
                    <td style="width: 50%;"><div class="input"><input type="text" name="nom1" placeholder="Entrer le nom" value="'.$_POST["nom"].'" readonly></div></td>
                  </tr>
                  <tr> 
                    <td class="detail" style="width: 50%;">Maths</td>
                    <td><div class="input"><input type="number" step="0.25" name="math1" placeholder="Entrer une note" value="'.$_POST["math"].'"></div></td>
                  </tr>
                  <tr> 
                    <td class="detail" style="width: 50%;">Informatique</td>
                    <td><div class="input"><input type="number" step="0.25" name="info1" placeholder="Entrer une note" value="'.$_POST["info"].'"></div></td>
                  </tr>
                  <tr>
                    <td>
                      <div style="text-align: center;"><input type="submit" name="resultat" value="Resultat" class="btn"></div>
                    </td>
                    <td>
                      <div style="text-align: center;"><input type="submit" name="retour" value="Annuler" class="btn"></div>
                    </td>
                  </tr>
                  </table>

              </form>';              

		        } elseif (isset($_POST["supprimer"])) {

                for($var = 0; $var<count($_SESSION["nom"]); $var++){

                  if($_SESSION["nom"][$var] == $_POST['nom']){

  /*                     $requete = " DELETE FROM Notes WHERE ID = ?";
                      $req= $con->prepare($requete);
                      $req->execute(array($_POST['id1'])); */

                      unset($_SESSION["nom"][$var]);
                      unset($_SESSION["maths"][$var]);
                      unset($_SESSION["informatique"][$var]);

                      $t1 = array_values($_SESSION["nom"]);
                      $t2 = array_values($_SESSION["maths"]);
                      $t3 = array_values($_SESSION["informatique"]);

                      $_SESSION["nom"] = $t1;
                      $_SESSION["math"] = $t2;
                      $_SESSION["info"] = $t3;
                      
                      }

                  }

                header("location:" . "formulaire4.php"); 

            } elseif (isset($_POST["imprimer"])) {
              
              $_SESSION['var'] = array_search($_POST['nom'], $_SESSION['nom']);

              header('Location: ./note_pdf.php');

          }

		?>
          </div>

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