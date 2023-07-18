<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class DataSma extends CI_Controller
{public function index()
	{
		//$this->load->view('staf_dashboard/datasd', $data);
		$this->load->library('session');
		$data['nama'] = '';
		$data['peran'] = '';
		
	
		// Ambil informasi pengguna dari database berdasarkan email
		$email = $this->session->userdata('email');

		$user = $this->db->get_where('dbstaf', ['email' => $email])->row_array();

		if ($user) {
			$this->session->set_userdata('user_id', $user['id']);
			$this->session->set_userdata('nama', $user['nama']);
			$this->session->set_userdata('peran', $user['peran']);
		
			// Mengisi variabel $nama dan $peran dengan nilai dari session
			$data['nama'] = $this->session->userdata('nama');
			$data['peran'] = $this->session->userdata('peran');
		}
		
	
		// Menyiapkan data untuk dikirimkan ke view
		$data['nama'] = $this->session->userdata('nama');
		$data['peran'] = $this->session->userdata('peran');
	
		 // Load the view and pass the data
		 $data['initial'] = $this->getProfileInitial(); // Assign the initial value to the data variable
		
		 $last_activity = $this->session->userdata('last_activity');
			$session_timeout = $this->session->userdata('session_timeout');

			if (time() - $last_activity > $session_timeout) {
				// Jika waktu timeout tercapai, hapus data sesi dan redirect ke halaman login
				$this->session->unset_userdata('user_id');
				$this->session->unset_userdata('last_activity');
				$this->session->unset_userdata('session_timeout');
				redirect('dashboard');
			}

		$initial = $this->getProfileInitial();
        
		$data['datasekolah'] = $this->Staf_model->view();
		// Tampilkan view halaman dashboard dengan data pengguna
        // Misalnya, muat tampilan (view) yang sesuai:
        $this->load->view('staf_dashboard/datasma',$data);
        
	}
    // Fungsi getProfileInitial()
	public function getProfileInitial() {
		$this->load->model('Profil_model');
		$user_id = $this->session->userdata('user_id'); // Ambil user_id dari session

		// Ambil data profil dari model
		$profil = $this->Profil_model->getProfilData($user_id);

		// Ambil huruf awal nama
		$initial = substr($profil['nama'], 0, 1);

		// Kembalikan huruf awal nama
		return $initial;
	}
	public function __construct()
	{
	  parent::__construct();
  
	  $this->load->model('Staf_model'); // Load SiswaModel ke controller ini
	}
	public function generatePdf() {
		$pdfContent = $this->input->post('content'); // Mendapatkan konten HTML dari POST data
	  
		// Load library PdfGenerator
		$this->load->library('PdfGenerator');
	  
		// Membuat instance objek PdfGenerator
		$pdf = new PdfGenerator();
	  
		// Menghasilkan PDF dengan konten HTML
		$filename = "cetak_sma.pdf"; // Nama file PDF yang akan dihasilkan
		$pdf->generatePDF($pdfContent, $filename);
	  
		// Mengembalikan filepath file PDF yang dihasilkan
		$response['filepath'] = base_url() . $filename;
		echo json_encode($response);
	  }
	  
    
}
?>
