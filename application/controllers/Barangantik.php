<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangantik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Barangantik_model');
        $this->load->model('Jenisbarang_model');
        $this->load->model('Pemilik_model');
    }

public function index() {
    $q = $this->input->get('q', true);
    if ($q) {
        $this->db->like('barang_antik.nama_barang', $q);
        $this->db->or_like('jenis_barang.nama_jenis', $q);
        $this->db->or_like('pemilik.nama_pemilik', $q);
        $this->db->join('jenis_barang', 'jenis_barang.id_jenis = barang_antik.jenis_barang_id');
        $this->db->join('pemilik', 'pemilik.id_pemilik = barang_antik.pemilik_id');
        $data['barangantik'] = $this->db->get('barang_antik')->result_array();
    } else {
        $data['barangantik'] = $this->Barangantik_model->getAllBarangAntik();
    }
    $this->load->view('layout/template', [
        'content' => $this->load->view('barangantik/index', $data, true)
    ]);
}
    public function create() {
        $data['jenis'] = $this->Jenisbarang_model->getAll();
        $data['pemilik'] = $this->Pemilik_model->getAll();
        $this->load->view('layout/template', [
            'content' => $this->load->view('barangantik/create', $data, true)
        ]);
    }

    public function store() {
        $data = [
            'nama_barang'      => $this->input->post('nama_barang'),
            'tahun_pembuatan'  => $this->input->post('tahun_pembuatan'),
            'nilai_estimasi'   => $this->input->post('nilai_estimasi'),
            'jenis_barang_id'  => $this->input->post('jenis_barang_id'),
            'pemilik_id'       => $this->input->post('pemilik_id'),
            'status_perawatan' => $this->input->post('status_perawatan')
        ];
        $this->Barangantik_model->insert($data);
        redirect('barangantik');
    }

    public function edit($id) {
        $data['barang'] = $this->Barangantik_model->getById($id);
        $data['jenis'] = $this->Jenisbarang_model->getAll();
        $data['pemilik'] = $this->Pemilik_model->getAll();
        $this->load->view('layout/template', [
            'content' => $this->load->view('barangantik/edit', $data, true)
        ]);
    }

    public function update($id) {
        $old = $this->Barangantik_model->getById($id);

        $data = [
            'nama_barang'      => $this->input->post('nama_barang'),
            'tahun_pembuatan'  => $this->input->post('tahun_pembuatan'),
            'nilai_estimasi'   => $this->input->post('nilai_estimasi'),
            'jenis_barang_id'  => $this->input->post('jenis_barang_id'),
            'pemilik_id'       => $this->input->post('pemilik_id'),
            'status_perawatan' => $this->input->post('status_perawatan')
        ];

        // Log perubahan
        foreach($data as $key => $value) {
            if(isset($old[$key]) && $old[$key] != $value) {
                $this->Barangantik_model->insertLog($id, $key, $old[$key], $value);
            }
        }

        $this->Barangantik_model->update($id, $data);
        redirect('barangantik');
    }

    public function detail($id) {
        $barang = $this->Barangantik_model->getById($id);
        // Gabungkan info jenis & pemilik (jika getById belum join)
        $barang['nama_jenis'] = $this->Jenisbarang_model->getById($barang['jenis_barang_id'])['nama_jenis'];
        $barang['nama_pemilik'] = $this->Pemilik_model->getById($barang['pemilik_id'])['nama_pemilik'];
        $barang['riwayat_perawatan'] = $this->Barangantik_model->getRiwayatPerawatan($id);

        $log = $this->Barangantik_model->getLogByBarang($id);

        $this->load->view('layout/template', [
            'content' => $this->load->view('barangantik/detail', [
                'barang' => $barang,
                'log'    => $log
            ], true)
        ]);
    }

    public function tambah_perawatan($id) {
        // Proses tambah riwayat perawatan
        $this->Barangantik_model->insertPerawatan([
            'barang_id' => $id,
            'tanggal'   => $this->input->post('tanggal'),
            'catatan'   => $this->input->post('catatan')
        ]);
        // Ubah status ke "Terawat" setelah perawatan dilakukan
        $this->Barangantik_model->update($id, ['status_perawatan' => 'Terawat']);
        redirect('barangantik/detail/' . $id);
    }

    public function delete($id) {
        $this->Barangantik_model->delete($id);
        redirect('barangantik');
    }
}
