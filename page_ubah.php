<div class="page-header">
    <h1>Update Page</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php 
            if($_POST) include'aksi.php';        
            $row = $db->get_row("SELECT * FROM tb_page WHERE nama_page='$_GET[nama]'"); 
        ?>
        <form method="post" action="?m=page_ubah&nama=<?=$row->nama_page?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="judul" value="<?=$row->judul?>"/>
            </div>
            <div class="form-group">
                <label>Publish Years</label>
                <textarea class="mce" name="isi"><?=$row->isi?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Add</button>
                <a class="btn btn-primary" href="?m=event"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>
        </form>
    </div>
</div>