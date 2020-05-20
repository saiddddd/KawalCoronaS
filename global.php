<?php
    include 'v_head.php';
    include 'v_header.php';
    include 'v_nav.php';
?>

<div class="col-lg-4 col-12">
  <!-- small box -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3><?= number_format($api->global()['mathdro']['confirmed']['value'],0,",","."); ?></h3>

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
      <h3><?= number_format($api->global()['mathdro']['recovered']['value'],0,",","."); ?></h3>

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
      <h3><?= number_format($api->global()['mathdro']['deaths']['value'],0,",","."); ?></h3>

      <p>Total Meninggal</p>
    </div>
    <div class="icon">
      <i class="far fa-sad-tear"></i>
    </div>

  </div>
</div>
<!-- ./col -->

<div class="col-lg-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Kasus Coronavirus Global</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Negara</th>
              <th class="text-center">Provinsi</th>
              <th class="text-center">Positif</th>
              <th class="text-center">Sembuh</th>
              <th class="text-center">Meninggal</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($api->global()['global'] as $value) : ?>
              <tr>
                <td class="text-center"><?= $no++;  ?></td>
                <td><?= $value['countryRegion'];  ?></td>
                <td><?= $value['combinedKey'];  ?></td>
                <td class="text-center"><span class="badge badge-danger"><?= number_format($value['confirmed'], 0, ",", "."); ?></span></td>
                <td class="text-center"><span class="badge badge-success"><?= number_format($value['recovered'], 0, ",", "."); ?></span></td>
                <td class="text-center"><span class="badge badge-warning"><?= number_format($value['deaths'], 0, ",", "."); ?></span></td>
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