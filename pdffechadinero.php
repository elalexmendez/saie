
<?php
require('assets/fpdf.php');
include 'ser.php';

$id1 = $_GET['id_ingreso'];

$sql="SELECT ingrersos.id as id_ingreso, dinero.id as id_dinero, donadores.Nombre , donadores.Apellido , categorias.clasificacion , dinero.cantidad , 
            ingrersos.descripcion , ingrersos.Fecha 
            FROM donadores INNER JOIN ingrersos ON ingrersos.id_donadores = donadores.id 
            INNER JOIN dinero ON dinero.cantidad = ingrersos.id_dinero 
            INNER JOIN categorias ON categorias.id = ingrersos.id_categoria 
            WHERE ingrersos.id = '$id1' ";
            $result= mysql_query($sql) or die(mysql_error());

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets/images/logo.png',10,20,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,30,'Iglesia Nuestra Senora del Rosario de Aranzazu',0,10,'C');
    $this->Image('assets/images/aranzazu.png',170,18,26);
    // Salto de línea
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(55);
$pdf->Cell(80,6,'Comprobante de Donacion',0,0,'C',0);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(25,6,'Fecha',1,0,'C',0);
$pdf->Cell(25,6,'Nombre',1,0,'C',0);
$pdf->Cell(25,6,'Apellido',1,0,'C',0);
$pdf->Cell(25,6,'Clasificacion',1,0,'C',0);
$pdf->Cell(25,6,'Cantidad',1,0,'C',0);
$pdf->Cell(50,6,'Descripcion',1,0,'C',0);


$pdf->Ln(10);


while ($fila = mysql_fetch_array($result)) {
    $Fecha = $fila ['Fecha'];
    $Nombre = $fila['Nombre'];
    $Apellido = $fila ['Apellido'];
    $Clasificacion = $fila['clasificacion'];
    $Cantidad = $fila ['cantidad'];
    $Descripcion = $fila ['descripcion'];


    $pdf->Cell(10);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(25,4,$Fecha,0,0,'C',0);
    $pdf->Cell(25,4,$Nombre,0,0,'C',0);
    $pdf->Cell(25,4,$Apellido,0,0,'C',0);
    $pdf->Cell(25,4,$Clasificacion,0,0,'C',0);
    $pdf->Cell(25,4,$Cantidad,0,0,'C',0);
    $pdf->MultiCell(50,4,$Descripcion,0,'J',0); 


    $pdf->Ln(80);
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15);
    $pdf->Cell(10,5,'_______________________',0,0,'L',0);
    $pdf->Cell(100);
    $pdf->Cell(200,5,'_______________________',0,0,'L',0);
    $pdf->Ln(10);
    $pdf->Cell(35);
    $pdf->Cell(60,5,'Recibe',0,0,'L',0);
    $pdf->Cell(53);
    $pdf->Cell(15,5,'Entrega',0,0,'R',0);

}

$pdf->Output();
?>