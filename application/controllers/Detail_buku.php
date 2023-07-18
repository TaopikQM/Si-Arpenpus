<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detail_buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Staf_model'); // Memuat model Staf_model
        $this->load->model('BukuModel'); // Memuat model BukuModel
    }
    public function index($id)
	{
		$this->load->library('session');
		$data['nama'] = '';
		$data['peran'] = '';
		
	
		// Ambil informasi pengguna dari database berdasarkan email
		$email = $this->session->userdata('email');

		$user = $this->db->get_where('dbpenumum', ['email' => $email])->row_array();

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
        //$data['detail_buku'] = $this->BukuModel->getDetailBuku($id);
		// Tampilkan view halaman dashboard dengan data pengguna
		$data['detail_buku'] = $this->BukuModel->getDetailBuku($id);
		$this->load->view('umum_dashboard/detail_buku', $data);
		
        
	}
    // Fungsi getProfileInitial()
	public function getProfileInitial() {
		$this->load->model('Profil_model');
		$user_id = $this->session->userdata('user_id'); // Ambil user_id dari session

		// Ambil data profil dari model
		$profil = $this->Profil_model->getProfilData($user_id);
        $profil = $this->Profil_model->getProfilDataUmum($user_id);

		// Ambil huruf awal nama
		$initial = substr($profil['nama'], 0, 1);

		// Kembalikan huruf awal nama
		return $initial;
	}
    public function detail($id)
    {
        $data['detail_buku'] = $this->BukuModel->getDetailBuku($id);
        $this->load->view('detail_buku', $data);
    }
	
    


}
?>
