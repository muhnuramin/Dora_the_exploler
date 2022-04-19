<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Surat_masuk_model');
        $this->load->model('Roles_model');
        $this->load->model('Disposisi_model');
        $this->load->library('session');
        // is_logged_in();
    }
    public function index()
    {
        is_logged_in();
        //$data['surat_masuk'] = $this->Surat_masuk_model->getAllSurat();
        $data = [
            'title' => 'Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Surat_masuk_model->getAllSurat()
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/surat-masuk/index', $data);
        $this->load->view('layouts/footer');
    }

    public function form()
    {
        is_logged_in();
        $data = [
            'title' => 'Form Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('admin/surat-masuk/form');
        $this->load->view('layouts/footer');
    }

    public function tambahData()
    {
        $this->load->helper('push_notification');
        is_logged_in();

        $data['surat'] = '';
        $surat = $_FILES['surat']['name'];

        $config['upload_path'] = './data';
        $config['allowed_types'] = 'pdf';
        //$config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('surat')) {
            echo 'gagal';
        } else {
            $surat = $this->upload->data('file_name');
            $data = [
                "asal_surat" => $this->input->post('asal_surat', true),
                "nomor_surat" => $this->input->post('nomor_surat', true),
                "nomor_agenda" => $this->input->post('nomor_agenda', true),
                "tanggal_surat" => $this->input->post('tanggal_surat', true),
                "tanggal_diterima" => $this->input->post('tanggal_diterima', true),
                "sifat" => $this->input->post('sifat', true),
                "perihal" => $this->input->post('perihal', true),
                "surat" => $surat,
                "didisposisi" => 'N'
            ];
            $this->session->set_flashdata('flash', 'ditambahkan');
        }
        $this->db->insert('surat_masuk', $data);

        $last_id = $this->db->insert_id();

        $users = $this->User_model->getAllUser();
        $roles = $this->db->get('roles')->result_array();

        // dapatkan semua data user
        foreach ($users as $user) {
            foreach ($roles as $role) {
                if ($role['nama_role'] == "Pimpinan") {
                    if ($user['role_id'] == $role['role_id']) {
                        sendPush($user['fcm_token'], 'Surat baru diterima', 'Dari: ' . $data['asal_surat'], '@mipmap/ic_launcher', $data['perihal'], 'surat_masuk', $last_id);
                    }
                }
            }
        }

        redirect('home');
    }

    public function delete($id)
    {
        is_logged_in();
        $this->session->set_flashdata('flash', 'dihapus');
        $data = $this->Surat_masuk_model->getSuratById($id);
        unlink('data/' . $data['surat']);
        $this->Surat_masuk_model->delete($data['id']);
        redirect('home');
    }

    public function show($id)
    {
        is_logged_in();
        $data = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/surat-masuk/detail', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($id)
    {
        is_logged_in();
        $data = [
            'title' => 'Edit Surat Masuk',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/surat-masuk/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function editData()
    {
        is_logged_in();
        $config['upload_path'] = './data';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('surat')) {
            $surat = $this->input->post('surat_lama', true);
        } else {
            $surat = $_FILES['surat']['name'];
            $surat = $this->upload->data('file_name');
        }

        $data = [
            "asal_surat" => $this->input->post('asal_surat', true),
            "nomor_surat" => $this->input->post('nomor_surat', true),
            "nomor_agenda" => $this->input->post('nomor_agenda', true),
            "tanggal_surat" => $this->input->post('tanggal_surat', true),
            "tanggal_diterima" => $this->input->post('tanggal_diterima', true),
            "sifat" => $this->input->post('sifat', true),
            "perihal" => $this->input->post('perihal', true),
            "surat" => $surat,
        ];
        $this->session->set_flashdata('flash', 'diedit');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_masuk', $data);
        redirect('home');
    }

    // App

    public function getSuratMasukJson()
    {
        echo json_encode($this->Surat_masuk_model->getAllSurat());
    }

    public function getSuratMasukById()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Surat_masuk_model->getSuratById($id));
    }

    public function getRolesJson()
    {
        echo json_encode($this->Roles_model->jsonGetRoles());
    }

    // disposisi

    public function getDisposisiSurat()
    {
        $surat_id = $this->input->post('surat_id');
        echo json_encode($this->Disposisi_model->getSurat($surat_id));
    }

    public function riwayatSuratDisposisi()
    {
        $user = $this->input->post('user');
        echo json_encode($this->Disposisi_model->riwayatSuratDisposisi($user));
    }

    public function suratDisposisiById()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Disposisi_model->suratDisposisiById($id));
    }

    public function suratDisposisiByUser()
    {
        $user = $this->input->post('user');
        echo json_encode($this->Disposisi_model->suratDisposisiByUser($user));
    }
}
