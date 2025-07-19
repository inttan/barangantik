<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pemilik_model');
    }

public function index() {
    $q = $this->input->get('q', true);
    if ($q) {
        $this->db->like('nama_pemilik', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('kontak', $q);
        $data['pemilik'] = $this->db->get('pemilik')->result_array();
    } else {
        $data['pemilik'] = $this->Pemilik_model->getAll();
    }
    $this->load->view('layout/template', [
        'content' => $this->load->view('pemilik/index', $data, true)
    ]);
}


    public function create() {
        $this->load->view('layout/template', [
            'content' => $this->load->view('pemilik/create', [], true)
        ]);
    }

    public function store() {
        $this->Pemilik_model->insert([
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'alamat'       => $this->input->post('alamat'),
            'kontak'       => $this->input->post('kontak')
        ]);
        redirect('pemilik');
    }

    public function edit($id) {
        $data['pemilik'] = $this->Pemilik_model->getById($id);
        $this->load->view('layout/template', [
            'content' => $this->load->view('pemilik/edit', $data, true)
        ]);
    }

    public function update($id) {
        $this->Pemilik_model->update($id, [
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'alamat'       => $this->input->post('alamat'),
            'kontak'       => $this->input->post('kontak')
        ]);
        redirect('pemilik');
    }

    public function delete($id) {
        $this->Pemilik_model->delete($id);
        redirect('pemilik');
    }
}
