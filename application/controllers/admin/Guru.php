<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_admin');
        // $this->load->model('Mdl_Cek');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('cookie');
        // if ($this->session->userdata('hak_akses')!='1')
        // {
        //     redirect('','refresh');
        // }
    }

    public function index()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $data['judul']          = "Materi";
        $data['subjudul']       = "Guru Pengajar";
        $data['title']          = "E-learning";
        $data['judulbesar']     = "Guru Pengajar";
        $data['data_guru']      = $this->Mdl_admin->get_data_guru();

        $this->load->view('admin/admin_view.php', $data);
    }

    public function Add()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $this->form_validation->set_rules('unsername', 'unsername', 'required|htmlspecialchars|is_unique[tbl_guru.unsername]');
        $this->form_validation->set_rules('nama', 'nama', 'required|htmlspecialchars');
        $this->form_validation->set_rules('panseword', 'panseword', 'required|htmlspecialchars');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|htmlspecialchars');
        $this->form_validation->set_rules('akses', 'akses', 'required|htmlspecialchars');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Data Guru gagal disimpan.!');
            redirect('admin/Guru');
        } else {
            $this->Mdl_admin->Save_guru();
            $this->session->set_flashdata('berhasil', 'Data Guru berhasil disimpan.!');
            redirect('admin/Guru');
        }
    }

    public function Edit()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('panseword', 'panseword', 'htmlspecialchars');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('akses', 'akses', 'required|htmlspecialchars');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Data Guru gagal diperbaharui, dikarenakan ada data yang tidak sesuai atau kurang lengkap.!');
            redirect('admin/Guru');
        } else {
            $this->Mdl_admin->Update_guru();
            $this->session->set_flashdata('berhasil', 'Data Guru berhasil disimpan.!');
            redirect('admin/Guru');
        }
    }
}