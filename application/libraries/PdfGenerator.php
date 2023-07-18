<?php
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class PdfGenerator extends TCPDF {
  public function __construct() {
    parent::__construct();
  }

  public function generatePDF($html, $filename) {
    // Set dokumen PDF
    $this->SetCreator(PDF_CREATOR);
    $this->SetAuthor('Your Name');
    $this->SetTitle('PDF Generator');
    $this->SetSubject('Generated PDF');
    $this->SetKeywords('PDF, CodeIgniter');

    // Atur orientasi dan ukuran halaman
    $this->SetOrientation('P');
    $this->SetPageSize('A4');

    // Tambahkan halaman baru
    $this->AddPage();

    // Tambahkan konten HTML ke halaman PDF
    $this->writeHTML($html, true, false, true, false, '');

    // Simpan file PDF ke server
    $this->Output($filename, 'I');
  }
}
?>
