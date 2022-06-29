<?php 
   require_once('admin/database.php');
   require_once('admin/requires/connection.php');
   require_once('fpdf/fpdf.php');
   
   $last_id=$_REQUEST['user_id'];
   $obj=new database();
   $res=$obj->update_user_record($last_id);
   $row=mysqli_fetch_assoc($res);

    $pdf = new FPDF();

    $pdf->AddPage();

     $pdf->ln(5);
     $pdf->ln(5);
     $pdf->ln(5);
     $pdf->ln(5);
     $pdf->SetFont('Arial','B',21);
     $pdf->Cell(30);
     $pdf->Cell(120,15,'Your Account Information','',1,'C');
     $pdf->Cell(30);
     $pdf->SetFont('Arial','',11);

     $pdf->Cell(70,7,'SNo',1,0,'l');
     $pdf->Cell(50,7,$row['user_id'],1,1,'l');
     $pdf->Cell(30);
     $pdf->Cell(70,7,'First Name',1,0,'l');
     $pdf->Cell(50,7,$row['first_name'],1,1,'l');
     $pdf->Cell(30);
     $pdf->Cell(70,7,'Last Name',1,0,'l');
     $pdf->Cell(50,7,$row['last_name'],1,1,'l');
     $pdf->Cell(30);
     $pdf->Cell(70,7,'Email',1,0,'l');
     $pdf->Cell(50,7,$row['email'],1,1,'l');
     $pdf->Cell(30);
     $pdf->Cell(70,7,'Password',1,0,'l');
     $pdf->Cell(50,7,$row['password'],1,1,'l');
     $pdf->Cell(30);
     $pdf->Cell(70,7,'Gender',1,0,'l');
     $pdf->Cell(50,7,$row['gender'],1,1,'l');
     $pdf->Cell(30);

     $pdf->Output('D',"doc".rand(000,12345).".pdf");
  
 ?>