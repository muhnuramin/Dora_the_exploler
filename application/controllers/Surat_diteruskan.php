<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_diteruskan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Relasi_model');
        $this->load->model('Surat_diteruskan_model');
        is_logged_in();
    }
    public function index()
    {
        $data = [
            'title' => 'Surat Masuk',
            'surat_diteruskan' => $this->Relasi_model->RiwayatDisposisi(),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/surat-diteruskan/index');
        $this->load->view('layouts/footer');
    }

    public function print($id)
    {
        $data = [
            'surat_masuk' => $this->Relasi_model->SuratMasukbyId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('admin/print', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Relasi_model->SuratMasukbyId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/surat-diteruskan/detail');
        $this->load->view('layouts/footer');
    }
}
