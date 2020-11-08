<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Member</li>
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
                <h3 class="card-title">Table Detail Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="6px">No</th>
                    <th>No ID</th>
                    <th>RT</th>
                    <th width="20px">Jenis kelamin</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th width="10px">Pendidikan</th>
                    <th width="20px">Pekerjaan</th>
                    <th width="80px">Tanggal Lahir</th>
                    <th width="20px">Usia</th>
                    <th width="80px">Tanggal Daftar</th>
                    <th width="20px">Umur</th>
                    <th width="10px">SGM</th>
                    <th width="10px">SL-CS</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach($form as $f) { 
                  $dateOfReg = $f->tanggal_daftar;
                  $today = date("Y-m-d");
                  $diff = date_diff(date_create($dateOfReg), date_create($today));
                  $no = $no++;?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $f->no_id ?><br><b><font color="red">(<?php echo $f->nama ?>)</font></b></td>
                  <td><?php echo $f->rt ?></td>
                  <td><?php echo strtoupper($f->jenis_kelamin) ?></td>
                  <td><?php echo $f->no_telp ?></td>
                  <td><?php echo $f->alamat ?></td>
                  <?php if ($f->status=="sudah") : ?>
                  <td>Sudah Menikah<br>(<?php echo $f->nama_pasangan ?>)</td>
                  <?php else : ?>
                  <td>Belum Menikah</td>
                  <?php endif ?>
                  <td><?php echo $f->pendidikan ?></td>
                  <td><?php echo $f->nama_pekerjaan ?></td>
                  <td><?php echo date('d F Y', strtotime($f->tanggal_lahir))?></td>
                  <td><?php echo $f->usia ?> Thn</td>
                  <td><?php echo date('d F Y', strtotime($f->tanggal_daftar)) ?></td>
                  <td><?php echo $diff->format('%y') ?> Thn</td>
                  <td><?php echo $f->sgm ?></td>
                  <td><?php echo $f->sl_cs ?></td>
                </tr>
                    <?php } ?>
                  </tbody>  
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