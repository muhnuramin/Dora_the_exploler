<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekertaris extends CI_Controller
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
            'surat_masuk' => $this->Relasi_model->notifDisposisiSekertaris(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/notif', $data);
        $this->load->view('layouts/footer');
    }
    public function dibaca()
    {
        $data = [
            'title' => 'Sekretaris | Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Relasi_model->joinDisposisiSekertaris(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/index', $data);
        $this->load->view('layouts/footer');
    }
    public function baca()
    {
        $id = $this->input->post('id');
        $date = date('Y-m-d-h-i-s');
        $data2 = [
            'title' => 'Disposisi Surat',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Relasi_model->SuratMasukSekertarisbyId($id),
        ];
        $data = [
            'tanggal_dibaca' => $date,
            'dibaca' => 'Y'
        ];
        $this->db->where('id_disposisi', $this->input->post('id'));
        $this->db->update('disposisi', $data);

        $this->load->view('layouts/header', $data2);
        $this->load->view('sekertaris/detail', $data2);
        $this->load->view('layouts/footer');
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Disposisi Surat',
            'surat_masuk' => $this->Relasi_model->SuratMasukSekertarisbyId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/detail', $data);
        $this->load->view('layouts/footer');
    }
    public function tambahData()
    {
        $date = date('Y-m-d-h-i-s');
        $folderPath2 = "upload/";
        $image_parts2 = explode(";base64,", $_POST['signed']);
        $image_type_aux2 = explode("image/", $image_parts2[0]);
        $image_type = $image_type_aux2[1];
        $image_base642 = base64_decode($image_parts2[1]);
        $file2 = $folderPath2 . uniqid() . '.' . $image_type;
        file_put_contents($file2, $image_base642);

        $folderPath = "catatan/";
        $image_parts = explode(";base64,", $_POST['catatan']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;
        file_put_contents($file, $image_base64);

        $check = $this->input->post('diteruskan');
        if ($this->input->post('perihal') == null || $this->input->post('perihal') == "") {
            $catatan = $file;
        } else {
            $catatan = $this->input->post('perihal');
        }
        foreach ($check as $object) {

            $data = [
                'diteruskan_kepada' => $object,
                'id_surat_masuk' => $this->input->post('id'),
                'tindak_lanjut' => $this->input->post('tindak_lanjut', true),
                // 'catatan' => $this->input->post('perihal', true),
                'catatan' => $catatan,
                'tanda_tangan' => $file2,
                'tanggal_dikirim' => $date,
                'tanggal_dibaca' => '-',
                'catatan_bidang' => '-',
                'diteruskan_oleh' => 'Sekretaris',
                'dibaca' => 'N'
            ];
            $this->session->set_flashdata('flash', 'diteruskan');
            $this->db->insert('disposisi', $data);
        }
        redirect(base_url('sekertaris/dibaca'));
    }
    public function riwayat()
    {
        $data = [
            'title' => 'Sekretaris | Riwayat Disposisi',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'riwayat_surat' => $this->Relasi_model->RiwayatDisposisi(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/riwayat', $data);
        $this->load->view('layouts/footer');
    }
}
