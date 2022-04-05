<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->model('Relasi_model');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('flash');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Anda Berhasil Logout
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('Auth');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 6) {
                    redirect('Pimpinan');
                } else if ($user['role_id'] == 1) {
                    redirect('Sekertaris');
                } else if ($user['role_id'] == 2) {
                    redirect('Bidang2');
                } else if ($user['role_id'] == 3) {
                    redirect('Bidang3');
                } else if ($user['role_id'] == 4) {
                    redirect('Bidang4');
                } else if ($user['role_id'] == 5) {
                    redirect('Bidang5');
                } else if ($user['role_id'] == 8) {
                    redirect('Staf2');
                } else if ($user['role_id'] == 9) {
                    redirect('Staf3');
                } else if ($user['role_id'] == 10) {
                    redirect('Staf4');
                } else if ($user['role_id'] == 11) {
                    redirect('Staf5');
                } else {
                    redirect('Home');
                }
                //redirect('Home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau password salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username atau password salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        $data = [
            'name' => $this->input->post('name', true),
            'username' => $this->input->post('username', true),
            'role_id' => $this->input->post('roles', true),
            'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)
        ];
        $this->session->set_flashdata('flash', 'ditambahkan');
        $this->db->insert('user', $data);
        redirect('User');
    }

    // app
    public function loginFromApp()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fcmToken = $this->input->post('fcm_token');

        $data = array();

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {

                $roles = $this->db->get('roles')->result_array();
                $userRole = '';

                foreach ($roles as $role) {
                    if ($user['role_id'] == $role['role_id']) {
                        $userRole = $role['nama_role'];
                    }
                }

                $data['value'] = 1;
                $data['nama'] = $user['name'];
                $data['username'] = $user['username'];
                $data['role'] = $userRole;
                $data['fcm_token'] = $fcmToken;
                $data['id'] = $user['user_id'];
                $data['message'] = 'login berhasil';

                if ($user['has_app'] == 0) {
                    $user['has_app'] = 1;
                    $user['fcm_token'] = $data['fcm_token'];

                    $this->db->where('user_id', $user['user_id']);
                    $this->db->update('user', $user);
                } else if ($user['fcm_token'] != $fcmToken) {
                    $user['fcm_token'] = $data['fcm_token'];

                    $this->db->where('user_id', $user['user_id']);
                    $this->db->update('user', $user);
                }

                echo json_encode($data);
            } else {
                $data['value'] = 0;
                $data['fcm_token'] = $fcmToken;
                $data['message'] = 'login gagal, password salah';

                echo json_encode($data);
            }
        } else {
            $data['value'] = 0;
            $data['fcm_token'] = $fcmToken;
            $data['message'] = 'login gagal, user tidak ditemukan';

            echo json_encode($data);
        }
    }
}
