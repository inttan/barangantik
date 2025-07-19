<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisbarang_model extends CI_Model {

    public function getAll() {
        return $this->db->get('jenis_barang')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('jenis_barang', $data);
    }

    public function getById($id) {
        return $this->db->get_where('jenis_barang', ['id_jenis' => $id])->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id_jenis', $id);
        return $this->db->update('jenis_barang', $data);
    }

    public function delete($id) {
        return $this->db->delete('jenis_barang', ['id_jenis' => $id]);
    }
}
