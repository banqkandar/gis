<div class="page-header">
    <h1>Update Password</h1>
</div>
<div class="row">
    <div class="col-sm-5">
        <?php if($_POST) include('aksi.php')?>
        <form method="post" action="?m=password&act=password_ubah">
        <div class="form-group">
            <label>Old Password<span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass1"/>
        </div>
        <div class="form-group">
            <label>New Password<span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass2"/>
        </div>
        <div class="form-group">
            <label>New Confirmation Password<span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="pass3"/>
        </div>
        <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button>
        </form>
    </div>
</div>