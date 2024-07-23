<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    public function get_account() {
        $query = $this->db->get('account');
        return $query->result_array();
    }

    public function get_account_by_username($username) {
        $query = $this->db->get_where('account', array('username' => $username));
        return $query->row_array();
    }

    public function create_account($data) {
        return $this->db->insert('account', $data);
    }

    public function update_account($username, $data) {
        $this->db->where('username', $username);
        return $this->db->update('account', $data);
    }

    public function delete_account($username) {
        $this->db->where('username', $username);
        return $this->db->delete('account');
    }

    public function authenticate($username, $password) {
        $query = $this->db->get_where('account', array('username' => $username));
        $account = $query->row_array();
        if ($account && password_verify($password, $account['password'])) {
            return $account;
        }
        return false;
    }
}

?>