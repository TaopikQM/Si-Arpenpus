<?php
class Datasekolah_model extends CI_Model
{ public function getDatasekolah() {
	// Mengambil data sekolah dari tabel 'datasekolah'
	$query = $this->db->get('datasekolah');
	
	// Mengembalikan hasil query dalam bentuk array
	return $query->result_array();
}
public function deleteSekolah($id) {
	$this->db->where('id', $id);
	$hasil = $this->db->delete('datasekolah');
	return $hasil;
}
}
