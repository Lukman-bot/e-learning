<h3>
    <?php
        echo $judulbesar;
    ?>
</h3>
<hr>
<form action="<?php echo base_url() ?>index.php/admin/Materi/Simpan/<?php echo $id_mapel ?>" method="POST">
    <p>
        Judul Materi
    </p>
    <p>
        <input type="text" name="judul_materi" class="form form-control" required>
    </p>
    <p>
        Detail Materi
    </p>
    <p>
        <textarea name="detail_materi" id="ckeditor" class="ckeditor">

        </textarea>
    </p>
    <p>
        <button class="btn btn-primary btn-md" name="simpan" type="submit">
            <li class="fa fa-save"></li> Simpan
        </button>
    </p>
</form>