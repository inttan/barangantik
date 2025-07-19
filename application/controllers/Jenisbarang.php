<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisbarang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jenisbarang_model');
    }

    public function index() {
            $q = $this->input->get('q', true);
    if ($q) {
        $this->db->like('nama_jenis', $q);
    }
        $data['jenis'] = $this->Jenisbarang_model->getAll();
        $this->load->view('layout/template', [
            'content' => $this->load->view('jenisbarang/index', $data, true)
        ]);
    }

    public function create() {
        $this->load->view('layout/template', [
            'content' => $this->load->view('jenisbarang/create', [], true)
        ]);
    }

    public function store() {
        $this->Jenisbarang_model->insert(['nama_jenis' => $this->input->post('nama_jenis')]);
        redirect('jenisbarang');
    }

    public function edit($id) {
        $data['jenis'] = $this->Jenisbarang_model->getById($id);
        $this->load->view('layout/template', [
            'content' => $this->load->view('jenisbarang/edit', $data, true)
        ]);
    }

    public function update($id) {
        $this->Jenisbarang_model->update($id, ['nama_jenis' => $this->input->post('nama_jenis')]);
        redirect('jenisbarang');
    }

    public function delete($id) {
        $this->Jenisbarang_model->delete($id);
        redirect('jenisbarang');
    }
}
