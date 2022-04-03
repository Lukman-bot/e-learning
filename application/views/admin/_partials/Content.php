<section class="content">
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">
          <?php 
            $uri=$this->uri->segment(2);
            switch ($uri) {
              case 'Dashboard':
                $this->load->view('admin/Dashboard.php');
                break;
              case 'Kelas':
                $this->load->view('admin/Kelas.php');
                break;
              case 'Siswa':
                $this->load->view('admin/Siswa.php');
                break;
              case 'Topik_soal':
                $this->load->view('admin/Topik_soal.php');
                break;
              case 'Soal':
                $this->load->view('admin/Soal.php');
                break;
              case 'Daftar_soal':
                $this->load->view('admin/Daftar_soal.php');
                break;
              case 'jawaban':
                 $this->load->view('admin/Jawaban.php','refresh');
                break;
              case 'Mat_pel':
                $this->load->view('admin/Mat_pel.php');
                break;
              case 'Materi':
                $this->load->view('admin/Materi.php');
                break;
              case 'List_materi':
                $this->load->view('admin/List_materi.php');
                break;
              case 'Lihat_soal':
                $this->load->view('admin/Lihat_soal.php');
                break;
              case 'Quiz':
                $this->load->view('admin/Quiz.php');
                break;
              case 'Detail_materi':
                $this->load->view('admin/Detail.php');
                break;
              case 'Tahun_pelajaran':
                $this->load->view('admin/Tahun_pelajaran.php');
                break;
              case 'Guru':
                $this->load->view('admin/Guru.php');
                break;
              case 'List_mapel_guru':
                $this->load->view('admin/List_mapel_guru.php');
                break;
              case 'Daftar_quiz':
                $this->load->view('admin/Daftar_data_quiz.php');
                break;
              case 'Forum':
                $this->load->view('admin/Forum.php');
                break;
              case 'Join_forum':
                $this->load->view('admin/Join_forum.php');
                break;
              case 'Profile':
                $this->load->view('admin/Profile.php');
                break;
              case 'Detail_materi':
                $this->load->view('admin/Detail.php');
                break;
              case 'Quiz_edit':
                $this->load->view('admin/Quiz_edit.php');
                break;
              case 'Import':
                $this->load->view('admin/Import_siswa');
                break;
              case 'Import_guru':
                $this->load->view('admin/Import_guru');
                break;
              default:
                $this->load->view('admin/Dashboard.php');
                break;
            }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>  
</section>