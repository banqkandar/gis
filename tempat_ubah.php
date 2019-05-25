<?php
    $row = $db->get_row("SELECT * FROM tb_tempat WHERE id_tempat='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Update Place</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=tempat_ubah&ID=<?=$row->id_tempat?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name Place<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_tempat" value="<?=$row->nama_tempat?>"/>
            </div>
            <div class="form-group">
                <label>Gallery <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="gambar" />
                <p class="help-block">Empty it, if you don't change the image</p>
                <img class="thumbnail" src="assets/images/tempat/small_<?=$row->gambar?>" height="60" />
            </div>
            <div class="form-group">
                <label>Latitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="lat" name="lat" value="<?=$row->lat?>"/>
            </div>
            <div class="form-group">
                <label>Longitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="lng" name="lng" value="<?=$row->lng?>"/>
            </div>
            <div class="form-group">
                <label>Location <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lokasi" value="<?=$row->lokasi?>"/>
            </div>
            <div class="form-group">
                <label>Information</label>
                <textarea class="mce" name="keterangan"><?=$row->keterangan?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-primary" href="?m=tempat"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>  
        </form>
    </div>
    <div class="col-md-6">
        <div id="map" style="height: 400px;"></div>
    </div>
</div>
<script>
var defaultCenter = {
    lat : <?=$row->lat * 1?>, 
    lng : <?=$row->lng * 1?>
};
function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: <?=get_option('default_zoom')?>,
    center: defaultCenter 
  });

  var marker = new google.maps.Marker({
    position: defaultCenter,
    map: map,
    title: 'Click to zoom',
    draggable:true
  });
  
  
    marker.addListener('drag', handleEvent);
    marker.addListener('dragend', handleEvent);
    
    var infowindow = new google.maps.InfoWindow({
        content: '<h4>Drag untuk pindah lokasi</h4>'
    });
    
    infowindow.open(map, marker);
}

function handleEvent(event) {
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
}

$(function(){
    initMap();
})
</script>