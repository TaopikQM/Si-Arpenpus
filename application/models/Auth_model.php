<?php
class Auth_model extends CI_Model {
    
    public function register_user($data) {
        return $this->db->insert('dbstaf', $data);
    }

	public function register_umum($data) {
        return $this->db->insert('dbpenumum', $data);
    }

    public function register_admin($data) {
        return $this->db->insert('dbadmin', $data);
    }

    public function login_user($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('dbstaf');
        return $query->row();
    }



    public function login_umum($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('dbpenumum');
        return $query->row();
    }

    public function login_admin($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('dbadmin');
        return $query->row();
    }

	public function get_data_staf() {
        $query = $this->db->get('dbstaf');
        return $query->result();
    }

    public function get_data_umum() {
        $query = $this->db->get('dbpenumum');
        return $query->result();
    }

    public function get_data_admin() {
        $query = $this->db->get('dbadmin');
        return $query->result();
    }

	public function deleteStaf($id) {
        $this->db->where('id', $id);
        $hasil = $this->db->delete('dbstaf');
        return $hasil;
    }
	public function deleteUmum($id) {
        $this->db->where('id', $id);
        $hasil = $this->db->delete('dbpenumum');
        return $hasil;
    }
	public function deleteAdmin($id) {
        $this->db->where('id', $id);
        $hasil = $this->db->delete('dbadmin');
        return $hasil;
    }


	public function getTotalData()
		{
		  // Menggunakan query builder untuk menghitung total data dari tabel
		  $totalData = $this->db->count_all_results('dbstaf');
		  return $totalData;
		}
	public function getTotalDataU()
		{
		  // Menggunakan query builder untuk menghitung total data dari tabel
		  $totalDataU = $this->db->count_all_results('dbpenumum');
		  return $totalDataU;
		}
}
?>
