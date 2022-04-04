<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_admin extends CI_Model {
    public function get_data_kelas()
    {
        $get = $this->db->query("SELECT tbl_kelas.id_kelas, tbl_kelas.nama_kelas, count(tbl_user.id_user) as jumlah_siswa, tbl_tapel.nama_tapel from tbl_kelas left outer join tbl_user on tbl_kelas.id_kelas=tbl_user.id_kelas join tbl_tapel on tbl_kelas.id_tapel=tbl_tapel.id_tapel GROUP by(tbl_kelas.id_kelas)");
        return $get;
    }

    public function get_kelas_all()
    {
        return $this->db->get('tbl_kelas');
    }

    public function Save_kelas()
    {
        $kelas = $this->input->post('kelas', TRUE);
        $id_tapel = $this->input->post('id_tapel', TRUE);
        $data=array(
            'nama_kelas'    => $kelas,
            'id_tapel'      => $id_tapel
        );
        return $this->db->insert('tbl_kelas', $data);
    }

    public function Update_kelas()
    {
        $id_kelas = $this->input->post('id_kelas', TRUE);
        $kelas      = $this->input->post('kelas', TRUE);
        $this->db->set('nama_kelas', $kelas);
        $this->db->where('id_kelas', $id_kelas);
        $this->db->update('tbl_kelas');
    }

    public function Delete_kelas()
    {
        $id_kelas = $this->input->post('id_kelas', TRUE);
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete('tbl_kelas');
    }

    public function get_data_siswa()
    {
        $get = $this->db->query("select tbl_user.*, tbl_kelas.* from tbl_user left JOIN tbl_kelas on tbl_user.id_kelas=tbl_kelas.id_kelas");
        return $get;
    }

    public function Save_siswa()
    {
        $id_kelas       = $this->input->post('Kelas', TRUE);
        $username       = $this->input->post('username', TRUE);
        $password1      = password_hash($this->input->post('password', TRUE),PASSWORD_DEFAULT);
        $password2      = $this->input->post('password', TRUE);
        $nama_siswa     = $this->input->post('nama', TRUE);
        $data=array(
            'id_kelas'      => $id_kelas,
            'username'      => $username,
            'panseword1'    => $password1,
            'panseword2'    => $password2,
            'nama_siswa'    => $nama_siswa
        );
        $this->db->insert('tbl_user', $data);
    }

    public function Update_siswa($id_user)
    {
        $password1      = password_hash($this->input->post('password', TRUE),PASSWORD_DEFAULT);
        $password2      = $this->input->post('password', TRUE);
        $nama_siswa     = $this->input->post('nama', TRUE);
        $id_kelas       = $this->input->post('Kelas', TRUE);
        $data=array(
            'nama_siswa'        => $nama_siswa,
            'id_kelas'          => $id_kelas,
            'panseword1'        => $password1,
            'panseword2'        => $password2
        );
        $this->db->set($data);
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user');
    }

    public function Delete_siswa($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_user');
    }

    public function get_cari_siswa($kunci)
    {
        return $this->db->get_where('tbl_user',array('username'=>$kunci));
    }

    public function get_data_tapel()
    {
        return $this->db->get('tbl_tapel');
    }

    public function save_tapel()
    {
        $nama_tapel     = $this->input->post('nama_tapel', TRUE);
        return $this->db->insert('tbl_tapel', array('nama_tapel'=>$nama_tapel));
    }

    public function Delete_tapel($kunci)
    {
        return $this->db->delete('tbl_tapel',array('id_tapel'=>$kunci));
    }

    public function Save_guru()
    {
        $nama           = $this->input->post('nama', TRUE);
        $username       = $this->input->post('unsername', TRUE);
        $panseword      = password_hash($this->input->post('panseword', TRUE),PASSWORD_DEFAULT);
        $tempat_lahir   = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir      = $this->input->post('tgl_lahir', TRUE);
        $akses          = $this->input->post('akses', TRUE);
        $data=array(
            'nama'          => $nama,
            'unsername'     => $username,
            'panseword'     => $panseword,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'id_akses'      => $akses
        );
        $this->db->insert('tbl_guru', $data);
    }

    public function get_data_guru()
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_akses','tbl_guru.id_akses=tbl_akses.id_akses');
        return $this->db->get();
    }

    public function Update_guru()
    {
        $id_guru        = $this->input->post('id_guru', TRUE);
        $nama           = $this->input->post('nama', TRUE);
        $tempat_lahir   = $this->input->post('tempat_lahir', TRUE);
        $tgl_lahir      = $this->input->post('tgl_lahir', TRUE);
        $akses          = $this->input->post('akses', TRUE);
        $password       = password_hash($this->input->post('panseword', TRUE), PASSWORD_DEFAULT);
        $data=array(
            'nama'          => $nama,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'id_akses'      => $akses
        );
        $data1=array(
            'nama'          => $nama,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'panseword'     => $password,
            'id_akses'      => $akses,
        );
        if (empty($this->input->post('panseword',TRUE))) {
            $this->db->set($data);
            $this->db->where('id_guru', $id_guru);
            $this->db->update('tbl_guru');
        } else {
            $this->db->set($data1);
            $this->db->where('id_guru', $id_guru);
            $this->db->update('tbl_guru');
        }
    }

    public function get_data_mat_pel()
    {
        $eksekusi = $this->db->query("SELECT tbl_mapel.*, count(tbl_materi.id_materi) as jumlah_materi from tbl_mapel left join tbl_materi on tbl_mapel.id_mapel=tbl_materi.id_mapel GROUP BY(tbl_mapel.id_mapel)");
        return $eksekusi;
    }

    public function get_data_mat_pel_search($id_mapel)
    {
        return $this->db->get_where('tbl_mapel',array('id_mapel'=>$id_mapel));
    }

    public function get_data_mat_pel_terpilih($id_mapel)
	{
		return $this->db->query("SELECT tbl_kelas.*, tbl_mapel_kelas_guru_group.id_group, tbl_mapel_kelas_guru_group.id_mapel,tbl_mapel_kelas_guru_group.id_kelas as id_kelas_pilih  from tbl_kelas left outer join tbl_mapel_kelas_guru_group on tbl_kelas.id_kelas= tbl_mapel_kelas_guru_group.id_kelas where tbl_mapel_kelas_guru_group.id_mapel='$id_mapel'");
	}

    public function Add_mat_pel()
    {
        $this->db->trans_start();
        $nama_mapel =preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('nama_mapel',TRUE));
		$deskripsi 	=preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('deskripsi',TRUE));
		$id_kelas 	=$this->input->post('id_kelas', TRUE);
        $data=array(
            'nama_mapel'    => $nama_mapel,
            'deskripsi'     => $deskripsi
        );
        $this->db->insert('tbl_mapel', $data);
        $id_mapel   = $this->db->insert_id();
        $result=array();
        foreach ($id_kelas as $key => $value) {
            $result[]=array(
                'id_mapel'  => $id_mapel,
                'id_kelas'  => $_POST['id_kelas'][$key]
            );
        }
        $this->db->insert_batch('tbl_mapel_kelas_guru_group', $result);
        $this->db->trans_complete();
    }

    public function Update_mat_pel($id_mapel)
	{
		//$id_mapel 	=$this->input->post('id_mapel',TRUE);
		$this->db->trans_start();
		$nama_mapel =preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('nama_mapel',TRUE));
		$deskripsi 	=preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('deskripsi',TRUE));
		$id_kelasnya 	=$this->input->post('id_kelasnya', TRUE);
		//$id_kelas 	=$this->input->post('id_kelas', TRUE);
		$data=array(
			'nama_mapel' 		=>$nama_mapel,
			'deskripsi' 		=>$deskripsi
		);
		$this->db->set($data);
		$this->db->where('id_mapel',$id_mapel);
		$this->db->update('tbl_mapel');
		
		$this->db->delete('tbl_mapel_kelas_guru_group',array('id_mapel'=>$id_mapel));
		
		$this->db->trans_complete();
	}

	public function Update_mat_pel1()
	{
		$this->db->trans_start();
		$id_kelas =$this->input->post('id_kelas', TRUE);
		$id_mapel =$this->input->post('id_mapel',TRUE);
		$result=array();
		foreach ($id_kelas as $key => $value) {
			$result[]=array(
				'id_mapel'	=>$id_mapel,
				'id_kelas' 	=>$_POST['id_kelas'][$key]);
		}
		$this->db->insert_batch('tbl_mapel_kelas_guru_group',$result);
		$this->db->trans_complete();
	}

    public function get_nama_mapel($kunci)
    {
        $eksekusi   = $this->db->query("select * from tbl_mapel where id_mapel='$kunci'");
        return $eksekusi;
    }

    public function Save_materi($id_mapel)
	{
		$judul_materi 	= preg_replace("/[^a-zA-Z0-9]/", " ", $this->input->post('judul_materi',TRUE));
		$detail_materi 	= $this->input->post('detail_materi',TRUE);
		//$id_mapel		=$this->input->post('id_mapel', TRUE);
		$data=array(
			'judul_materi'		=>$judul_materi,
			'detail_materi' 	=>$detail_materi,
			'id_mapel'			=>$id_mapel
		);
		return $this->db->insert('tbl_materi',$data);
	}

    public function get_data_materi()
	{
		$eksekusi 	=$this->db->query("SELECT tbl_materi.id_materi, tbl_materi.judul_materi, left(tbl_materi.detail_materi,1000) as detail_materi, tbl_materi.video,
tbl_mapel.id_mapel, tbl_mapel.nama_mapel, tbl_mapel.deskripsi
from tbl_materi left outer join tbl_mapel on tbl_materi.id_mapel=tbl_mapel.id_mapel");
		return $eksekusi;

	}

	public function Update_materi($kunci)
	{
		$judul_materi 	=$this->input->post('judul_materi',TRUE);
		$detail_materi 	=preg_replace("[a-zA-Z0-9]", " ", $this->input->post('detail_materi',TRUE));

		//$detail_materi 	=$this->input->post('detail_materi',TRUE);
		//$id_mapel		=$this->input->post('id_mapel',TRUE);
		$data=array(
			'judul_materi'		=>$judul_materi,
			'detail_materi'		=>$detail_materi
		);
		$this->db->set($data);
		$this->db->where('id_materi',$kunci);
		$this->db->update('tbl_materi');
		
	}

	public function Delete_materi($kunci)
	{
		$this->db->where('id_materi',$kunci);
		$this->db->delete('tbl_materi');
	
	}
    
	public function Delete_list_materi($id_materi)
	{
		$this->db->where('id_materi',$id_materi);
		$this->db->delete('tbl_materi');
	}

    public function get_materi_mapel($id_mapel)
	{
		return $this->db->get_where('tbl_materi',array('id_mapel'=>$id_mapel));
	}
}