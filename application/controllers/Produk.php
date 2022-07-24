<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
            'produk' => $this->Relasi_model->getAlloleholeh()
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/oleholeh/index', $data);
        $this->load->view('layouts/footer');
    }
    public function tambah()
    {
        is_logged_in();

        $data = [
            'title' => 'Surat Masuk',
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/oleholeh/tambah', $data);
        $this->load->view('layouts/footer');
    }
    public function tambahData()
    {
        is_logged_in();

        $data = [
            'id_kategori_produk' => $this->input->post('id_kategori_produk', true),
            'id_produsen' => $this->input->post('id_produsen', true),
            'nama_provinsi' => $this->input->post('nama_provinsi', true),
            'nama_kota' => $this->input->post('nama_kota', true),
            'nama_produk' => $this->input->post('nama_produk', true),
            'tag_produk' => $this->input->post('tag_produk', true),
            'deskripsi_produk' => $this->input->post('deskripsi_produk', true),
            'slug_produk' => $this->input->post('slug_produk', true),
            'produk_tampil' => $this->input->post('produk_tampil', true),
            'status_aktif_produk' => $this->input->post('status_aktif_produk', true),
        ];
        $this->session->set_flashdata('flash', 'ditambahkan');
        $this->db->insert('produk', $data);
        redirect('produk');
    }
    public function edit($id_produk)
    {
        is_logged_in();

        $data = [
            'title' => 'Surat Masuk',
            'produk' => $this->Relasi_model->getOleholehById($id_produk)
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/oleholeh/edit', $data);
        $this->load->view('layouts/footer');
    }
    public function editData()
    {
        is_logged_in();

        $data = [
            'id_kategori_produk' => $this->input->post('id_kategori_produk', true),
            'id_produsen' => $this->input->post('id_produsen', true),
            'nama_provinsi' => $this->input->post('nama_provinsi', true),
            'nama_kota' => $this->input->post('nama_kota', true),
            'nama_produk' => $this->input->post('nama_produk', true),
            'tag_produk' => $this->input->post('tag_produk', true),
            'deskripsi_produk' => $this->input->post('deskripsi_produk', true),
            'slug_produk' => $this->input->post('slug_produk', true),
            'produk_tampil' => $this->input->post('produk_tampil', true),
            'status_aktif_produk' => $this->input->post('status_aktif_produk', true),
        ];
        $this->session->set_flashdata('flash', 'diedit');
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->insert('produk', $data);
        redirect('produk');
    }
    public function delete($id_produk)
    {
        $data = $this->Relasi_model->getOleholehById($id_produk);
        $this->Relasi_model->deleteOleholeh($data['id_produk']);
        redirect('produk');
    }
}
