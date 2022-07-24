<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Relasi_model');
        $this->load->library('session');
        // is_logged_in();
    }
    public function index()
    {
        is_logged_in();

        $data = [
            'title' => 'Surat Masuk',
            'berita' => $this->Relasi_model->getAllBerita()
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/berita/index', $data);
        $this->load->view('layouts/footer');
    }
    public function tambah()
    {
        is_logged_in();

        $data = [
            'title' => 'Surat Masuk',
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/berita/tambah', $data);
        $this->load->view('layouts/footer');
    }
    public function tambahData()
    {
        is_logged_in();

        $data = [
            'berita_judul' => $this->input->post('berita_judul', true),
            'berita_tgl' => $this->input->post('berita_tgl', true),
            'berita_foto' => $this->input->post('berita_foto', true),
            'penulis_id' => $this->input->post('penulis_id', true),
            'berita_deskripsi' => $this->input->post('berita_deskripsi', true),
            'berita_autor' => $this->input->post('berita_autor', true),
            'berita_tag' => $this->input->post('berita_tag', true),
            'status_aktif_berita' => $this->input->post('status_aktif_berita', true),
        ];
        $this->session->set_flashdata('flash', 'ditambahkan');
        $this->db->insert('berita', $data);
        redirect('Home');
    }
    public function edit($berita_id)
    {
        is_logged_in();

        $data = [
            'title' => 'Surat Masuk',
            'berita' => $this->Relasi_model->getBeritaById($berita_id)
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/berita/edit', $data);
        $this->load->view('layouts/footer');
    }
    public function editData()
    {
        is_logged_in();

        $data = [
            'berita_judul' => $this->input->post('berita_judul', true),
            'berita_tgl' => $this->input->post('berita_tgl', true),
            'berita_foto' => $this->input->post('berita_foto', true),
            'penulis_id' => $this->input->post('penulis_id', true),
            'berita_deskripsi' => $this->input->post('berita_deskripsi', true),
            'berita_autor' => $this->input->post('berita_autor', true),
            'berita_tag' => $this->input->post('berita_tag', true),
            'status_aktif_berita' => $this->input->post('status_aktif_berita', true),
        ];
        $this->session->set_flashdata('flash', 'diedit');
        $this->db->where('berita_id', $this->input->post('berita_id'));
        $this->db->insert('berita', $data);
        redirect('Home');
    }
    public function delete($berita_id)
    {
        $data = $this->Relasi_model->getBeritaById($berita_id);
        $this->Relasi_model->deleteBerita($data['berita_id']);
        // redirect('home');
        // var_dump($data);
    }
}
