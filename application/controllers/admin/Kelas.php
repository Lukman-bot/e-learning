<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_admin');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul']      = "Siswa";
        $data['subjudul']   = "Kelas";
        $data['title']      = "e-learning";
        $data['heading']    = "Data Kelas";
        $data['data_kelas'] = $this->Mdl_admin->get_data_kelas();
        $data['data_tapel'] = $this->Mdl_admin->get_data_tapel();

        $this->load->view('admin/admin_view', $data);
    }
    public function Add()
    {
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('id_tapel', 'id_tapel', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Maaf, Data Kelas gagal ditambahkan.!');
            redirect('admin/Kelas');
        } else {
            $this->Mdl_admin->Save_kelas();
            $this->session->set_flashdata('berhasil', 'Data berhasil disimpan.!');
            redirect('admin/Kelas');
        }
    }
    public function Update()
    {
        // $this->Mdl_cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Data Kelas gagal di perbaharui.!!');
            redirect('admin/Kelas');
        } else {
            $this->Mdl_admin->Update_kelas();
            $this->session->set_flashdata('berhasil', 'Data berhasil di perbaharui.!!');
            redirect('admin/Kelas');
        }
    }
    public function Delete()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Data Kelas gagal di hapus.!!');
            redirect('admin/Kelas');
        } else {
            $this->Mdl_admin->Delete_kelas();
            $this->session->set_flashdata('berhasil', 'Data Kelas berhasil di hapus.!!');
            redirect('admin/Kelas');
        }
    }
}