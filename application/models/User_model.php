<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // gunakan md5, atau ganti dengan password_hash jika mau lebih aman
        return $this->db->get('user')->row_array();
    }

        public function getById($id) {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    // Update profil
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    // Update password
    public function updatePassword($id, $password) {
        $this->db->where('id', $id);
        return $this->db->update('user', ['password' => password_hash($password, PASSWORD_DEFAULT)]);
    }
}
