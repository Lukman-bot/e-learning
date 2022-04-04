<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil') ?>"></div>
<?php
    $uri=$this->uri->segment(3);
    switch ($uri) {
        case 'Updater':
            $this->load->view('admin/_Mat_pel_edit.php');
            break;
        default:
            $this->load->view('admin/_Mat_pel_view.php');
            break;
    }
?>