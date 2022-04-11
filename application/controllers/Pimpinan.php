<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Surat_masuk_model');
        $this->load->model('Relasi_model');
        // is_logged_in();
    }

    public function index()
    {
        is_logged_in();
        $data = [
            'title' => 'Pimpinan | Surat Masuk',
            'surat_masuk' => $this->Surat_masuk_model->bacaSurat(),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('pimpinan/index', $data);
        $this->load->view('layouts/footer');
    }
    public function detail($id)
    {
        is_logged_in();
        $data = [
            'title' => 'Pimpinan | Disposisi Surat',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('pimpinan/detail');
        $this->load->view('layouts/footer');
    }

    public function disposisiulang($id)
    {
        $data = [
            'title' => 'Pimpinan | Disposisi Ulang Surat',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $data2 = [
            'didisposisi' => 'N',
        ];
        $this->db->where('id', $id);
        $this->db->update('surat_masuk', $data2);
        $this->load->view('layouts/header', $data);
        $this->load->view('pimpinan/detail');
        $this->load->view('layouts/footer');

        $this->db->delete('disposisi', ['id_surat_masuk' => $id, 'diteruskan_oleh' => 'Pimpinan']);
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
                'tindak_lanjut' => $this->input->post('tindak_lanjut'),
                'catatan' => $catatan,
                'tanda_tangan' => $file2,
                'tanggal_dikirim' => $date,
                'tanggal_dibaca' => '-',
                'catatan_bidang' => '-',
                'diteruskan_oleh' => 'Pimpinan',
            ];
            $this->db->insert('disposisi', $data);
            $data2 = [
                'didisposisi' => 'Y',
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('surat_masuk', $data2);
            $this->session->set_flashdata('flash', 'diteruskan');
        }
        redirect('pimpinan/riwayat');
    }

    public function riwayat()
    {
        is_logged_in();
        $data = [
            'title' => 'Pimpinan | Riwayat Disposisi',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'riwayat_surat' => $this->Relasi_model->RiwayatDisposisi(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('pimpinan/riwayat', $data);
        $this->load->view('layouts/footer');
    }

    public function limpahkan()
    {
        $data = [
            'didisposisi' => '?',
        ];
        $this->session->set_flashdata('flash', 'dilimpahkan ke sekertaris');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_masuk', $data);
        redirect('pimpinan/index');
    }

    // App
    public function tambahDataFromApp()
    {
        $this->load->helper('push_notification');
        $users = $this->db->get('user')->result_array();
        $roles = $this->db->get('roles')->result_array();

        $nameTTD = '-';
        $nameCatatan = '-';
        $folder = 'upload/';
        $folder2 = 'upload/catatan/';
        // $name = $this->input->post('tanda_tangan');
        $time = date('Y-m-d-h-i-s');
        $data = array();
        $rawRole = $this->input->post('diteruskan_kepada'); // role ini kaya gini: 1,3,6,7
        $arrRole = explode(',', $rawRole); // nanti dipecah

        // proses gambar tanda tangan
        if ($this->input->post('image_ttd') != '-') {
            $image = $this->input->post('image_ttd');
            $imageDecode = base64_decode($image);

            $file = $folder . uniqid() . '.png';
            $nameTTD = $file;
            file_put_contents($file, $imageDecode);
        }

        if ($this->input->post('image_catatan') != '-') {
            $image = $this->input->post('image_catatan');
            $imageDecode = base64_decode($image);

            $file = $folder2 . uniqid() . '.png';
            $nameCatatan = $file;
            file_put_contents($file, $imageDecode);
        } else {
            $nameCatatan = $this->input->post('catatan', true);
        }

        $data = [
            'id_surat_masuk' => $this->input->post('id_surat_masuk', true),
            'diteruskan_kepada' => '-',
            'tanda_tangan' => $nameTTD,
            'tindak_lanjut' => $this->input->post('tindak_lanjut', true),
            'catatan' => $nameCatatan,
            // 'catatan' => $this->input->post('catatan', true),
            'tanggal_dikirim' => $time,
            'diteruskan_oleh' => $this->input->post('diteruskan_oleh', true),
            'tanggal_dibaca' => '-',
            'catatan_bidang' => $this->input->post('catatan_bidang', true),
            'dibaca' => 'N'
        ];

        if (count($arrRole) > 1) {
            for ($i = 0; $i < count($arrRole); $i++) {
                for ($j = 0; $j < count($roles); $j++) {
                    if ($roles[$j]['role_id'] == $arrRole[$i]) {
                        $data['diteruskan_kepada'] = $roles[$j]['nama_role'];
                        $this->db->insert('disposisi', $data);
                    }
                }
            }
        } else if (count($arrRole) == 1) {
            for ($i = 0; $i < count($roles); $i++) {
                if ($roles[$i]['role_id'] == $arrRole[0]) {
                    $data['diteruskan_kepada'] = $roles[$i]['nama_role'];
                    $this->db->insert('disposisi', $data);
                    break;
                }
            }
        }

        $surat = $this->db->get_where('surat_masuk', ['id' => $data['id_surat_masuk']])->row_array();

        foreach ($users as $user) {
            for ($i = 0; $i < count($arrRole); $i++) {
                if ($user['role_id'] == $arrRole[$i]) {
                    sendPush($user['fcm_token'], 'Surat baru diterima', 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', 'Diterima dari Pimpinan', 'disposisi', $this->db->insert_id());
                }
            }
        }

        echo 'berhasil';
    }

    public function perbaruiDisposisi()
    {
        $post_id = $this->input->post('id_disposisi');
        $post_catatan = $this->input->post('catatan_bidang');
        $post_readat = $this->input->post('read_at');
        $post_isread = $this->input->post('is_read');

        if ($post_isread != null) {
            $this->db->set('tanggal_dibaca', $post_readat);
            $this->db->set('dibaca', $post_isread);
        } else if ($post_catatan != null) {
            $this->db->set('catatan_bidang', $post_catatan);
        }
        $this->db->where('id_disposisi', $post_id);
        $this->db->update('disposisi');

        echo json_encode('berhasil');
    }

    public function cariAtauTambah()
    {
        $data = array();
        $user = $this->input->post('id_user');
        $disposisi = $this->input->post('id_disposisi');

        $array = array('id_user' => $user, 'id_disposisi' => $disposisi);
        $cek = $this->db->get_where('disposisi_dibaca', $array)->row_array();

        if ($cek == null) {
            $data['id_user'] = $user;
            $data['id_disposisi'] = $disposisi;

            $this->db->insert('disposisi_dibaca', $data);

            $id = $this->db->insert_id();
            $query = $this->db->get_where('disposisi_dibaca', array('id' => $id))->row_array();

            echo json_encode($query);
        } else {
            echo json_encode($cek);
        }
    }
}
