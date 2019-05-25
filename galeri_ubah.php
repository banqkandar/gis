<?php
    $row = $db->get_row("SELECT * FROM tb_galeri WHERE id_galeri='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Update Gallery</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=galeri_ubah&ID=<?=$row->id_galeri?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Place <span class="text-danger">*</span></label>
                <select class="form-control" name="id_tempat">
                    <?=get_tempat_option($row->id_tempat)?>
                </select>
            </div>
            <div class="form-group">
                <label>Gallery</label>
                <input class="form-control" type="file" name="gambar"/>
                <p class="help-block">Empty it, if you don't change the image</p>
                <img class="thumbnail" src="assets/images/galeri/small_<?=$row->gambar?>" height="60" />
            </div>
            <div class="form-group">
                <label>Name Gallery</label>
                <input class="form-control" type="text" name="nama_galeri" value="<?=$row->nama_galeri?>"/>
            </div>
            <div class="form-group">
                <label>Information</label>
                <textarea class="mce" name="ket_galeri"><?=$row->ket_galeri?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-primary" href="?m=galeri"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>
        </form>
    </div>
</div>