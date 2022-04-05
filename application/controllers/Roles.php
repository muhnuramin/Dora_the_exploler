<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Roles_model');
    }

    public function getJson()
    {
        echo json_encode($this->Roles_model->jsonGetRoles());
    }
}
