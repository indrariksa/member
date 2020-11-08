<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Amwal Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Amwal Detail</li>
            </ol>
          </div>
        </div>
        <?php
        $success = $this->session->flashdata('success');
        $gagal = $this->session->flashdata('gagal');
        if ($success) {
            echo '<div class="alert alert-success text-center"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> '.$success.'</div>';
        } elseif ($gagal) {
            echo '<div class="alert alert-danger text-center"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> '.$gagal.'</div>';
        }
      ?>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Tabel Amwal Detail</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <a href="<?php echo base_url('Members') ?>" class="btn btn-xs btn-warning"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p><a class="btn btn-primary icon-btn" href="<?php echo site_url('Amwal/form_amwal/'.$formx->no_id) ?>"><i class="fa fa-plus"></i> Tambah Data</a></p>
                <table id="amwal" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No ID</th>
                    <th>Bulan</th>
                    <th>MBI</th>
                    <th>IN</th>
                    <th>ZM</th>
                    <th>SH</th>
                    <th>ZE</th>
                    <th>LN</th>
                    <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  $total_sum = 0;
                  foreach($amwal as $amw) { 
                  $no = $no++;
                  $jumlah = $amw->in_amwal+$amw->zm_amwal+$amw->sh_amwal+$amw->ze_amwal+$amw->ln_amwal;
                  $total_sum+=$jumlah;
                  ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><b><font color="red"><?php echo $amw->no_id ?> | <?php echo $amw->nama ?></font></b></td>
                  <td><?php echo date("d F Y", strtotime($amw->bulan_amwal)) ?></td>
                  <td><?php echo $amw->mbi_amwal ?></td>
                  <td>Rp <?php echo number_format($amw->in_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->zm_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->sh_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->ze_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->ln_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($jumlah,0,',','.') ?></td>
                </tr>
                    <?php } ?>
                  </tbody>  
                  <thead>
                    <th colspan="9"><center>GRAND TOTAL (SEMUA BARIS)</center></th>
                    <th>Rp <?php echo number_format($total_sum,0,',','.') ?></th>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Tabel Zakat Fitrah Detail</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p><a class="btn btn-primary icon-btn" href="<?php echo site_url('Zakat_fitrah/form_zakat_fitrah/'.$formx->no_id) ?>"><i class="fa fa-plus"></i> Tambah Data</a></p>
                <table id="zakat_fitrah" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No ID</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Nama Muzaki</th>
                    <th>Nominal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
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
                    <?php } ?>
                  </tbody>  
                  <thead>
                    <th colspan="5"><center>GRAND TOTAL (SEMUA BARIS)</center></th>
                    <th>Rp <?php echo number_format($total_sum,0,',','.') ?></th>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Tabel Qurban Detail</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p><a class="btn btn-primary icon-btn" href="<?php echo site_url('Qurban/form_qurban/'.$formx->no_id) ?>"><i class="fa fa-plus"></i> Tambah Data</a></p>
                <table id="qurban" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No ID</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Kelas</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  $total_sum = 0;
                  foreach($qurban as $qrb) { 
                  $no = $no++;
                  $total_sum+=$qrb->nominal_qurban;
                  ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><b><font color="red"><?php echo $qrb->no_id ?> | <?php echo $qrb->nama ?></font></b></td>
                  <td><?php echo date("d F Y", strtotime($qrb->tgl_qurban)) ?></td>
                  <td><?php echo $qrb->jenis_qurban ?></td>
                  <td><?php echo $qrb->kelas_qurban ?></td>
                  <td>Rp <?php echo number_format($qrb->nominal_qurban,0,',','.') ?></td>
                </tr>
                    <?php } ?>
                  </tbody>  
                  <thead>
                    <th colspan="5"><center>GRAND TOTAL (SEMUA BARIS)</center></th>
                    <th>Rp <?php echo number_format($total_sum,0,',','.') ?></th>
                  </thead>
                </table>
              </div>
              <div class="card-footer">
              <a href="<?php echo base_url('Members') ?>" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
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