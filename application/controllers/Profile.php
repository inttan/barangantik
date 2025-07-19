<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        // Wajib login
        if(!$this->session->userdata('logged_in')) redirect('auth/login');
    }

    public function index() {
        $id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->getById($id);
        $this->load->view('layout/template', [
            'content' => $this->load->view('profile/index', $data, true)
        ]);
    }

    // Proses update profil (nama/email/dll)
    public function update() {
        $id = $this->session->userdata('user_id');
        $data = [
            'nama'      => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'email'     => $this->input->post('email'),
            'no_telp'   => $this->input->post('no_telp'),
            'alamat'    => $this->input->post('alamat'),
        ];

        // Handle upload foto
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './uploads/foto/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = 'user_' . $id . '_' . time();
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('profile');
            }
        }

        $this->User_model->update($id, $data);
        $this->session->set_flashdata('success', 'Profil berhasil diupdate.');
        redirect('profile');
    }

    // Proses ganti password
    public function update_password() {
        $id = $this->session->userdata('user_id');
        $password = $this->input->post('password');
        if(strlen($password) < 4) {
            $this->session->set_flashdata('error', 'Password minimal 4 karakter');
            redirect('profile');
        }
        $this->User_model->updatePassword($id, $password);
        $this->session->set_flashdata('success', 'Password berhasil diganti.');
        redirect('profile');
    }
}
