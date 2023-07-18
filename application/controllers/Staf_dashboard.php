<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Staf_dashboard extends CI_Controller
{public function index()
	{
		$this->load->library('session');
		$data['nama'] = '';
		$data['peran'] = '';
		
	
		// Ambil informasi pengguna dari database berdasarkan email
		$email = $this->session->userdata('email');

		$user = $this->db->get_where('dbstafp', ['email' => $email])->row_array();

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
		$data['buku'] = $this->BukuModel->bukuAll();
		$this->load->view('Staf_dashboard/staf_dashboard', $data);
        
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
	  $this->load->model('BukuModel');
	}

	public function tambahData() {
        // Proses penambahan data buku
        $foto = $_FILES['foto']['name'];
        $judul_buku = $this->input->post('jBuku');
        $pengarang = $this->input->post('tpengarang');
        $penerbit = $this->input->post('tpenerbit');
        $tahun = $this->input->post('tbuku');

        // Upload file gambar
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('dashboard/index', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            // Simpan data buku ke database
            $this->BukuModel->insBuku($data['upload_data']['file_name'], $judul_buku, $pengarang, $penerbit, $tahun);
            
            redirect('dashboard/index');
        }
    }

	public function deleteData($id) {
        // Proses penghapusan data buku
        $this->BukuModel->deleteBuku($id);

        redirect('dashboard');
    }


}
?>
