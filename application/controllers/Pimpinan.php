<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
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
        is_logged_in();
        $data = [
            'title' => 'Pimpinan | Disposisi Ulang Surat',
            'surat_masuk' => $this->Surat_masuk_model->getSuratById($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        // $data2 = [
        //     'didisposisi' => 'N',
        // ];
        // $this->db->where('id', $id);
        // $this->db->update('surat_masuk', $data2);
        $this->load->view('layouts/header', $data);
        $this->load->view('pimpinan/detail');
        $this->load->view('layouts/footer');
        $this->db->delete('disposisi', ['id_surat_masuk' => $id]);
    }
    public function tambahData()
    {
        is_logged_in();
        $this->load->helper('push_notification');

        $date = date('Y-m-d-h-i-s');
        $folderPath2 = "upload/";
        $image_parts2 = explode(";base64,", $_POST['signed']);
        $image_type_aux2 = explode("image/", $image_parts2[0]);
        $image_type = $image_type_aux2[1];
        $image_base642 = base64_decode($image_parts2[1]);
        $file2 = $folderPath2 . uniqid() . '.' . $image_type;
        file_put_contents($file2, $image_base642);


        $check = $this->input->post('diteruskan');
        if ($this->input->post('perihal') == null || $this->input->post('perihal') == "") {
            $folderPath = "upload/catatan/";
            $image_parts = explode(";base64,", $_POST['catatan']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);
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

            // kirim notifikasi
            $disposisi_id = $this->db->insert_id();
            $surat_id = $data['id_surat_masuk'];

            $surat = $this->db->where(['id' => $surat_id])->get('surat_masuk')->row_array();
            $users = $this->User_model->getAllUser();
            $roles = $this->db->get('roles')->result_array();

            // dapatkan semua data user
            foreach ($users as $user) {
                foreach ($roles as $role) {
                    if ($role['nama_role'] == $object) {
                        if ($user['role_id'] == $role['role_id']) {
                            if ($user['fcm_token'] != null) {
                                sendPush($user['fcm_token'], "Surat Diterima Dari {$data['diteruskan_oleh']}", 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', $surat['perihal'], 'disposisi', $disposisi_id);
                                sleep(1);
                            }
                        }
                    }
                }
            }

            // end

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
        is_logged_in();
        $this->load->helper('push_notification');

        if ($this->input->post('perihal') == null || $this->input->post('perihal') == "") {
            $folderPath = "upload/catatan/";
            $image_parts = explode(";base64,", $_POST['catatan']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.' . $image_type;
            file_put_contents($file, $image_base64);
            $catatan = $file;
        } else {
            $catatan = $this->input->post('perihal');
        }
        $data = [
            'didisposisi' => '?',
            'catatan_dilimpahkan' => $catatan,
        ];
        $this->session->set_flashdata('flash', 'dilimpahkan ke sekertaris');
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_masuk', $data);

        // kirim notif

        $last_id = $this->input->post('id');

        $surat = $this->db->where(['id' => $last_id])->get('surat_masuk')->row_array();
        $users = $this->User_model->getAllUser();
        $roles = $this->db->get('roles')->result_array();

        // dapatkan semua data user
        foreach ($users as $user) {
            foreach ($roles as $role) {
                if ($role['nama_role'] == "Sekretaris") {
                    if ($user['role_id'] == $role['role_id']) {
                        if ($user['fcm_token'] != null) {
                            sendPush($user['fcm_token'], 'Surat Diterima Dari Pimpinan', 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', $surat['perihal'], 'surat_masuk', $last_id);
                            break;
                        }
                    }
                }
            }
        }


        redirect('pimpinan/index');
    }

    // Mobile app

    public function tambahDataFromApp()
    {
        $this->load->helper('push_notification');
        // $users = $this->db->get('user')->result_array();
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

        $nameCatatan = $this->input->post('catatan', true);

        if ($this->input->post('image_catatan') != '-') {
            $image = $this->input->post('image_catatan');
            $imageDecode = base64_decode($image);

            $file = $folder2 . uniqid() . '.png';
            $nameCatatan = $file;
            file_put_contents($file, $imageDecode);
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
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ];

        $this->db->where('id', $this->input->post('id_surat_masuk', true));
        $this->db->update('surat_masuk', ['didisposisi' => 'Y']);

        if (count($arrRole) > 1) {
            for ($i = 0; $i < count($arrRole); $i++) {
                for ($j = 0; $j < count($roles); $j++) {
                    if ($roles[$j]['role_id'] == $arrRole[$i]) {
                        $data['diteruskan_kepada'] = $roles[$j]['nama_role'];
                        $this->db->insert('disposisi', $data);

                        // kirim notifikasi
                        $disposisi_id = $this->db->insert_id();
                        $surat_id = $data['id_surat_masuk'];

                        $surat = $this->db->where(['id' => $surat_id])->get('surat_masuk')->row_array();
                        $users = $this->User_model->getAllUser();
                        $rolesCheck = $this->db->get('roles')->result_array();

                        // dapatkan semua data user
                        foreach ($users as $user) {
                            foreach ($rolesCheck as $role) {
                                if ($role['nama_role'] == $roles[$j]['nama_role']) {
                                    if ($user['role_id'] == $role['role_id']) {
                                        if ($user['fcm_token'] != null) {
                                            sendPush($user['fcm_token'], "Surat Diterima Dari {$data['diteruskan_oleh']}", 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', $surat['perihal'], 'disposisi', $disposisi_id);
                                            sleep(1);
                                        }
                                    }
                                }
                            }
                        }

                        // end
                    }
                }
            }
        } else if (count($arrRole) == 1) {
            for ($i = 0; $i < count($roles); $i++) {
                if ($roles[$i]['role_id'] == $arrRole[0]) {
                    $data['diteruskan_kepada'] = $roles[$i]['nama_role'];
                    $this->db->insert('disposisi', $data);

                    // kirim notifikasi
                    $disposisi_id = $this->db->insert_id();
                    $surat_id = $data['id_surat_masuk'];

                    $surat = $this->db->where(['id' => $surat_id])->get('surat_masuk')->row_array();
                    $users = $this->User_model->getAllUser();
                    $rolesCheck = $this->db->get('roles')->result_array();

                    // dapatkan semua data user
                    foreach ($users as $user) {
                        foreach ($rolesCheck as $role) {
                            if ($role['nama_role'] == $roles[$i]['nama_role']) {
                                if ($user['role_id'] == $role['role_id']) {
                                    if ($user['fcm_token'] != null) {
                                        sendPush($user['fcm_token'], "Surat Diterima Dari {$data['diteruskan_oleh']}", 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', $surat['perihal'], 'disposisi', $disposisi_id);
                                        sleep(1);
                                    }
                                }
                            }
                        }
                    }

                    // end
                    break;
                }
            }
        }

        echo 'berhasil';
    }

    public function perbaruiSuratMasuk()
    {
        $catatan = '';
        $folder2 = 'upload/catatan/';

        $catatan = $this->input->post('catatan', true);

        if ($this->input->post('image_catatan') != '-') {
            $image = $this->input->post('image_catatan');
            $imageDecode = base64_decode($image);

            $file = $folder2 . uniqid() . '.png';
            $catatan = $file;
            file_put_contents($file, $imageDecode);
        }

        $data = [
            'didisposisi' => $this->input->post('status_disposisi'),
            'catatan_dilimpahkan' => $catatan,
            'updated_at' => date("Y-m-d h:i:s")
        ];

        if ($this->input->post('catatan'))

            $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat_masuk', $data);

        // kirim notif

        $last_id = $this->input->post('id');

        $surat = $this->db->where(['id' => $last_id])->get('surat_masuk')->row_array();
        $users = $this->User_model->getAllUser();
        $roles = $this->db->get('roles')->result_array();

        // dapatkan semua data user
        foreach ($users as $user) {
            foreach ($roles as $role) {
                if ($role['nama_role'] == "Sekretaris") {
                    if ($user['role_id'] == $role['role_id']) {
                        if ($user['fcm_token'] != null) {
                            sendPush($user['fcm_token'], 'Surat Diterima Dari Pimpinan', 'Dari: ' . $surat['asal_surat'], '@mipmap/ic_launcher', $surat['perihal'], 'surat_masuk', $last_id);
                            break;
                        }
                    }
                }
            }
        }

        return json_encode('surat masuk berhasil diperbarui');
    }

    public function perbaruiDisposisi()
    {
        $this->load->helper('push_notification');

        $post_id = $this->input->post('id_disposisi');
        $post_catatan = $this->input->post('catatan_bidang');
        $post_readat = $this->input->post('read_at');

        if ($post_readat != null) {
            $this->db->set('tanggal_dibaca', $post_readat);
        } else if ($post_catatan != null) {
            $this->db->set('catatan_bidang', $post_catatan);
        }
        $this->db->set('updated_at', date("Y-m-d h:i:s"));

        $this->db->where('id_disposisi', $post_id);
        $this->db->update('disposisi');

        // kirim notifikasi

        $disposisi = $this->db->where(['id_disposisi' => $post_id])->get('disposisi')->row_array();
        $surat = $this->db->where(['id' => $disposisi['id_surat_masuk']])->get('surat_masuk')->row_array();

        $users = $this->User_model->getAllUser();
        $roles = $this->db->get('roles')->result_array();

        // dapatkan semua data user
        if ($post_catatan != null) {
            foreach ($users as $user) {
                foreach ($roles as $role) {
                    if ($role['nama_role'] == $disposisi['diteruskan_oleh']) {
                        if ($user['role_id'] == $role['role_id']) {
                            if ($user['fcm_token'] != null) {
                                sendPush($user['fcm_token'], "Balasan Dari {$disposisi['diteruskan_kepada']}", "Surat: {$surat['asal_surat']}, Catatan: {$disposisi['catatan_bidang']}", '@mipmap/ic_launcher', $disposisi['id_disposisi'], 'disposisi', $post_id);
                            }
                        }
                    }
                }
            }
        } else if ($post_readat != null) {
            foreach ($users as $user) {
                foreach ($roles as $role) {
                    if ($role['nama_role'] == $disposisi['diteruskan_oleh']) {
                        if ($user['role_id'] == $role['role_id']) {
                            if ($user['fcm_token'] != null) {
                                sendPush($user['fcm_token'], "Surat anda telah dibaca {$disposisi['diteruskan_kepada']}", "Surat: {$surat['asal_surat']}", '@mipmap/ic_launcher', $disposisi['id_disposisi'], 'disposisi', $post_id);
                            }
                        }
                    }
                }
            }
        }

        // end

        echo json_encode('berhasil');
    }

    public function hapusDisposisi()
    {
        $user = $this->input->post('user');
        $id_surat = $this->input->post('id');

        $disposisi = $this->db->where(['id_surat_masuk' => $id_surat])->get('disposisi')->row_array();

        unlink(base_url($disposisi['tanda_tangan']));

        if (substr($disposisi['catatan'], 0, 6) == "upload") {
            unlink(base_url($disposisi['catatan']));
        }

        $this->db->delete('disposisi', ['id_surat_masuk' => $id_surat, 'diteruskan_oleh' => $user]);
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
    public function print($id)
    {
        $data = [
            'surat_masuk' => $this->Relasi_model->SuratMasukbyId($id),
            'name' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('pimpinan/print', $data);
    }
}
