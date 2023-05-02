<?php
require "connection.php";
require "fpdf183/fpdf.php";

$results='SELECT * FROM users ORDER by id';
$sql=mysqli_query($conn,$results);

$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",12);

while($row = $sql->fetch_object()){
$id=$row->id;
$firstname=$row->fname;
$lastname=$row->lname;
$email=$row->email;
$gender=$row->gender;

$pdf->Cell(20,10,$id,1);
$pdf->Cell(40,10,$firstname,1);
$pdf->Cell(40,10,$lastname,1);
$pdf->Cell(80,10,$email,1);
$pdf->Cell(40,10,$gender,1);
$pdf->Ln();
}

$pdf->Output();  
?> 