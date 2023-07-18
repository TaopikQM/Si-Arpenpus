<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function __construct()
	{
			
	  parent::__construct();
	  $this->load->helper(array('form', 'url'));
			$this->load->model('BukuModel');
  
	}
	public function index()
	{
		$data['buku'] = $this->BukuModel->bukuAll();
		 // Memuat view 'datasekolah'
		$this->load->view('dashboard/index',$data);
	} 

	public function tambahData() {
        // Proses penambahan data buku
        $foto = $_FILES['foto']['name'];
        $judul_buku = $this->input->post('jBuku');
        $pengarang = $this->input->post('tpengarang');
        $penerbit = $this->input->post('tpenerbit');
        $tahun = $this->input->post('tbuku');

        // Upload file gambar
        $config['upload_path'] = './assets/img/uploads/';
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
