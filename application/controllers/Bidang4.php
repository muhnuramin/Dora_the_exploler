<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang4 extends CI_Controller
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
            'title' => 'Bid. Infrastruktur dan Kewilayahan | Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Relasi_model->SuratMasukB3(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('bidang/bidang4', $data);
        $this->load->view('layouts/footer');
    }
    public function detail()
    {
        $id_disposisi = $this->input->post('id_disposisi');
        $date = date('Y-m-d-h-i-s');
        $data = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Relasi_model->SuratMasukB3byId($id_disposisi),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $data2 = [
            'tanggal_dibaca' => $date,
        ];
        $this->db->where('id_disposisi', $this->input->post('id_disposisi'));
        $this->db->update('disposisi', $data2);
        $this->load->view('layouts/header', $data);
        $this->load->view('bidang/detail/detail4', $data);
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
    public function editbaca()
    {
        $id = $this->input->post('id');
        $date = date('Y-m-d-h-i-s');
        $data2 = [
            'title' => 'Detail Surat Masuk',
            'surat_masuk' => $this->Relasi_model->SuratMasukB3byId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $data = [
            'tanggal_dibaca' => $date,
            'dibaca' => 'Y'
        ];
        $this->db->where('id_disposisi', $this->input->post('id'));
        $this->db->update('disposisi', $data);

        $this->load->view('layouts/header', $data2);
        $this->load->view('bidang/detail/detail4', $data2);
        $this->load->view('layouts/footer');
    }
    public function catatan()
    {
        $folderPath = "upload/catatan/";
        $image_parts = explode(";base64,", $_POST['catatan']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;
        file_put_contents($file, $image_base64);

        if ($this->input->post('catatan_bidang') == null || $this->input->post('catatan_bidang') == "") {
            $catatan = $file;
        } else {
            $catatan = $this->input->post('catatan_bidang');
        }
        $data = [
            'catatan_bidang' => $catatan
        ];
        $this->session->set_flashdata('flash', 'diinput');
        $this->db->where('id_disposisi', $this->input->post('id'));
        $this->db->update('disposisi', $data);
        redirect('bidang4/index');
    }
}
