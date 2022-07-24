<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
            'member' => $this->Relasi_model->getAllMember()
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/member/index', $data);
        $this->load->view('layouts/footer');
    }
    public function tambah()
    {
        $data = [
            'title' => 'Surat Masuk',
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/member/tambah', $data);
        $this->load->view('layouts/footer');
    }
    public function tambahData()
    {
        $data = [
            'id_penulis' => $this->input->post('id_penulis', true),
            'nama_member' => $this->input->post('nama_member', true),
            'title_member' => $this->input->post('title_member', true),
            'tanggal_bergabung_member' => $this->input->post('tanggal_bergabung_member', true),
            'deskripsi_member' => $this->input->post('deskripsi_member', true),
            'nomor_ktp_member' => $this->input->post('nomor_ktp_member', true),
            'foto_ktp_member' => $this->input->post('foto_ktp_member', true),
            'nomor_rekening_member' => $this->input->post('nomor_rekening_member', true),
            'bank_rekening_member' => $this->input->post('bank_rekening_member', true),
            'atasnama_rekening_member' => $this->input->post('atasnama_rekening_member', true),
            'nomor_telp_member' => $this->input->post('nomor_telp_member', true),
            'email_member' => $this->input->post('email_member', true),
            'member_password' => $this->input->post('member_password', true),
            'member_view_password' => $this->input->post('member_view_password', true),
            'kota_member' => $this->input->post('kota_member', true),
            'tanggal_lahir_member' => $this->input->post('tanggal_lahir_member', true),
            'pekerjaan_member' => $this->input->post('pekerjaan_member', true),
            'jenis_kelamin_member' => $this->input->post('jenis_kelamin_member', true),
            'status_aktif_member' => $this->input->post('status_aktif_member', true),
        ];
        $this->session->set_flashdata('flash', 'ditambahkan');
        $this->db->insert('membership', $data);
        redirect('membership');
    }
    public function edit()
    {
        $data = [
            'title' => 'Surat Masuk',
            'member' => $this->Relasi_model->getAllMember()
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/member/edit', $data);
        $this->load->view('layouts/footer');
    }
    public function delete($id_member)
    {
        $data = $this->Relasi_model->getMemberById($id_member);
        $this->Relasi_model->deleteMember($data['id_member']);
        redirect('member');
    }
}
