<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Qurban</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Qurban</li>
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
                <h3 class="card-title">Insert Qurban</h3>
              </div>
              <!-- /.card-header -->
              <form action="<?php echo base_url('Qurban/insert_qurban'); ?>" enctype="multipart/form-data" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <input class="form-control" type="hidden" name="no_id" value="<?php echo $formx->no_id ?>">
              <div class="card-body">
                  <div class="form-group">
                    <label>Member</label>
                     <input class="form-control" value="<?php echo $formx->no_id ?> | <?php echo $formx->nama ?>" readonly>
                     <?= form_error('no_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Qurban</label>
                    <div class="input-group">
                    <input class="form-control" id="datepicker2" type="text" name="tgl_qurban" autocomplete="off" required>
                    <div class="input-group-prepend"><span class="input-group-text"><i class="icon fa fa-calendar"></i></span></div>
                    </div>
                    <?= form_error('tgl_qurban', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Jenis</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="jenis_qurban1" name="jenis_qurban" value="Harta" <?php if($this->input->post('jenis_qurban') == 'Harta') {echo 'checked';} ?> >
                      <label for="jenis_qurban1" class="custom-control-label">Harta</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="jenis_qurban2" name="jenis_qurban" value="Sapi" <?php if($this->input->post('jenis_qurban') == 'Sapi') {echo 'checked';} ?>>
                    <label for="jenis_qurban2" class="custom-control-label">Sapi</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="jenis_qurban3" name="jenis_qurban" value="Domba" <?php if($this->input->post('jenis_qurban') == 'Domba') {echo 'checked';} ?>>
                    <label for="jenis_qurban3" class="custom-control-label">Domba</label>
                    </div>
                    <?= form_error('jenis_qurban', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input class="form-control" name="kelas_qurban" placeholder="Masukkan Kelas" required oninvalid="this.setCustomValidity('Kolom Kelas harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('kelas_qurban', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Nominal Qurban</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input class="form-control" name="nominal_qurban" required oninvalid="this.setCustomValidity('Kolom Nominal Qurban harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('nominal_qurban', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i> Submit</button>
              <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancel</a>
            </div>
          </form>
            <!-- /.card -->
          </div>
          <!-- /.col -->

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