<?php
class Staf_model extends CI_Model {
	public function view()
  {
    return $this->db->get('datasekolah')->result();
  }
}
