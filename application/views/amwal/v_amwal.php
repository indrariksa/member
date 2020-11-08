<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Amwal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Amwal</li>
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
                <h3 class="card-title">Tabel Amwal</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form id="form-filter_amwal" class="form-horizontal">
                      <div class="form-group">
                        <label for="nama_amwal">Nama</label>
                        <input type="text" class="form-control col-sm-3" id="nama_amwal" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="tgl_amwal">Tanggal <span><font color="orange" class="text-xs"> *Contoh Format Tahun-Bulan | 2020-12</font></span></label>
                        <input type="text" class="form-control col-sm-3" id="tgl_amwal" autocomplete="off" data-inputmask='"mask": "9999-99"' data-mask>
                      </div>
                      <!-- <div class="form-group">
                        <div class="col-sm-3">
                          <center>
                            <button type="button" id="btn-filter_amwal" class="btn btn-sm btn-success">Search</button>
                            <button type="button" id="btn-reset_amwal" class="btn btn-sm btn-warning">Reset</button>
                          </center>
                        </div>
                      </div> -->
                    </form>
                  </div>
                </div>
                <table id="table_amwal" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No ID</th>
                    <th>RT</th>
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
                  <!-- <?php 
                  $no = 1;
                  $total_sum = 0;
                  foreach($amwal as $amw) { 
                  $no = $no++;
                  $jumlah = $amw->in_amwal+$amw->zm_amwal+$amw->sh_amwal+$amw->ze_amwal+$amw->ln_amwal;
                  $total_sum+=$jumlah;
                  ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><b><font color="red"><?php echo $amw->no_id ?> <br>(<?php echo $amw->nama ?>)</font></b></td>
                  <td><?php echo date("d F Y", strtotime($amw->bulan_amwal)) ?></td>
                  <td><?php echo $amw->mbi_amwal ?></td>
                  <td>Rp <?php echo number_format($amw->in_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->zm_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->sh_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->ze_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($amw->ln_amwal,0,',','.') ?></td>
                  <td>Rp <?php echo number_format($jumlah,0,',','.') ?></td>
                </tr>
                    <?php } ?> -->
                  </tbody>  
                  <tfoot>
                    <?php 
                    $total_sum = 0;
                    foreach($amwal as $amw) { 
                    $jumlah = $amw->in_amwal+$amw->zm_amwal+$amw->sh_amwal+$amw->ze_amwal+$amw->ln_amwal;
                    $total_sum+=$jumlah;
                     } ?>
                    <th colspan="10"><center>GRAND TOTAL</center></th>
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