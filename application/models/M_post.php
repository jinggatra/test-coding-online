<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_post extends CI_Model{
    public function __construct() {
        $this->load->database();
    }

    public function get_post(){
        $this->db->select('post.*, account.name');
        $this->db->from('post');
        $this->db->join('account','post.username = account.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_post_by_id($id) {
        $query = $this->db->get_where('post', array('idpost' => $id));
        return $query->row_array();
    }

    public function create_post($data) {
        return $this->db->insert('post', $data);
    }

    public function update_post($id, $data) {
        $this->db->where('idpost', $id);
        return $this->db->update('post', $data);
    }

    public function delete_post($id) {
        $this->db->where('idpost', $id);
        return $this->db->delete('post');
    }

}
?>