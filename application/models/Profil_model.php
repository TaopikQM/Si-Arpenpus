<?php
class Profil_model extends CI_Model {
    public function getProfilData($user_id) {
        // Mengambil data profil berdasarkan user_id
        $query = $this->db->get_where('dbstaf', array('id' => $user_id));
        return $query->row_array();
    }
	public function getProfilDataUmum($user_id) {
        // Mengambil data profil berdasarkan user_id
        $query = $this->db->get_where('dbpenumum', array('id' => $user_id));
        return $query->row_array();
    }
    public function getProfilDataAdmin($user_id) {
        // Mengambil data profil berdasarkan user_id
        $query = $this->db->get_where('dbadmin', array('id' => $user_id));
        return $query->row_array();
    } public function getProfilDataByEmail($email) {
		
        $this->db->where('email', $email);
        $query = $this->db->get('dbstaf'); // Ganti 'dbstaf' dengan nama tabel profil staf
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data profil sebagai array asosiatif
        } else{
				$query = $this->db->get('dbpenumum'); // Ganti 'dbpenumum' dengan nama tabel profil umum
				if ($query->num_rows() > 0) {
					return $query->row_array(); // Mengembalikan data profil sebagai array asosiatif
				} else {
					$query = $this->db->get('dbadmin'); // Ganti 'dbadmin' dengan nama tabel profil admin
					if ($query->num_rows() > 0) {
						return $query->row_array(); // Mengembalikan data profil sebagai array asosiatif
					} else {
						return null; // Jika tidak ditemukan data profil
					}
				}
			
        }
    }
}
 