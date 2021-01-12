<?php 

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$noLoan = 1;
	$noSaving = 1;

	// Declare FPDF and Set Size Page
	$pdf = new FPDF('P','mm','A4');

	// Add Page
	$pdf->AddPage();

	// Set Title Page
	$pdf->SetTitle($member[0]->uid.'-'.$member[0]->username);

	// Start Biodata
	$pdf->Image(base_url()."assets/img/logo.png", 10, 20,'20','20','png');
	$pdf->Ln(17);
	$pdf->setFont('Times','B',16);
	$pdf->setFillColor(255,255,255);
	$pdf->cell(25,6,'',0,0,'C',0); 
	$pdf->cell(100,6, strtoupper('Laporan Data Pinjaman dan Simpanan Anggota'),0,1,'L',1); 
	$pdf->cell(25,6,'',0,0,'C',0); 
	$pdf->cell(100,6,"",0,1,'L',1); 
	$pdf->cell(25,6,'',0,0,'C',0); 
	$pdf->cell(100,6,'',0,1,'L',1); 
	// End Biodata

	$pdf->Ln(5);

	// Start Biodata
	$pdf->setFont('Arial','B',16);
	$pdf->Cell(120, 5, $member[0]->uid, 0, 0, 'L');
	$pdf->Cell(70, 5, $member[0]->username, 0, 0, 'L');
	$pdf->Ln();
	$pdf->setFont('Arial','',12);
	$pdf->Cell(120, 5, $member[0]->name, 0, 0, 'L');
	$pdf->Cell(70, 5, $member[0]->email, 0, 0, 'L');
	$pdf->Ln();
	$pdf->Cell(120, 5, $member[0]->address, 0, 0, 'L');
	$pdf->Cell(70, 5, $member[0]->phone, 0, 0, 'L');
	// End Biodata

	$pdf->Ln(10);

	// Start Loan
	$pdf->setFont('Arial','B',14);
	$pdf->Cell(190, 5, 'Pinjaman', 0, 0, 'L');
	$pdf->Ln(10);

	$pdf->setFont('Arial','B',7);
	$pdf->setFillColor(230,230,200);
	$pdf->cell(10,10,'No.',1,0,'C',1);
	$pdf->cell(30,10,'Tanggal',1,0,'C',1);
	$pdf->cell(25,10,'Jumlah Pinjaman',1,0,'C',1);
	$pdf->cell(15,10,'Bunga(%)',1,0,'C',1);
	$pdf->cell(25,10,'Total Pembayaran',1,0,'C',1);
	$pdf->cell(25,10,'Terbayar',1,0,'C',1);
	$pdf->cell(20,10,'Sisa',1,0,'C',1);
	$pdf->cell(20,10,'Jumlah Bulan',1,0,'C',1);
	$pdf->cell(20,10,'Status',1,0,'C',1);
	$pdf->Ln();

	if ($loans == null) {
		$pdf->setFont('Arial','B',7);
		$pdf->setFillColor(255,255,255);
		$pdf->cell(190,10,'Tidak ditemukan data',1,0,'C',1);
	} else {
		foreach ($loans as $loan) {
			$pdf->setFont('Arial','B',7);
			$pdf->setFillColor(255,255,255);
			$pdf->cell(10,10,$noLoan.'.',1,0,'C',1);
			$pdf->cell(30,10,$loan->time,1,0,'C',1);
			$pdf->cell(25,10,'Rp. '.number_format($loan->debt),1,0,'C',1);
			$pdf->cell(15,10,$loan->interest.'%',1,0,'C',1);
			$pdf->cell(25,10,'Rp. '.number_format($loan->debt_total),1,0,'C',1);
			$pdf->cell(25,10,'Rp. '.number_format($loan->debt_paid),1,0,'C',1);
			$pdf->cell(20,10,'Rp. '.number_format($loan->debt_total - $loan->debt_paid),1,0,'C',1);
			$pdf->cell(20,10,$loan->amount_month.' Bulan',1,0,'C',1);
			$pdf->cell(20,10,$statuses[$loan->status]['name'],1,0,'C',1);
			$noLoan++;
			$pdf->Ln();
		}
	}

	// End Loan

	$pdf->Ln(5);

	// Start Saving
	$pdf->setFont('Arial','B',14);
	$pdf->Cell(190, 5, 'Simpanan', 0, 0, 'L');
	$pdf->Ln(10);

	$pdf->setFont('Arial','B',7);
	$pdf->setFillColor(230,230,200);
	$pdf->cell(10,10,'No.',1,0,'C',1);
	$pdf->cell(50,10,'Tanggal',1,0,'C',1);
	$pdf->cell(30,10,'Jumlah',1,0,'C',1);
	$pdf->cell(25,10,'Jenis',1,0,'C',1);
	$pdf->cell(25,10,'Tipe Simpanan',1,0,'C',1);
	$pdf->Ln();

	if ($savings == null) {
		$pdf->setFont('Arial','B',7);
		$pdf->setFillColor(255,255,255);
		$pdf->cell(190,10,'Tidak ditemukan data',1,0,'C',1);
	} else {
		foreach ($savings as $saving) {
			$pdf->setFont('Arial','B',7);
			$pdf->setFillColor(255,255,255);
			$pdf->cell(10,10,$noSaving.'.',1,0,'C',1);
			$pdf->cell(50,10,$saving->time,1,0,'C',1);
			$pdf->cell(30,10,'Rp. '.number_format($saving->amount),1,0,'C',1);
			$pdf->cell(25,10,$types[$saving->type]['name'],1,0,'C',1);
			$pdf->cell(25,10,$kinds[$saving->kind]['name'],1,0,'C',1);
			$noSaving++;
			$pdf->Ln();
		}
	}

	// End Saving

	// Print Out
	$pdf->Output('I', $member[0]->uid.'-'.$member[0]->username.'.pdf');

?> 