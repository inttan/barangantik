<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangantik_model extends CI_Model {

    public function getAllBarangAntik() {
        $this->db->select('barang_antik.*, jenis_barang.nama_jenis, pemilik.nama_pemilik');
        $this->db->from('barang_antik');
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang_antik.jenis_barang_id');
        $this->db->join('pemilik', 'pemilik.id_pemilik = barang_antik.pemilik_id');
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        return $this->db->insert('barang_antik', $data);
    }

    public function getById($id) {
        return $this->db->get_where('barang_antik', ['id_barang' => $id])->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang_antik', $data);
    }

    public function delete($id) {
        return $this->db->delete('barang_antik', ['id_barang' => $id]);
    }

    // Menyimpan log perubahan data barang
public function insertLog($barang_id, $field, $before, $after) {
    $this->db->insert('log_barang', [
        'barang_id' => $barang_id,
        'field'     => $field,
        'before'    => $before,
        'after'     => $after
    ]);
}

// Mengambil log perubahan untuk 1 barang
public function getLogByBarang($barang_id) {
    return $this->db->order_by('updated_at','DESC')->get_where('log_barang', ['barang_id'=>$barang_id])->result_array();
}

public function getRiwayatPerawatan($barang_id) {
    return $this->db->get_where('perawatan_barang', ['barang_id' => $barang_id])->result_array();
}

public function insertPerawatan($data) {
    return $this->db->insert('perawatan_barang', $data);
}


}
