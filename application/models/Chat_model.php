<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {
    
    public function insertMessage($data) {
        $this->db->insert('chat', $data);
        return $this->db->insert_id();
    }
    
    public function getMessagesByReceiverId($receiverId) {
        $this->db->where('receiver_id', $receiverId);
        $this->db->order_by('timestamp', 'asc');
        return $this->db->get('chat')->result();
    }
    
    public function getMessagesBySenderId($senderId) {
        $this->db->where('sender_id', $senderId);
        $this->db->order_by('timestamp', 'asc');
        return $this->db->get('chat')->result();
    }
    
    public function getAllMessages() {
        $query = $this->db->get('chat'); // Mengambil semua data dari tabel 'messages'
        return $query->result(); // Mengembalikan hasil query dalam bentuk array objek
    }

    public function getUserNameById($userId) {
        $loggedInUserId = $this->session->userdata('user_id');
        
        if ($userId == $loggedInUserId) {
            return $this->session->userdata('nama');
        } else {
            $this->db->select('nama');
            $this->db->from('dbstaf');
            $this->db->where('id', $userId);
            $query = $this->db->get();
            $result = $query->row();
    
            if ($result) {
                return $result->nama;
            } else {
                return false;
            }
        }
    }
	public function deleteChat($id) {
        $this->db->where('id', $id);
        $hasil = $this->db->delete('chat');
        return $hasil;
    }
	public function saaveMessage($sender, $text)
    {
        $data = array(
            'sender' => $sender,
            'text' => $text
        );

        // Simpan pesan ke dalam tabel database yang sesuai
        $this->db->insert('messages', $data);
    }
	public function saveMessage($sender, $text) {
        $data = array(
            'sender_id' => $sender,
            'message' => $text,
            'timestamp' => date('Y-m-d H:i:s')
        );
        $this->db->insert('messages', $data);
    }

    public function getMessages() {
        return $this->db->get('messages')->result();
    }
    
}

?>
