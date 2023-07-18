<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detailumum extends CI_Controller
{public function index()
	{
		$this->load->library('session');
		$data['nama'] = '';
		$data['peran'] = '';
		
	
		// Ambil informasi pengguna dari database berdasarkan email
		$email = $this->session->userdata('email');

		$user = $this->db->get_where('dbadmin', ['email' => $email])->row_array();

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
		$data['dbstaf'] = $this->Auth_model->get_data_staf();
		$data['dbpenumum'] = $this->Auth_model->get_data_umum();
		$data['dbadmin'] = $this->Auth_model->get_data_admin();
		$data['chat'] = $this->Chat_model->getAllMessages() ;
		$this->load->view('admin_dashboard/detailumum', $data);
        
	}
    // Fungsi getProfileInitial()
	public function getProfileInitial() {
		$this->load->model('Profil_model');
		$user_id = $this->session->userdata('user_id'); // Ambil user_id dari session

		// Ambil data profil dari model
		$profil = $this->Profil_model->getProfilDataAdmin($user_id);

		// Ambil huruf awal nama
		$initial = '';
		if (!empty($profil) && isset($profil['nama'])) {
			$initial = substr($profil['nama'], 0, 1);
		}

			// Kembalikan huruf awal nama
			return $initial;
		}
		public function __construct()
		{
		parent::__construct();
	
		$this->load->model('Staf_model'); // Load SiswaModel ke controller ini
		$this->load->model('BukuModel');
		$this->load->model('Auth_model');
		$this->load->model('Chat_model');
		}

		public function deleteData() {
			$id = $this->input->post('id');
			$this->load->model('BukuModel');
			
			// Panggil fungsi deleteBuku pada model dengan parameter $id
			$result = $this->BukuModel->deleteBuku($id);
			
			if ($result) {
				// Jika penghapusan berhasil, tampilkan pesan sukses atau lakukan tindakan lainnya
				echo "Data berhasil dihapus";
			} else {
				// Jika penghapusan gagal, tampilkan pesan error atau lakukan tindakan lainnya
				echo "Gagal menghapus data";
			}
		}
		public function deleteDataPend() {
			$id = $this->input->post('id');
			
			$this->load->model('Datasekolah_model');
			
			// Panggil fungsi deleteBuku pada model dengan parameter $id
			
			$result = $this->Datasekolah_model->deleteSekolah($id);
			
			if ($result) {
				// Jika penghapusan berhasil, tampilkan pesan sukses atau lakukan tindakan lainnya
				echo "Data berhasil dihapus";
			} else {
				// Jika penghapusan gagal, tampilkan pesan error atau lakukan tindakan lainnya
				echo "Gagal menghapus data";
			}
		}
		public function deleteDataStaf() {
			$id = $this->input->post('id');
			
			$this->load->model('Auth_model');
			
			// Panggil fungsi deleteBuku pada model dengan parameter $id
			
			$result = $this->Auth_model->deleteStaf($id);
			
			
			if ($result) {
				// Jika penghapusan berhasil, tampilkan pesan sukses atau lakukan tindakan lainnya
				echo "Data berhasil dihapus";
			} else {
				// Jika penghapusan gagal, tampilkan pesan error atau lakukan tindakan lainnya
				echo "Gagal menghapus data";
			}
		}
		public function deleteDataUmum() {
			$id = $this->input->post('id');
			
			$this->load->model('Auth_model');
			
			// Panggil fungsi deleteBuku pada model dengan parameter $id
		
			$result = $this->Auth_model->deleteUmum($id);
			
			
			if ($result) {
				// Jika penghapusan berhasil, tampilkan pesan sukses atau lakukan tindakan lainnya
				echo "Data berhasil dihapus";
			} else {
				// Jika penghapusan gagal, tampilkan pesan error atau lakukan tindakan lainnya
				echo "Gagal menghapus data";
			}
		}
		public function deleteDataAdmin() {
			$id = $this->input->post('id');
			
			$this->load->model('Auth_model');
			
			// Panggil fungsi deleteBuku pada model dengan parameter $id
			
			$result = $this->Auth_model->deleteAdmin($id);
			
			if ($result) {
				// Jika penghapusan berhasil, tampilkan pesan sukses atau lakukan tindakan lainnya
				echo "Data berhasil dihapus";
			} else {
				// Jika penghapusan gagal, tampilkan pesan error atau lakukan tindakan lainnya
				echo "Gagal menghapus data";
			}
		}
		public function deleteDataChat() {
			$id = $this->input->post('id');
			
			$this->load->model('Chat_model');
			
			// Panggil fungsi deleteBuku pada model dengan parameter $id
			
			$result = $this->Chat_model->deleteChat($id);
			
			if ($result) {
				// Jika penghapusan berhasil, tampilkan pesan sukses atau lakukan tindakan lainnya
				echo "Data berhasil dihapus";
			} else {
				// Jika penghapusan gagal, tampilkan pesan error atau lakukan tindakan lainnya
				echo "Gagal menghapus data";
			}
		}
		
		
		

		}
?>
