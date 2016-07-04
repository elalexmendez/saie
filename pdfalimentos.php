
<?php
require('assets/fpdf/fpdf.php');



require 'resources/config.php';

$id1 = $_GET['id_ingreso'];

$sql=       "SELECT *, alimentos.id , ingresos_alimentos.cantidad as can , ingresos_alimentos.id as ida 
                    FROM ingresos JOIN ingresos_alimentos ON ingresos_alimentos.alimento_id = ingresos.id 
                    JOIN alimentos ON alimentos.id = ingresos_alimentos.alimento_id 
                    JOIN donadores ON donadores.id = ingresos.donador_id 
            WHERE ingresos.id = '$id1' ";
            $result= mysql_query($sql);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets/images/aranzazu.png',170,18,26);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,20,'Despacho de Administracion Parroquial',0,10,'C');
    $this->Ln(1);
    $this->Cell(190,0,'Iglesia Nuestra Senora del Rosario de Aranzazu',0,10,'C');
    $this->Image('assets/images/logo.png',10,20,33);
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
    $this->Cell(0,10,'       Av. Pedro Lucas Urribarri, Casco Central. Santa Rita, Municipio Santa Rita, Edo. Zulia. Tlef.: 0264-934.21.78 / pqaranzazumia@hotmail.com');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30);
$pdf->Cell(80,4,'Control de Ingresos por Estipendios',0,0,'C',0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1);
$pdf->Cell(70,4,'Numero de Control:',0,0,'C',0);
$pdf->Ln(1);
while ($fila = mysql_fetch_array($result)) {
    
    // numero de control

    $Numero = $fila ['ida'];
    $pdf->Cell(150);
    $pdf->Cell(25,2,$Numero,0,0,'R',0);

    // final numero de control

    // fecha

    $pdf->SetFont('Arial','B',10);
    $pdf->Ln(10);
    $pdf->Cell(142);
    $pdf->Cell(10,4,'Fecha          Hora',0,0,'L',0);
    $pdf->Ln(5);


    $pdf->SetFont('Arial','',10);
    $Fecha = $fila['datetime'];
    $pdf->Cell(147);
    $pdf->Cell(25,4,$Fecha,0,0,'C',0);

    // final fecha

    //nombre y apellido
    $pdf->SetFont('Arial','B',10);
    $pdf->Ln(10);
    $pdf->Cell(16);
    $pdf->Cell(100,8,'Nombre y Apellido:',1,0,'L',0);
    $pdf->Ln(0);


    $pdf->SetFont('Arial','',10);
    $Nombre = $fila['Nombre'];
    $pdf->Cell(46);
    $pdf->Cell(25,8,$Nombre,0,0,'C',0);

    $Nombre = $fila['Apellido'];
    $pdf->Cell(1);
    $pdf->Cell(2,8,$Nombre,0,0,'C',0);

    // final nombre apellido

    // Cedula

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42);
    $pdf->Cell(60,8,'Cedula o RIF:',1,0,'L',0);
    $pdf->Ln(1);


    $pdf->SetFont('Arial','',10);
    $Cedula = $fila['donador_id'];
    $pdf->Cell(136);
    $pdf->Cell(25,6,$Cedula,0,0,'C',0);

    // final cedula

    // Estipendio
    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Ln(10);
    $pdf->Cell(16);
    $pdf->Cell(100,8,'Tipo de Alimento:',1,0,'L',0);
    $pdf->Ln(0);


    $pdf->SetFont('Arial','',10);
    $Tipo = $fila['Alimento'];
    $pdf->Cell(53);
    $pdf->Cell(25,8,$Tipo,0,0,'C',0);

    // final Estipendio

    // Cantidad de Dinero

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(38);
    $pdf->Cell(60,8,'Cantidad:',1,0,'L',0);
    $pdf->Ln(1);


    $pdf->SetFont('Arial','',10);
    $Dinero = $fila['cantidad'];
    $pdf->Cell(138);
    $pdf->Cell(25,6,$Dinero,0,0,'C',0);

    // final Dinero

    // Descripcion

    $pdf->Ln(11);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(16);
    $pdf->MultiCell(160,8,'Descripcion:',0,'J',0);

    $pdf->SetFont('Arial','',10);
    $descripcion = $fila['descripcion'];
    $pdf->Cell(20);
    $pdf->MultiCell(150,5,$descripcion,0,'J',0);

};

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

$pdf->Output();
?>