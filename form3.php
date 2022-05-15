<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>

	<title>Form</title>
	<link rel="stylesheet"  href="css/page2.css">
	<link rel="icon"  href="./css/logo.png">
  <script defer type="text/javascript" src="./script.js"></script>

</head>

<body>

   <div class="contenu" style="margin-top: 200px;">

   <?php

		if(isset($_POST["edit"])){

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
                    <td class="detail" style="width: 50%;">Student</td>
                    <td style="width: 50%;"><div class="input"><input type="text" name="name1" placeholder="Enter the name" value="'.$_POST["name"].'" readonly></div></td>
                  </tr>
                  <tr> 
                    <td class="detail" style="width: 50%;">Maths</td>
                    <td><div class="input"><input type="number" step="0.25" name="math1" placeholder="Enter the mark" value="'.$_POST["math"].'"></div></td>
                  </tr>
                  <tr> 
                    <td class="detail" style="width: 50%;">Physics</td>
                    <td><div class="input"><input type="number" step="0.25" name="phy1" placeholder="Enter the mark" value="'.$_POST["phy"].'"></div></td>
                  </tr>
                  <tr>
                    <td>
                      <div style="text-align: center;"><input type="submit" name="result" value="Result" class="btn"></div>
                    </td>
                    <td>
                      <div style="text-align: center;"><input type="submit" name="back" value="Reset" class="btn"></div>
                    </td>
                  </tr>
                  </table>

              </form>;              

		        } elseif (isset($_POST["delete"])) {

                for($var = 0; $var<count($_SESSION["name"]); $var++){

                  if($_SESSION["name"][$var] == $_POST['name']){

  /*                     $requete = " DELETE FROM Notes WHERE ID = ?";
                      $req= $con->prepare($requete);
                      $req->execute(array($_POST['id1'])); */

                      unset($_SESSION["name"][$var]);
                      unset($_SESSION["maths"][$var]);
                      unset($_SESSION["physics"][$var]);

                      $t1 = array_values($_SESSION["name"]);
                      $t2 = array_values($_SESSION["maths"]);
                      $t3 = array_values($_SESSION["physics"]);

                      $_SESSION["name"] = $t1;
                      $_SESSION["math"] = $t2;
                      $_SESSION["phy"] = $t3;
                      
                      }

                  }

                header("location:" . "form4.php"); 

            } elseif (isset($_POST["print"])) {
              
              $_SESSION['var'] = array_search($_POST['name'], $_SESSION['name']);

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
