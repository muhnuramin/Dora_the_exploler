<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Relasi_model');
        $this->load->library('session');
        is_logged_in();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar User',
            // 'user' => $this->User_model->getAllUser(),
            'user' => $this->Relasi_model->joinUser(),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->Relasi_model->joinUserId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('user/edit-user', $data);
        $this->load->view('layouts/footer');
    }

    public function editData()
    {
        if ($this->input->post('password1') == null) {
            $data = [
                'name' => $this->input->post('name', true),
                'username' => $this->input->post('username', true),
                'role_id' => $this->input->post('roles', true),
            ];
        } else {
            $data = [
                'name' => $this->input->post('name', true),
                'username' => $this->input->post('username', true),
                'role_id' => $this->input->post('roles', true),
                'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)
            ];
        }

        $this->session->set_flashdata('flash', 'diedit');
        $this->db->where('user_id', $this->input->post('id'));
        $this->db->update('user', $data);
        redirect('user');
    }
    public function delete($id)
    {
        $this->session->set_flashdata('flash', 'dihapus');
        $data = $this->User_model->getUserById($id);
        $this->User_model->delete($data['user_id']);
        redirect('user');
    }
    public function register()
    {
        $data = [
            'title' => 'Registrasi User',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('user/add-user');
        $this->load->view('layouts/footer');
    }
}
