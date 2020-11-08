<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Zakat Fitrah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Zakat Fitrah</li>
            </ol>
          </div>
        </div>
        <?php
        $success = $this->session->flashdata('success');
        if ($success) {
            echo '<div class="alert alert-success text-center"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> '.$success.'</div>';
      } ?>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Tabel Zakat Fitrah</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form id="form-filter_zakat_fitrah" class="form-horizontal">
                      <div class="form-group">
                        <label for="nama_zakat_fitrah">Nama</label>
                        <input type="text" class="form-control col-sm-3" id="nama_zakat_fitrah" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="tgl_zakat_fitrah">Tanggal <span><font color="orange" class="text-xs"> *Contoh Format Tahun-Bulan | 2020-12</font></span></label>
                        <input type="text" class="form-control col-sm-3" id="tgl_zakat_fitrah" autocomplete="off" data-inputmask='"mask": "9999-99"' data-mask>
                      </div>
                      <!-- <div class="form-group">
                        <div class="col-sm-3">
                          <center>
                            <button type="button" id="btn-filter_zakat_fitrah" class="btn btn-sm btn-success">Search</button>
                            <button type="button" id="btn-reset_zakat_fitrah" class="btn btn-sm btn-warning">Reset</button>
                          </center>
                        </div>
                      </div> -->
                    </form>
                  </div>
                </div>
                <table id="table_zakat_fitrah" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No ID</th>
                    <th>RT</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Nama Muzaki</th>
                    <th>Nominal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- <?php 
                  $no = 1;
                  $total_sum = 0;
                  foreach($zakat_fitrah as $zf) { 
                  $no = $no++;
                  $total_sum+=$zf->nominal_zakat_fitrah;
                  ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><b><font color="red"><?php echo $zf->no_id ?> | <?php echo $zf->nama ?></font></b></td>
                  <td><?php echo date("d F Y", strtotime($zf->tgl_zakat_fitrah)) ?></td>
                  <td><?php echo $zf->status_zakat_fitrah ?></td>
                  <td><?php echo $zf->muzaki_zakat_fitrah ?></td>
                  <td>Rp <?php echo number_format($zf->nominal_zakat_fitrah,0,',','.') ?></td>
                </tr>
                    <?php } ?> -->
                  </tbody>  
                  <tfoot>
                    <?php 
                    $no = 1;
                    $total_sum = 0;
                    foreach($zakat_fitrah as $zf) { 
                    $no = $no++;
                    $total_sum+=$zf->nominal_zakat_fitrah;
                    } ?>
                    <th colspan="6"><center>GRAND TOTAL</center></th>
                    <th>Rp <?php echo number_format($total_sum,0,',','.') ?></th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper