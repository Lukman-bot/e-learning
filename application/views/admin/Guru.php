<div class="flash-data" data-flashdataok="<?php echo $this->session->flashdata('berhasil') ?>"></div>
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">
            <i class="fa fa-plus"></i> Add Guru
        </button>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Tempat & Tgl. Lahir</th>
                        <th>Akses</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach ($data_guru->result_array() as $showguru) :
                            echo "<tr>";
                                echo '<td>'.$no++.'</td>';
                                echo "<td>$showguru[nama]</td>";
                                echo "<td>$showguru[unsername]</td>";
                                echo "<td>$showguru[tempat_lahir], $showguru[tgl_lahir]</td>";
                                echo "<td>$showguru[ket]</td>";
                                echo "<td>
                                    <button class='btn btn-info btn-xs' title='Edit' data-toggle='modal' data-target='#modal-edit-$showguru[id_guru]'>
                                        <li class='fa fa-edit'></li>
                                    </button>
                                </td>";
                            echo "</tr>";
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Guru -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Guru Pengajar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() ?>index.php/admin/Guru/Simpan" method="POST">
                <div class="modal-body">
                    <p>
                        Username
                    </p>
                    <p>
                        <input type="text" name="unsername" class="form-control" maxlength="8">
                        <p><i>* Panjang Maksimal 8 Karakter</i></p>
                    </p>
                    <p>
                        Nama
                    </p>
                    <p>
                        <input type="text" name="nama" class="form form-control">
                    </p>
                    <p>
                        Password
                    </p>
                    <p>
                        <input type="password" name="panseword" class="form form-control" maxlength="8">
                        <p><i>* Panjang Maksimal 8 Karakter</i></p>
                    </p>
                    <p>
                        Hak Akses
                    </p>
                    <p>
                        <select name="akses" id="" class="form-control">
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                        </select>
                    </p>
                    <p>
                        TTTL
                    </p>
                    <p>
                        <input type="text" name="tempat_lahir" class="form-control">
                    </p>
                    <p>
                        Tgl Lahir
                    </p>
                    <p>
                        <input type="date" name="tgl_lahir" class="form-control">
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <li class="fa fa-undo"></li> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <li class="fa fa-save"></li> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah Guru -->

<!-- Modal Edit Guru -->
<?php
    foreach ($data_guru->result_array() as $showguru) :
?>
<div class="modal fade" id="modal-edit-<?php echo $showguru['id_guru'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Guru Pengajar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() ?>index.php/admin/Guru/Perbaharui" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_guru" value="<?php echo $showguru['id_guru'] ?>">
                    <p>Nama</p>
                    <p><input type="text" name="nama" class="form-control" value="<?php echo $showguru['nama'] ?>" required></p>
                    <p>Password</p>
                    <p>
                        <input type="password" name="panseword" class="form form-control" maxlength="8">
                        <p> <i>* Panjang Maksimal 8 Karakter</i> </p>
                        <p> <i>Jika Password tidak ingin dirubah, maka kosongkan saja.</i> </p>
                    </p>
                    <p>Hak Akses</p>
                    <p>
                        <select name="akses" id="" class="form-control">
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                        </select>
                    </p>
                    <p>TTL</p>
                    <p>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $showguru['tempat_lahir'] ?>" required>
                    </p>
                    <p>Tgl Lahir</p>
                    <p>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $showguru['tgl_lahir'] ?>" required>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    endforeach;
?>
<!-- End Modal Edit Guru -->