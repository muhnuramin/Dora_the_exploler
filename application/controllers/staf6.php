<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staf6 extends CI_Controller
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
            'title' => 'Sekretaris | Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk2' => $this->Relasi_model->joinDisposisiSekertaris(),
            'surat_masuk' => $this->Surat_masuk_model->bacaSuratSekertaris(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('staf/sekretaris', $data);
        $this->load->view('layouts/footer');
    }
    public function detail()
    {
        $id_disposisi = $this->input->post('id_disposisi');
        $data = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Relasi_model->SuratMasukSekertarisbyId($id_disposisi),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('staf/detail/detail6', $data);
        $this->load->view('layouts/footer');
    }
    public function detail2($id)
    {
        $data = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        //$data['surat_masuk'] = $this->Surat_masuk_model->getSuratById($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('staf/detail/detail61', $data);
        $this->load->view('layouts/footer');
    }
    public function print($id)
    {
        $data = [
            'surat_masuk' => $this->Relasi_model->SuratMasukSekertarisbyId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('staf/print/print6', $data);
    }
}
