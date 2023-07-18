<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function insBuku($foto, $judul_buku, $pengarang, $penerbit, $tahun,$deskripsi) {
		$data = array(
		   'foto' => $foto,
		   'judul_buku' => $judul_buku,
		   'pengarang' => $pengarang,
		   'penerbit' => $penerbit,
		   'tahun' => $tahun,
		   'deskripsi' => $deskripsi
		);
	 
		$hasil = $this->db->insert('buku', $data);
		return $hasil;
	 }
	 
	
	public function bukuAll() {
		$query = $this->db->get('buku');
		return $query->result();
	}

    public function getBuku($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('buku');
        return $query->row();
    }

    public function updateBuku($id, $foto, $judul_buku, $pengarang, $penerbit, $tahun, $deskripsi) {
        $data = array(
            'foto' => $foto,
            'judul_buku' => $judul_buku,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'tahun' => $tahun,
            'deskripsi' => $deskripsi
        );
        $this->db->where('id', $id);
        $hasil = $this->db->update('buku', $data);
        return $hasil;
    }

    
    public function deleteBuku($id) {
        $this->db->where('id', $id);
        $hasil = $this->db->delete('buku');
        return $hasil;
    }

    //menampilkan detail buku
    public function getDetailBuku($id)
    {
        // Ambil detail buku berdasarkan ID
        $query = $this->db->get_where('buku', array('id' => $id));
        return $query->row();
    }
}
