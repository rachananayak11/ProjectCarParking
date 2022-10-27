<?php
session_start();

require_once("fpdf/fpdf.php");
include('connection.php'); 

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Arial','B',12);
    $this->Cell(30);
	$this->Ln(6);
    $this->Cell(40,10,'CAR PARKING',0,0,'C');
	$this->Ln(6);
	$this->SetFont('Arial','B',8);
	$this->Cell(40,10,'RECEIPT',0,0,'C');
   
}

function Footer()
{
    
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$bookid = $_SESSION['ORDERREF'];
$lid = $_SESSION['lid'];

$sqlQuery1 = "SELECT * FROM reserve WHERE bookingid = '$bookid'";
$result1 = mysqli_query($con, $sqlQuery1);
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

$sqlQuery2 = "SELECT * FROM location WHERE locationid = '$lid'";
$result2 = mysqli_query($con, $sqlQuery2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);


$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Ln(1);
$pdf->Cell(0,8,'_______________________________',0,1);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,1,'Date: '. $row1['checkin'],0,1);
$pdf->Cell(0,8,'Booking ID : '. $row1['bookingid'],0,1);
$pdf->Cell(0,6,'Car Number : '. $row1['carnum'],0,1);
$pdf->Cell(0,4,'Location : '. $row2['locationname'],0,1);
$pdf->Cell(0,5,'_______________________________',0,1);
$pdf->SetFont('Times','B',6);
$pdf->Cell(40,3,'You may need to provide this receipt on request',0,1);
$pdf->SetFont('Times','',6);
$pdf->Cell(0,7,'Thank you for visiting',0,1);
$pdf->Cell(0,7,'',0,1);

$pdf->Output('D',"car_sample.pdf", True);



?>