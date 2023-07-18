<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('session');
		$this->load->library('form_validation');
    }

	
	public function index()
	{
	  $this->load->view('');
	}



    public function register() {
		$this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[dbstaf.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_validate_password');
        $this->form_validation->set_rules('tempat_kerja', 'Tempat Kerja', 'required');
		$this->form_validation->set_rules('nip', 'Nip','required');
        $this->form_validation->set_rules('peran', 'Staf Perpus');

        if ($this->form_validation->run() == FALSE) {
			$data['error_msg'] = validation_errors();
            $this->load->view('staf_register/register', $data);
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
				'password' =>$this->input->post('password'), 
                'tempat_kerja' => $this->input->post('tempat_kerja'),
				'nip' => $this->input->post('nip'),
                'peran' => 'Staf Perpus'
            );

			
            $result = $this->auth_model->register_user($data);

            if ($result) {
                $this->session->set_flashdata('success_msg', 'Registrasi berhasil. Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error_msg', 'Registrasi gagal. Silakan coba lagi.');
                redirect('auth/register');
            }
        }
    }

	public function validate_password($password)
    {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Z])[A-Za-z\d@$!%*#?&]{8,}$/', $password)) {
            $this->form_validation->set_message('validate_password', 'Password harus memiliki awalan huruf besar dan setidaknya 8 karakter dengan campuran angka, huruf, dan karakter.');
            return FALSE;
        }
        return TRUE;
    }

	public function daftar() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[dbpenumum.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_validate_password');
        $this->form_validation->set_rules('peran', 'P. Umum');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('peng_umum/daftar');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' =>$this->input->post('password'), 
                'peran' => 'P. Umum'
            );

            $result = $this->auth_model->register_umum($data);

            if ($result) {
                $this->session->set_flashdata('success_msg', 'Registrasi berhasil. Silakan login.');
                
				redirect('auth/login');
            } else {
                $this->session->set_flashdata('error_msg', 'Registrasi gagal. Silakan coba lagi.');
                redirect('auth/daftar');
            }
        }
    }

    public function admin() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[dbadmin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_validate_password');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('nip', 'nip','required');
        $this->form_validation->set_rules('peran', 'Admin');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
                'jabatan' => $this->input->post('jabatan'),
                'nip' => $this->input->post('nip'),
                'peran' => 'Admin'
            );

            $result = $this->auth_model->register_admin($data);

            if ($result) {
                $this->session->set_flashdata('success_msg', 'Registrasi berhasil. Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error_msg', 'Registrasi gagal. Silakan coba lagi.');
                redirect('auth/admin');
            }
        }
    }


    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_validate_password');
		$this->form_validation->set_message('validate_password', 'Email atau password salah.');


        if ($this->form_validation->run() == FALSE) {
      
            $this->load->view('login/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            //login user(staf)
            $user = $this->auth_model->login_user($email, $password);
        

            //login umum
            $result_umum = $this->auth_model->login_umum($email, $password);
            //login admin
            $result_admin = $this->auth_model->login_admin($email, $password);

            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
				$this->session->set_userdata('last_activity', time()); // Set waktu aktivitas terakhir pengguna
				$this->session->set_userdata('session_timeout', 12000); // Set waktu timeout dalam detik (contoh: 120 detik = 2 menit)
				redirect('staf_dashboard');
            }  elseif ($result_umum) {
                // Login pengunjung umum berhasil, lakukan sesuatu seperti mengatur sesi pengguna
                $this->session->set_userdata('user_id', $result_umum->id);
				$this->session->set_userdata('last_activity', time()); // Set waktu aktivitas terakhir pengguna
				$this->session->set_userdata('session_timeout', 12000); // Set waktu timeout dalam detik (contoh: 120 detik = 2 menit)
				
                redirect('Umum_dashboard');
            } elseif ($result_admin) {
                // Login pengunjung umum berhasil, lakukan sesuatu seperti mengatur sesi pengguna
                $this->session->set_userdata('user_id', $result_admin->id);
				$this->session->set_userdata('last_activity', time()); // Set waktu aktivitas terakhir pengguna
				$this->session->set_userdata('session_timeout', 12000); // Set waktu timeout dalam detik (contoh: 120 detik = 2 menit)
				
                redirect('Admin_dashboard');
            }
            else {
                 $this->session->set_flashdata('error_msg', 'Email atau password salah.');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
		
		$this->session->unset_userdata('last_activity');
        redirect('dashboard');
    }
}
