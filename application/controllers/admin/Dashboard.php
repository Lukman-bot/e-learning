<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function index()
    {
        $data['judul']      = "Dashboard";
        $data['subjudul']   = "e-learning";
        $data['title']      = "e-learning";
        $data['heading']    = "Dashboard";

        $this->load->view('admin/admin_view', $data);
    }
}