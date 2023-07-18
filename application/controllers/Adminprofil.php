<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adminprofil extends CI_Controller
{

	public function index()
	{
		$this->load->library('session');
		$this->load->model('Profil_model');
		$user_id = $this->session->userdata('user_id'); // Ambil user_id dari session

		// Ambil data profil dari model

		$data['profil_admin'] = $this->Profil_model->getProfilDataAdmin($user_id);

		$last_activity = $this->session->userdata('last_activity');
		$session_timeout = $this->session->userdata('session_timeout');

		if (time() - $last_activity > $session_timeout) {
			// Jika waktu timeout tercapai, hapus data sesi dan redirect ke halaman login
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('last_activity');
			$this->session->unset_userdata('session_timeout');
			redirect('dashboard');
		}

		if ($data['profil_admin']) {
			// Jika user adalah pengunjung umum, tampilkan tampilan profil pengunjung umum
			$this->load->view('profil/profil_admin', $data);
		} else {
			// Tidak ada data profil yang ditemukan, tampilkan pesan kesalahan atau redirect ke halaman lain
			redirect('controller_override/action_override');
		}
	}
}
