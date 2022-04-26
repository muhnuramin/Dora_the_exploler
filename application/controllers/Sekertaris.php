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
        is_logged_in();
        $data = [
            'title' => 'Sekretaris | Surat Masuk',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk2' => $this->Relasi_model->joinDisposisiSekertaris(),
            'surat_masuk' => $this->Surat_masuk_model->bacaSuratSekertaris(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/index', $data);
        $this->load->view('layouts/footer');
    }
    public function suratlain()
    {
        is_logged_in();
        $data = [
            'title' => 'Sekretaris | Surat Masuk Lain',
            'surat_masuk' => $this->Surat_masuk_model->bacaSurat(),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/suratlain', $data);
        $this->load->view('layouts/footer');
    }
    public function detaillain($id)
    {
        is_logged_in();
        $data = [
            'title' => 'Sekretaris | Disposisi Surat Lain',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/detail2');
        $this->load->view('layouts/footer');
    }
    public function detail()
    {
        $id_disposisi = $this->input->post('id_disposisi');
        $date = date('Y-m-d-h-i-s');
        $data = [
            'title' => 'Sekretaris | Disposisi Surat',
            'surat_masuk' => $this->Relasi_model->SuratMasukSekertarisbyId($id_disposisi),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $data2 = [
            'tanggal_dibaca' => $date,
        ];
        $this->db->where('id_disposisi', $this->input->post('id_disposisi'));
        $this->db->update('disposisi', $data2);
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/detail', $data);
        $this->load->view('layouts/footer');
    }
    public function detail2($id)
    {
        is_logged_in();
        $data = [
            'title' => 'Sekertaris | Disposisi Surat',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/detail2');
        $this->load->view('layouts/footer');
    }

    public function disposisiulang($id)
    {
        $data = [
            'title' => 'Sekretaris | Disposisi Ulang Surat',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $data2 = [
            'didisposisi' => '?',
        ];
        $this->db->where('id', $id);
        $this->db->update('surat_masuk', $data2);
        $this->load->view('layouts/header', $data);
        $this->load->view('sekertaris/detail2');
        $this->load->view('layouts/footer');

        $this->db->delete('disposisi', ['id_surat_masuk' => $id, 'diteruskan_oleh' => 'Sekretaris']);
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

        $folderPath = "upload/catatan/";
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
                'catatan' => $catatan,
                'tanda_tangan' => $file2,
                'tanggal_dikirim' => $date,
                'tanggal_dibaca' => '-',
                'catatan_bidang' => '-',
                'diteruskan_oleh' => 'Sekretaris',
            ];
            $this->db->insert('disposisi', $data);
            $data2 = [
                'didisposisi' => 'Y',
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('surat_masuk', $data2);
            $this->session->set_flashdata('flash', 'diteruskan');
        }
        redirect(base_url('sekertaris/riwayat'));
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
    public function print($id)
    {
        $data = [
            'surat_masuk' => $this->Relasi_model->SuratMasukbyId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('sekertaris/print', $data);
    }
}
