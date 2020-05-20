<?php
    include 'v_head.php';
    include 'v_header.php';
    include 'v_nav.php';
    $global = $api->peta_global()['global'];
?>

<div class="col-sm-12">
    <div id="mapid" style="height: 550px;"></div>
</div>

<script>
    var mymap = L.map('mapid').setView([30.836010, 16.435431], 2);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    <?php foreach ($global as $value):?>
        L.marker([<?= $value['attributes']['Lat']; ?>,<?= $value['attributes']['Long_'];?>]).addTo(mymap)
        .bindPopup("Provinsi : <?= $value['attributes']['Country_Region']; ?><br>"+"Positif : <?= $value['attributes']['Confirmed']; ?><br>"+" Sembuh : <?= $value['attributes']['Recovered']; ?>"+"<br>"+"Meninggal : <?= $value['attributes']['Deaths']; ?><br>").openPopup();
    <?php endforeach; ?>

</script>

<?php include 'v_footer.php' ?>