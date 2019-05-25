<div class="page-header">
    <h1>Place</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="tempat" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Search..." name="q" value="<?=$_GET['q']?>" />            
                <button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>            
                <a class="btn btn-success" href="?m=tempat_tambah"><span class="glyphicon glyphicon-plus"></span> Add</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw">
                <th>No</th>
                <th>Gallery</th>
                <th>Name Place</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
                
        $sql = "SELECT * 
            FROM tb_tempat p
            WHERE nama_tempat LIKE '%$q%' 
            ORDER BY id_tempat";
        $rows = $db->get_results($sql);
        
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no?></td>
            <td><img class="thumbnail" height="60" src="assets/images/tempat/small_<?=$row->gambar?>" /></td>
            <td><?=$row->nama_tempat?></td>
            <td><?=$row->lat?></td>
            <td><?=$row->lng?></td>
            <td><?=$row->lokasi?></td>
            <td class="nw">
                <a class="btn btn-xs btn-warning" href="?m=tempat_ubah&ID=<?=$row->id_tempat?>"><span class="glyphicon glyphicon-edit"></span> Update</a>
                <a class="btn btn-xs btn-danger" href="aksi.php?act=tempat_hapus&ID=<?=$row->id_tempat?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            </td>
        </tr>
        <?php endforeach;    ?>
        </table>
    </div>
</div>