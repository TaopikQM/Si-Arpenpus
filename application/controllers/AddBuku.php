<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class AddBuku extends CI_Controller
{
	public function __construct()
	{
			
	  parent::__construct();
	  $this->load->helper(array('form', 'url'));
			$this->load->model('BukuModel');
            $this->load->model('Staf_model');
            
  
	}
	public function index()
	{
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
		$data['buku'] = $this->BukuModel->bukuAll();
		 // Memuat view 'datasekolah'
		$this->load->view('addbuku/addbuku',$data);
	} 

	public function tambahData() {
        try {
        // Proses penambahan data buku
        $foto = $_FILES['foto']['name'];
        $judul_buku = $this->input->post('jBuku');
        $pengarang = $this->input->post('tpengarang');
        $penerbit = $this->input->post('tpenerbit');
        $tahun = $this->input->post('tbuku');
        $deskripsi = $this->input->post('tdeskripsi');

        // Upload file gambar
        $config['upload_path'] = 'assets/img/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('Staf_dashboard', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            // Simpan data buku ke database
            $inserted = $this->BukuModel->insBuku($data['upload_data']['file_name'], $judul_buku, $pengarang, $penerbit, $tahun);
            if ($inserted) {
                // Jika data berhasil disimpan, tampilkan pesan sukses dan tetap di halaman yang sama
                $data['success_message'] = 'Data buku berhasil disimpan.';
                $this->load->view('Staf_dashboard', $data);
            } else {
                // Jika data gagal disimpan, tampilkan pesan gagal dan tetap di halaman yang sama
                $data['error_message'] = 'Gagal menyimpan data buku.';
                $this->load->view('Staf_dashboard', $data);
            }
        }
    } catch (Exception $e) {
        // Tangkap dan tampilkan pesan kesalahan
        echo 'Error: ' . $e->getMessage();
    }
    }

	public function deleteData($id) {
        // Proses penghapusan data buku
        $this->BukuModel->deleteBuku($id);

        redirect('Staf_dashboard');
    }
     // Fungsi getProfileInitial
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
	
    
}
