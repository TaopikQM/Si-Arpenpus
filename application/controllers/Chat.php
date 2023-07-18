<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Chat_model');
        $this->load->library('session');
		$this->load->model('message_model');
    }
    
    public function index() {
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
        
       // Mendapatkan ID pengguna yang sedang login
    //$receiverId = $this->session->userdata('user_id');
    $receiverId = $this->session->userdata('user_id');
$data['receiverName'] = $this->Chat_model->getUserNameById($receiverId);


    // Mendapatkan pesan-pesan dari database berdasarkan penerima
    $data['messages'] = $this->Chat_model->getMessagesByReceiverId($receiverId);
	$data['messages'] = $this->message_model->getMessages();
    //$data['messages'] = $this->Chat_model->getAllMessages();
    
    // Tampilkan halaman chat
    $this->load->view('chat/chat_view', $data);
    }
    
    public function sendMessagee() {
       // Tangkap data dari form
       
    $message = $this->input->post('message');
    
    // Mendapatkan ID pengguna yang sedang login
    $senderId = $this->session->userdata('user_id');

    // Set receiver_id sesuai dengan kebutuhan aplikasi
    $receiverId = 2; // Contoh: mengirim pesan ke penerima dengan ID 2
    
    // Simpan pesan ke database
    $data = array(
        'sender_id' => $senderId,
        'receiver_id' => $receiverId,
        'message' => $message
    );
    $this->Chat_model->insertMessage($data);
    
    // Redirect ke halaman chat
    redirect('chat');
}
    
    
    public function loadChat() {
        // Ambil pesan-pesan terbaru melalui AJAX
        // dan kirimkan sebagai respons JSON
        $receiverId = $this->input->post('receiver_id');
        $messages = $this->Chat_model->getMessagesByReceiverId($receiverId);
        foreach ($messages as $message) {
            $message->sender_name = $this->Chat_model->getUserNameById($message->sender_id);
        }
        
        echo json_encode($messages);
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
	public function sandMessage()
    {
		$sender = $this->session->userdata('nama'); // Ganti dengan pengirim yang sesuai
        $text = $this->input->post('message');

        // Panggil model dan simpan pesan ke dalam database
        $this->load->model('message_model');
        $this->chat_model->saveMessage($sender, $text);

        // Berikan respon jika diperlukan
        // ...
    }
	public function sendMessage() {
        $sender = $this->session->userdata('user_id'); // Ganti dengan pengirim yang sesuai, contoh: ID pengguna yang login
        $text = $this->input->post('message');

        // Simpan pesan ke dalam database
        $this->message_model->saveMessage($sender, $text);
    }
    
}


    
?>
