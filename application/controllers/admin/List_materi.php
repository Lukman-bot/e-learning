<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_materi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_admin');
        // $this->load->model('Mdl_Cek');
        $this->load->library('session');
        $this->load->helper('cookie');
        // if ($this->session->userdata('hak_akses') != '1')
        // {
        //     redirect('','refresh');
        // }
    }

    public function index()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']          = $this->Mdl_admin->get_data_pengguna();
        $data['judul']          = "Materi";
        $data['subjudul']       = "Daftar List Materi";
        $data['title']          = "E-learning";
        $data['judulbesar']     = "List Materi Pelajaran";
        $data['data_materi']    = $this->Mdl_admin->get_data_materi();

        $this->load->view('admin/admin_view.php', $data);
    }

    public function Update()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $id_materi  = $this->input->post('id_materi',TRUE);
        $this->form_validation->set_rules('id_materi','id_materi','required|htmlspecialchars');
        $this->form_validation->set_rules('detail_materi','detail_materi','required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal','Maaf, data List Materi Gagal diperbaharui.!!');
            redirect('admin/List_materi');
        }
        $this->Mdl_admin->Update_materi($id_materi);
        $this->session->set_flashdata('berhasil','Data materi berhasil diperbaharui.!!');
        redirect('admin/List_materi');
    }

    public function Delete()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $id_materi  = $this->input->post('id_materi',TRUE);
        $this->form_validation->set_rules('id_materi','id_materi','required|htmlspecialchars');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Maag, data list materi gagal dihapus');
            redirect('admin/List_materi');
        } else {
            $this->Mdl_admin->Delete_materi($id_materi);
            $this->session->set_flashdata('berhasil', 'Data Materi Berhasil dihapus.!!');
            redirect('admin/List_materi');
        }
    }

    public function Detail()
    {
        // $this->Mdl_Cek->get_sequrity();
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $id_materi = $this->uri->segment(4);
        $data['judul']          = "Materi";
        $data['subjudul']       = "Daftar List Materi";
        $data['title']          = "E-learning";
        $data['judulbesar']     = "Detail Materi";
        $data['detail_materi']  = $this->Mdl_admin->get_detail_materi($id_materi);

        $this->load->view('admin/admin_view.php', $data);
    }

    public function Delete_list($id_materi=null)
    {
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna();
        $this->Mdl_admin->Delete_list_materi($id_materi);
        $this->session->set_flashdata('berhasil', 'Data Materi Berhasil dihapus.!!');
        redirect('admin/List_materi');
    }
}