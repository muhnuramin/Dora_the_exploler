<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang3 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Relasi_model');
        is_logged_in();
    }
    public function index()
    {
        $data = [
            'title' => 'Bid. Pemerintahan dan Pembangunan Manusia | Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Relasi_model->NotifMasukB2(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('Bidang/notif/notif3', $data);
        $this->load->view('layouts/footer');
    }
    public function dibaca()
    {
        $data = [
            'title' => 'Bid. Infrastruktur dan Kewilayahan | Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Relasi_model->SuratMasukB2(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('Bidang/bidang3', $data);
        $this->load->view('layouts/footer');
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Relasi_model->SuratMasukB2byId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('Bidang/detail3', $data);
        $this->load->view('layouts/footer');
    }
    public function print($id)
    {
        $data = [
            'surat_masuk' => $this->Relasi_model->SuratMasukB2byId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('Bidang/print/print3', $data);
    }
    public function editbaca()
    {
        $id = $this->input->post('id');
        $date = date('Y-m-d-h-i-s');
        $data2 = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Relasi_model->SuratMasukB2byId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $data = [
            'tanggal_dibaca' => $date,
            'dibaca' => 'Y'
        ];
        $this->db->where('id_disposisi', $this->input->post('id'));
        $this->db->update('disposisi', $data);

        $this->load->view('layouts/header', $data2);
        $this->load->view('Bidang/detail/detail3', $data2);
        $this->load->view('layouts/footer');
    }
    public function catatan()
    {
        $data = [
            'catatan_bidang' => $this->input->post('catatan_bidang', true)
        ];
        $this->session->set_flashdata('flash', 'diinput');
        $this->db->where('id_disposisi', $this->input->post('id'));
        $this->db->update('disposisi', $data);
        redirect('Bidang3');
    }
}
