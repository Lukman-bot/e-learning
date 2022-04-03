<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-tambah">
            <i class="fa fa-plus"></i> Add MatPel
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
                        <th>Nama MAPEL</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Materi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach ($data_mat_pel->result_array() as $showmatpel) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $showmatpel['nama_mapel'] ?></td>
                            <td><?php echo $showmatpel['deskripsi'] ?></td>
                            <td><?php echo $showmatpel['jumlah_materi'] ?></td>
                            <td>
                                <a href="<?php echo base_url() ?>index.php/admin/Mat_pel/Updater/<?php echo $showmatpel['id_mapel'] ?>" class="btn btn-info btn-xs" title="Edit Mapel">
                                    <li class="fa fa-edit"></li>
                                </a>
                                <a href="#" class="btn btn-danger btn-xs" title="Hapus Mapel" data-toggle="modal" data-target="#modal-hapus-<?php echo $showmatpel['id_mapel'] ?>">
                                    <li class="fa fa-times"></li>
                                </a>
                                <a href="<?php echo base_url() ?>index.php/admin/Materi/Add/<?php echo $showmatpel['id_mapel'] ?>">
                                    <button class="btn btn-xs btn-warning" title="Buat Materi">
                                        <li class="fa fa-book"></li>
                                    </button>
                                </a>
                                <a href="<?php echo base_url() ?>index.php/admin/Materi/List_Materi/<?php echo $showmatpel['id_mapel'] ?>" class="btn btn-success btn-xs" title="Lihat Detail Materi">
                                    <li class="fa fa-search"></li>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Pelajaran -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Materi Pelajaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() ?>index.php/admin/Mat_pel/Simpan" method="POST">
                <div class="modal-body">
                    <p>
                        Nama Mapel
                    </p>
                    <p>
                        <input type="text" name="nama_mapel" class="form form-control" required autocomplete="OFF">
                    </p>
                    <p>
                        Deskripsi
                    </p>
                    <p>
                        <textarea name="deskripsi" cols="5" rows="2" class="form form-control" required=""></textarea>
                    </p>
                    <p>
                        Kelas
                    </p>
                    <p>
                        <select name="id_kelas[]" multiple="multiple" data-placeholder="Pilih Kelas" style="width: 100%;" required>
                            <?php
                                foreach ($data_kelas->result_array() as $showkelas):
                                    echo "<option value='$showkelas[id_kelas]'>$showkelas[nama_kelas] [$showkelas[jumlah_siswa]]</option>";
                                endforeach;
                            ?>
                        </select>
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
<!-- End Modal Tambah Pelajaran -->