<?php
	session_start();
?>

<?php

ob_start();
require('./fpdf/fpdf.php');
$pdf = new FPDF();
$Mention = 'NULL';

    if(isset($_SESSION["name"][$_SESSION['var']])){

        $c1=$_SESSION["name"][$_SESSION['var']];
        $c2=$_SESSION["maths"][$_SESSION['var']];
        $c3=$_SESSION["physics"][$_SESSION['var']];
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

        $pdf->SetFillColor(220,220,220);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Image('./css/logo.png',95,12,20);
        $pdf->Cell(190,25,'',1,1,'C');
        $pdf->Cell(190,10,'Tableau de notes',1,1,'C');
        $pdf->Cell(95,15,'Nom',1,0,'C');
        $pdf->Cell(95,15,$c1,1,1,'C');
        $pdf->Cell(95,15,'Maths',1,0,'C');
        $pdf->Cell(95,15,$c2,1,1,'C');
        $pdf->Cell(95,15,'Physics',1,0,'C');
        $pdf->Cell(95,15,$c3,1,1,'C');
        $pdf->Cell(95,15,'Moyenne',1,0,'C');
        $pdf->Cell(95,15,$c4,1,1,'C');
        $pdf->Cell(95,15,'Mention',1,0,'C');
        $pdf->Cell(95,15,$Mention,1,1,'C');
 
    }

    $pdf->Output('D',$c1.'.pdf');
    ob_end_flush(); 

?>

