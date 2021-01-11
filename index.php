<?php

require_once('vendor/autoload.php');
require_once('config.php');

use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();

$pdf->AddPage();
$pdf->setSourceFile('Prilog.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 0, 0, null, null, true);

$pdf->Image(
    'signature.png',
    SIGNATURE_POSITION_X,
    SIGNATURE_POSITION_Y,
    SIGNATURE_WIDTH,
    SIGNATURE_HEIGHT
);

$pdf->SetFont(FONT_FAMILY, BOLD, FONT_SIZE);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(PAYEMENT_CODE_POSITION_X, PAYEMENT_CODE_POSITION_Y);
$pdf->Write(0, PAYEMENT_CODE);

$pdf->Output();
