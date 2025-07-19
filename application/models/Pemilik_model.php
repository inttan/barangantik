<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik_model extends CI_Model {

    public function getAll() {
        return $this->db->get('pemilik')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('pemilik', $data);
    }

    public function getById($id) {
        return $this->db->get_where('pemilik', ['id_pemilik' => $id])->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id_pemilik', $id);
        return $this->db->update('pemilik', $data);
    }

    public function delete($id) {
        return $this->db->delete('pemilik', ['id_pemilik' => $id]);
    }

    
}
