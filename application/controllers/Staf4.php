<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staf4 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Relasi_model');
        $this->load->model('Surat_masuk_model');
        is_logged_in();
    }
    public function index()
    {
        $data = [
            'title' => 'Staf Bid. Infrastruktur dan Kewilayahan | Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Relasi_model->SuratMasukB3(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('staf/bidang4', $data);
        $this->load->view('layouts/footer');
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Relasi_model->SuratMasukB1byId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('staf/detail/detail4', $data);
        $this->load->view('layouts/footer');
    }
    public function print($id)
    {
        $data = [
            'surat_masuk' => $this->Relasi_model->SuratMasukB3byId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('bidang/print/print4', $data);
    }
}
