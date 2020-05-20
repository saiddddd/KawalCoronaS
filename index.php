<?php
include 'v_head.php';
include 'v_header.php';
include 'v_nav.php';

foreach($api->nasional()['provinsi']['features'] as $value){
    $positif[] = $value['attributes']['Kasus_Posi'];
    $sembuh[] = $value['attributes']['Kasus_Semb'];
    $meninggal[] = $value['attributes']['Kasus_Meni'];
}

foreach($api->nasional()['chart']['features'] as $value){
  $tanggal[] = date('d M',$value['attributes']['Tanggal'] / 1000);
  $jumlah_positif[] = $value['attributes']['Jumlah_Kasus_Kumulatif'];
  $jumlah_sembuh[] = $value['attributes']['Jumlah_Pasien_Sembuh'];
}

?>

<!-- Content is here -->
<div class="col-lg-4 col-12">
  <!-- small box -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3><?= number_format(array_sum($positif),0,",","."); ?></h3>

      <p>Total Positif</p>
    </div>
    <div class="icon">
      <i class="fa fa-hospital"></i>
    </div>

  </div>
</div>
<!-- ./col -->

<div class="col-lg-4 col-12">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3><?= number_format(array_sum($sembuh),0,",","."); ?></h3>

      <p>Total Sembuh</p>
    </div>
    <div class="icon">
      <i class="fa fa-smile"></i>
    </div>

  </div>
</div>
<!-- ./col -->

<div class="col-lg-4 col-12">
  <!-- small box -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= number_format(array_sum($meninggal),0,",","."); ?></h3>

      <p>Total Meninggal</p>
    </div>
    <div class="icon">
      <i class="far fa-sad-tear"></i>
    </div>

  </div>
</div>
<!-- ./col -->

<div class="col-lg-12">
  <!-- AREA CHART -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Grafik Kasus Coronavirus di Indonesia</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<div class="col-lg-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Provinsi</th>
              <th class="text-center">Positif</th>
              <th class="text-center">Sembuh</th>
              <th class="text-center">Meninggal</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($api->nasional()['provinsi']['features'] as $value) : ?>
              <tr>
                <td class="text-center"><?= $no++;  ?></td>
                <td><?= $value['attributes']['Provinsi'];  ?></td>
                <td class="text-center"><span class="badge badge-danger"><?= $value['attributes']['Kasus_Posi']; ?></span></td>
                <td class="text-center"><span class="badge badge-success"><?= $value['attributes']['Kasus_Semb']; ?></span></td>
                <td class="text-center"><span class="badge badge-warning"><?= $value['attributes']['Kasus_Meni']; ?></span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col-lg-12 -->

<?php include 'v_footer.php' ?>