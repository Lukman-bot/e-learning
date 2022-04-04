<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_admin');
        // $this->load->model('Mdl_Cek');
        $this->load->library('session');
        $this->load->library('form_validation');
        // if ($this->session->userdata('hak_akses') != '1')
        // {
        //     redirect('','refresh');
        // }
    }

    public function index($id_mapel=null)
    {
        // $id_pengguna        = $this->session->userdata('username');
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna($id_pengguna);
        $data['judul']      = "Materi";
        $data['subjudul']   = "Mata Pelajaran";
        $data['title']      = "E-learning";
        $data['id_mapel']   = $id_mapel;
        $get_nama_mapel     = $this->Mdl_admin->get_nama_mapel($id_mapel);
        foreach ($get_nama_mapel->result_array() as $shownamamapel) :
            $data['judulbesar']     = $shownamamapel['nama_mapel'];
        endforeach;

        $this->load->view('admin/admin_view.php', $data);
    }

    public function Add($id_mapel=null)
    {
        // $id_pengguna        = $this->session->userdata('username');
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna($id_pengguna);
        $data['judul']          = "Materi";
        $data['subjudul']       = "Materi Pelajaran";
        $data['title']          = "E-learning";
        $data['id_mapel']       = $id_mapel;
        $get_nama_mapel         = $this->Mdl_admin->get_nama_mapel($id_mapel);
        foreach ($get_nama_mapel->result_array() as $shownamamapel) :
            $data['judulbesar'] = $shownamamapel['nama_mapel'];
        endforeach;

        $this->load->view('admin/admin_view.php', $data);
    }

    public function Save($id_mapel=null)
    {
        // $id_pengguna        = $this->session->userdata('username');
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna($id_pengguna);

        $this->form_validation->set_rules('judul_materi', 'judul_materi', 'required|htmlspecialchars');
        $this->form_validation->set_rules('detail_materi', 'detail_materi', 'required|htmlspecialchars');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Data Materi Gagal di Simpan.!, Periksa Kembali Inputan');
            redirect("admin/Materi/Add/$id_mapel");
        } else {
            $this->Mdl_admin->Save_materi($id_mapel);
            $this->session->set_flashdata('berhasil', 'Data Materi Berhasil disimpan.!!');
            // redirect('admin/Dashboard/');
            redirect("admin/Materi/Add/$id_mapel");
        }
    }

    public function list_materi_mapel($id_mapel=null)
    {
        // $id_pengguna                = $this->session->userdata('username');
        // $data['data_pengguna']      = $this->Mdl_admin->get_data_pengguna($id_pengguna);
        $data['judul']              = "Materi";
        $data['subjudul']           = "Mata Pelajaran";
        $data['title']              = "E-learning";
        $data['id_mapel']           = $id_mapel;
        $data['data_list_mapel']    = $this->Mdl_admin->get_materi_mapel($id_mapel);
        $get_nama_mapel             = $this->Mdl_admin->get_nama_mapel($id_mapel);
        foreach ($get_nama_mapel->result_array() as $shownamamapel) :
            $data['judulbesar']     = $shownamamapel['nama_mapel'];
        endforeach;

        $this->load->view('admin/admin_view.php', $data);
    }

    public function Delete($id_mapel=null,$id_materi=null)
    {
        $this->form_validation->set_rules('id_tapel', 'id_tapel', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Maaf, data Materi gagal dihapus.!!');
            redirect("admin/Materi/List_Materi/$id_materi");
        }
        $this->Mdl_admin->Delete_materi_mapel($id_mapel);
        $this->session->set_flashdata('berhasil', 'Data Materi Pelajaran Berhasil Dihapus.!!');
        redirect("admin/Materi/List_Materi/$id_materi");
    }
}