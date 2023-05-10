<?php
require_once('tcpdf/tcpdf.php');
require_once('md.php');

$model = new Model();
$searchResults = $model->fetch(); // Assuming you have a method to fetch data from the "defi" table

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

$pdf->SetCreator('Youth Space');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Tableau des Défis');

$pdf->SetHeaderData('', 0, 'Youth Space', 'Tableau des Défis');
$pdf->setFooterData(['0', '0', '0'], ['0', '0', '0']);

$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();

$pdf->Cell(0, 10, 'Tableau des Défis', 0, 1, 'C');

$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(15, 10, 'n', 1, 0, 'C');
$pdf->Cell(30, 10, 'J2', 1, 0, 'C');
$pdf->Cell(30, 10, 'jeu', 1, 0, 'C');
$pdf->Cell(40, 10, 'Description', 1, 0, 'C');

$pdf->SetFont('helvetica', '', 10);

// Iterate over the search results and add them to the PDF
$n = 1;
foreach ($searchResults as $row) {
    $pdf->Ln();
    $pdf->Cell(15, 10, $n++, 1, 0, 'C');
    $pdf->Cell(30, 10, isset($row['j2']) ? $row['j2'] : '', 1, 0, 'C');
    $pdf->Cell(30, 10, isset($row['jeu']) ? $row['jeu'] : '', 1, 0, 'C');
    $pdf->Cell(40, 10, isset($row['detail']) ? $row['detail'] : '', 1, 0, 'C');
}

ob_end_clean(); // Clear any previously buffered output
$pdf->Output('tableau_defis.pdf', 'I');
?>
