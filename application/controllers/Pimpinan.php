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
            'surat_masuk' => $this->Surat_masuk_model->notifSurat(),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('pimpinan/notif', $data);
        $this->load->view('layouts/footer');
    }
    public function dibaca()
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
            'title' => 'Disposisi Surat',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->load->view('layouts/header', $data);
        $this->load->view('pimpinan/detail');
        $this->load->view('layouts/footer');
    }

    public function baca()
    {
        $id = $this->input->post('id');
        $data2 = [
            'title' => 'Disposisi Surat',
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
        ];
        $data = [
            'dibaca' => 'Y'
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_masuk', $data);

        $this->load->view('layouts/header', $data2);
        $this->load->view('pimpinan/detail', $data2);
        $this->load->view('layouts/footer');
    }

    public function tambahData()
    {
        is_logged_in();
        // tambahan
        $this->load->helper('push_notification');
        $users = $this->db->get('user')->result_array();
        $roles = $this->db->get('roles')->result_array();

        $date = date('Y-m-d-h-i-s');
        $folderPath = "upload/";
        $image_parts = explode(";base64,", $_POST['signed']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;
        file_put_contents($file, $image_base64);

        $check = $this->input->post('diteruskan');
        foreach ($check as $object) {

            $data = [
                'diteruskan_kepada' => $object,
                'id_surat_masuk' => $this->input->post('id'),
                'tindak_lanjut' => $this->input->post('tindak_lanjut'),
                'catatan' => $this->input->post('perihal'),
                'tanda_tangan' => $file,
                'tanggal_dikirim' => $date,
                'tanggal_dibaca' => '-',
                'catatan_bidang' => '-',
                'diteruskan_oleh' => 'Pimpinan',
                'dibaca' => 'N'
            ];

            // tambahan
            $surat = $this->db->get_where('surat_masuk', ['id' => $data['id_surat_masuk']])->row_array();

            foreach ($users as $user) {
                for ($i = 0; $i < count($roles); $i++) {
                    if ($user['role_id'] == $roles[$i]['role_id']) {
                        if ($roles[$i]['nama_role'] == $object) {
                            sendPush($user['fcm_token'], 'Surat baru diterima', 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', 'Diterima dari Pimpinan', 'disposisi', $this->db->insert_id());
                            break;
                        }
                    }
                }
            }

            $this->session->set_flashdata('flash', 'diteruskan');
            $this->db->insert('disposisi', $data);
        }
        redirect('Pimpinan');
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
        is_logged_in();
        // tambahan
        $this->load->helper('push_notification');
        $users = $this->db->get('user')->result_array();
        $roles = $this->db->get('roles')->result_array();

        $folderPath = "upload/";
        $image_parts = explode(";base64,", $_POST['signed']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;
        file_put_contents($file, $image_base64);

        $date = date('Y-m-d-h-i-s');
        $data = [
            'diteruskan_kepada' => 'Sekretaris',
            'id_surat_masuk' => $this->input->post('id'),
            'tindak_lanjut' => 'Belum Diproses',
            'catatan' => '',
            'tanda_tangan' => $file,
            'tanggal_dikirim' => $date,
            'tanggal_dibaca' => '-',
            'catatan_bidang' => '-',
            'diteruskan_oleh' => 'Pimpinan',
            'dibaca' => 'N'
        ];

        $this->session->set_flashdata('flash', 'dilimpahkan ke sekretaris');
        $this->db->insert('disposisi', $data);

        // tambahan
        $surat = $this->db->get_where('surat_masuk', ['id' => $data['id_surat_masuk']])->row_array();

        foreach ($users as $user) {
            for ($i = 0; $i < count($roles); $i++) {
                if ($user['role_id'] == $roles[$i]['role_id']) {
                    if ($roles[$i]['nama_role'] == 'Sekretaris') {
                        sendPush($user['fcm_token'], 'Surat baru diterima', 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', 'Diterima dari Pimpinan', 'disposisi', $this->db->insert_id());
                        break;
                    }
                }
            }
        }

        redirect(base_url('Pimpinan'));
    }

    // App
    public function tambahDataFromApp()
    {
        $this->load->helper('push_notification');
        $users = $this->db->get('user')->result_array();
        $roles = $this->db->get('roles')->result_array();

        $name = '-';
        $time = date('Y-m-d-h-i-s');
        $data = array();
        $rawRole = $this->input->post('diteruskan_kepada'); // role ini kaya gini: 1,3,6,7
        $arrRole = explode(',', $rawRole); // nanti dipecah


        if ($this->input->post('image') != '-') {

            $folder = 'upload/';
            $image = $this->input->post('image');
            $name = $this->input->post('filename');

            $realImage = base64_decode($image);

            $file = $folder . uniqid() . '.png';
            $name = $file;
            file_put_contents($file, $realImage);
        }

        $data = [
            'diteruskan_kepada' => '-',
            'id_surat_masuk' => $this->input->post('id_surat_masuk', true),
            'tindak_lanjut' => $this->input->post('tindak_lanjut', true),
            'catatan' => $this->input->post('catatan', true),
            'tanda_tangan' => $name,
            'tanggal_dikirim' => $time,
            'tanggal_dibaca' => '-',
            'catatan_bidang' => '-',
            'diteruskan_oleh' => $this->input->post('diteruskan_oleh', true),
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
