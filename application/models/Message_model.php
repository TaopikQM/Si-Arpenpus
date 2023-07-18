<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function saveMessage($sender, $text) {
        $data = array(
            'sender' => $sender,
            'message' => $text,
            'timestamp' => date('Y-m-d H:i:s')
        );
        $this->db->insert('messages', $data);
    }

    public function getMessages() {
        $this->db->order_by('timestamp', 'ASC');
        return $this->db->get('messages')->result();
    }

}
