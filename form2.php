<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>

	<title>Form</title>
	<link rel="stylesheet"  href="css/page2.css">
  <script defer type="text/javascript" src="./script.js"></script>
	<link rel = "icon" href = "./css/logo.png" >

</head>

<body>

    <?php 

        if(isset($_POST["save"])){

          $tab = array();

          $fp = fopen('./marks.txt',"w+");

          $moyenne = -1;

          $mention = 'NULL';

          for($var = 0; $var<count($_SESSION["name"]); $var++) {

              $tab[0]=$_SESSION["name"][$var];
              $tab[1]=$_SESSION["maths"][$var];
              $tab[2]=$_SESSION["physics"][$var];

              $moyenne = ($_SESSION["maths"][$var] + $_SESSION["physics"][$var]) / 2;

              $tab[3]=$moyenne;

							if($moyenne<10){
							    $Mention = 'Not validated';
							}
							 elseif($moyenne>=10 && $moyenne<12){
								$Mention = 'Standard pass';
							}
							 elseif($moyenne>=12 && $moyenne<14){
								$Mention = 'Honours';
							}
							 elseif($moyenne>=14 && $moyenne<16){
								$Mention = 'High honours';
							}
							 elseif($moyenne>=16){
								$Mention = 'Highest honour';
							 }
							 else{ $Mention = 'Data missed !!'; }	


              $tab[4]=$Mention;
   
              fputcsv($fp,$tab,";");
              fwrite($fp,PHP_EOL);

          }

          fclose($fp);

          header("location:" . "index.html");

        } elseif(isset($_POST["exit"])) {

     	   echo "<script>

                if(confirm(\"Want to save data ?\") == true){

                    window.location.href = \"form4.php\";

                } else {

                    window.location.href = \"index.html\";

                }

            </script>;" ;

        } elseif (isset($_POST["new"])){

      echo "<div class=\"contenu\" style=\"margin-top: 200px;\">
          <form name=\"loginform\" action=\"form4.php\" method=\"post\">
            <table class=\"t2\">
              <tr>        
                <td colspan=\"2\">  
                  <div style=\"text-align: center; margin-bottom: -15px;\"> 
                  <a href=\"index.html\"><img src=\"css/logo.png\" alt=\"logo\" class=\"logo\"></a>
                  </div>
                </td>
              </tr>
              <tr>
                <td class=\"detail\" style=\"width: 50%;\">Etudiant</td>
                <td style=\"width: 50%;\"><div class=\"input\"><input type=\"text\" name=\"nom\" placeholder=\"Entrer le nom\"></div></td>
              </tr>
              <tr> 
                <td class=\"detail\" style=\"width: 50%;\">Maths</td>
                <td><div class=\"input\"><input type=\"number\" step=\"0.25\" name=\"math\" placeholder=\"Enter the mark\"></div></td>
              </tr>
              <tr> 
                <td class=\"detail\" style=\"width: 50%;\">Physics</td>
                <td><div class=\"input\"><input type=\"number\" step=\"0.25\" name=\"phy\" placeholder=\"Enter the mark\"></div></td>
              </tr>
              <tr>
                <td>
                  <div style=\"text-align: center;\"><input type=\"submit\" name=\"add\" value=\"Result\" class=\"btn\"></div>
                </td>
                <td>
                  <div style=\"text-align: center;\"><input type=\"submit\" name=\"reset\" value=\"Reset\" class=\"btn\"></div>
                </td>
              </tr>
              </table>
  
          </form>
      </div>;";

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
