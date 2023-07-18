<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsBuku extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model dan helper yang diperlukan
		$this->load->model('BukuModel');

    }

	public function index() {
		
	}public function insBuku() {
		$foto = $_FILES['foto'];
		$judul_buku = $_POST['jBuku'];
		$pengarang = $_POST['tpengarang'];
		$penerbit = $_POST['tpenerbit'];
		$tahun = $_POST['tbuku'];
		$deskripsi = $_POST['tdeskripsi'];
	
		 // Pindahkan foto ke direktori tujuan
		 $targetDirectory = FCPATH . 'assets/img/uploads/';
		 $targetPath = $targetDirectory . $foto['name'];
		 move_uploaded_file($foto['tmp_name'], $targetPath);

		$result = $this->BukuModel->insBuku($foto['name'], $judul_buku, $pengarang, $penerbit, $tahun,$deskripsi);
		if ($result) {
			echo "Data berhasil disimpan";
			redirect('Buku'); // Tambahkan pesan ini atau arahkan ke tampilan yang tepat setelah berhasil disimpan
		} else {
			echo "Gagal menyimpan data";
		}
	}
	
	
}
