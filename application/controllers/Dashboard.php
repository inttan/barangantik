<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index() {
        $this->load->database();

        // Jumlah jenis barang
        $jumlah_jenis = $this->db->count_all('jenis_barang');

        // Jumlah barang unik (data di barang_antik)
        $jumlah_barang = $this->db->count_all('barang_antik');

        // Total estimasi nilai semua barang
        $total_estimasi = $this->db->select_sum('nilai_estimasi')->get('barang_antik')->row()->nilai_estimasi;

        // Barang termahal
        $barang_termahal = $this->db->order_by('nilai_estimasi','DESC')->limit(1)->get('barang_antik')->row();
        $barang_termahal_nama = $barang_termahal ? $barang_termahal->nama_barang : '-';
        $barang_termahal_harga = $barang_termahal ? $barang_termahal->nilai_estimasi : 0;

        // Rekap per jenis
        $rekap = $this->db->query("
            SELECT
                jenis_barang.nama_jenis,
                COUNT(barang_antik.id_barang) as jumlah_barang,
                SUM(barang_antik.nilai_estimasi) as total_estimasi
            FROM jenis_barang
            LEFT JOIN barang_antik ON barang_antik.jenis_barang_id = jenis_barang.id_jenis
            GROUP BY jenis_barang.id_jenis
        ")->result_array();

        $data = [
            'jumlah_jenis' => $jumlah_jenis,
            'jumlah_barang' => $jumlah_barang,
            'total_estimasi' => $total_estimasi,
            'barang_termahal_nama' => $barang_termahal_nama,
            'barang_termahal_harga' => $barang_termahal_harga,
            'rekap' => $rekap
        ];

        // Load ke template utama
        $this->load->view('layout/template', [
            'content' => $this->load->view('dashboard/index', $data, true)
        ]);
    }
}
