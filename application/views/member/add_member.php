<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member</li>
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
                <h3 class="card-title">Form Member</h3>
              </div>
              <!-- /.card-header -->
              <form action="<?php echo base_url('Members/insert_biodata'); ?>" enctype="multipart/form-data" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="card-body">
                <div class="form-group">
                    <label>ID</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card-alt text-success"></i></span>
                    </div>
                    <input class="form-control" type="number" name="no_id_member" placeholder="Masukkan ID" required oninvalid="this.setCustomValidity('Kolom ID harus diisi')" oninput="setCustomValidity('')">
                    </div>
                    <?= form_error('no_id_member', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>RT</label>
                    <input class="form-control" name="rt" placeholder="Masukkan RT" required oninvalid="this.setCustomValidity('Kolom rt harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('rt', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>PKL</label>
                    <input class="form-control" name="pkl" placeholder="Masukkan PKL" required oninvalid="this.setCustomValidity('Kolom pkl harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('pkl', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" name="nama" placeholder="Masukkan Nama" required oninvalid="this.setCustomValidity('Kolom nama harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                        <p>
                        <label>
                          <input type="radio" name="jenis_kelamin" value="laki-laki">
                          &nbsp;Laki - laki
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="jenis_kelamin" value="perempuan">
                          &nbsp;Perempuan
                        </label> 
                        </p>
                  </div>
                  <div class="form-group">
                    <label>No. HP</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt text-success"></i></span>
                    </div>
                    <input class="form-control" type="text" name="no_telp" placeholder="Masukkan No. HP" data-inputmask='"mask": "089999999999"' data-mask required oninvalid="this.setCustomValidity('Kolom no_telp harus diisi')" oninput="setCustomValidity('')">
                    </div>
                    <?= form_error('no_telp', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="4" name="alamat" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('Kolom alamat harus diisi')" oninput="setCustomValidity('')"></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <!-- <div class="form-group">
                    <label>Status</label>
                    <?php 
                      $option_status = array();
                      $option_status[''] = '-- Pilih --';
                      $option_status['Belum Menikah'] = 'Belum Menikah';
                      $option_status['Sudah Menikah'] = 'Sudah Menikah';
                      ?>

                    <?php echo form_dropdown('status', $option_status,'status', 'id="status" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"'); ?>
                    <?= form_error('status', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div> -->

                  <div class="form-group">
                    <label for="status">Status</label>
                        <p>
                        <label>
                          <input type="radio" name="status" value="belum">
                          &nbsp;Belum Menikah
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="status" value="sudah">
                          &nbsp;Sudah Menikah
                        </label> 
                        </p>

                        <?php 
                        $style = 'style="display: none; margin-top: 15px;padding-left: 0px;"';
                        if ($status == 'sudah'){
                          $style = 'style="margin-top: 15px;padding-left: 0px;"';
                        }
                        ?>
                      <?php echo form_error('status') ?>
                      <div id="pasangan" class="col-sm-5" <?php echo $style ?>>
                        <label>Nama Pasangan</label>
                        <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-ring text-success"></i></span>
                                </div>
                        <input type="text" placeholder="Masukkan Nama Pasangan" class="form-control text-sm" id="nama_pasangan" name="nama_pasangan">
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label>Pendidikan</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-school text-success"></i></span>
                    </div>
                    <input class="form-control" name="pendidikan" placeholder="Masukkan Pendidikan" required oninvalid="this.setCustomValidity('Kolom pendidikan harus diisi')" oninput="setCustomValidity('')">
                    </div>
                    <?= form_error('pendidikan', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Pekerjaan</label>
                      <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="pekerjaan" required oninvalid="this.setCustomValidity('Pekerjaan harus diisi')" oninput="setCustomValidity('')">
                        <option value="">Pilih Pekerjaan</option>
                        <?php
                        if(@$data_pekerjaan) :
                          foreach ($data_pekerjaan as $pekerjaan) :    
                            ?>
                            <option value="<?= $pekerjaan->id_pekerjaan ?>" <?php if($pekerjaan == $pekerjaan->id_pekerjaan) {echo "selected";} ?>><?= strtoupper($pekerjaan->nama_pekerjaan) ?>
                          </option>
                          <?php
                        endforeach;
                      endif;
                      ?>
                    </select>
                    <?php echo form_error('pekerjaan') ?>
                  </div>
                  <div class="form-group">
                  <label class="control-label">Tanggal Lahir</label>
                  <div class="input-group">
                  <input class="form-control" id="datepicker" type="text" name="tanggal_lahir" placeholder="Pilih tanggal lahir" autocomplete="off">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="icon fa fa-calendar"></i></span></div>
                  <?= form_error('tanggal_lahir', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <!-- <div class="form-group">
                    <label>usia</label>
                    <input class="form-control" name="usia" placeholder="Masukkan usia" required oninvalid="this.setCustomValidity('Kolom usia harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('usia', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div> -->
                  <div class="form-group">
                  <label>Tanggal Daftar</label>
                  <div class="input-group">
                  <input class="form-control" id="datepicker2" type="text" name="tanggal_daftar" placeholder="Pilih tanggal daftar" autocomplete="off">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="icon fa fa-calendar"></i></span></div>
                  <?= form_error('tanggal_daftar', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>SGM</label>
                    <input class="form-control" name="sgm" placeholder="Masukkan SGM" required oninvalid="this.setCustomValidity('Kolom SGM harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('sgm', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>SL-CS</label>
                    <input class="form-control" name="sl_cs" placeholder="Masukkan SL-CS" required oninvalid="this.setCustomValidity('Kolom SL-CS harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('sl_cs', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <!-- <div class="form-group">
                    <label>umur</label>
                    <input class="form-control" name="umur" placeholder="Masukkan umur" required oninvalid="this.setCustomValidity('Kolom umur harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('umur', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div> -->
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i> Submit</button>
              <a href="<?php echo base_url('Members') ?>" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancel</a>
              </div>
            </div>
          </form>
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