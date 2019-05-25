<div class="page-header">
    <h1>Add Place</h1>
</div>
<form method="post" action="?m=tempat_tambah" enctype="multipart/form-data">    
    <div class="row">
        <div class="col-sm-6">
            <?php if($_POST) include'aksi.php'?>
            <div class="form-group">
                <label>Name Place <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_tempat" value="<?=$_POST['nama_tempat']?>"/>
            </div>
            <div class="form-group">
                <label>Gallery <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="gambar" />
            </div>
            <div class="form-group">
                <label>Latitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lat" id="lat" value="<?=$_POST['lat']?>"/>
            </div>
            <div class="form-group">
                <label>Longitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="lng" name="lng" value="<?=$_POST['lng']?>"/>
            </div>
            <div class="form-group">
                <label>Location <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lokasi" value="<?=$_POST['lokasi']?>"/>
            </div>
            <div class="form-group">
                <label>Information</label>
                <textarea class="mce" name="keterangan"><?=$_POST['keterangan']?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-primary" href="?m=tempat"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            </div>        
        </div>
        <div class="col-sm-6">
            <div id="map" style="height: 400px;"></div>
        </div>        
    </div>
</form>
<script>
var defaultCenter = {
    lat : <?=get_option('default_lat')?>, 
    lng : <?=get_option('default_lng')?>
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