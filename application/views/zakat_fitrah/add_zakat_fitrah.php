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
                <h3 class="card-title">Insert Zakat Fitrah</h3>
              </div>
              <!-- /.card-header -->
              <form action="<?php echo base_url('Zakat_fitrah/insert_zakat_fitrah'); ?>" enctype="multipart/form-data" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <input class="form-control" type="hidden" name="no_id" value="<?php echo $formx->no_id ?>">
              <div class="card-body">
                  <div class="form-group">
                    <label>Member</label>
                     <input class="form-control" value="<?php echo $formx->no_id ?> | <?php echo $formx->nama ?>" readonly>
                     <?= form_error('no_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group">
                    <input class="form-control" id="datepicker2" type="text" name="tgl_zakat_fitrah" autocomplete="off" required>
                    <div class="input-group-prepend"><span class="input-group-text"><i class="icon fa fa-calendar"></i></span></div>
                    </div>
                    <?= form_error('tgl_zakat_fitrah', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="status_zakat_fitrah1" name="status_zakat_fitrah" value="Dewasa" <?php if($this->input->post('status_zakat_fitrah') == 'Dewasa') {echo 'checked';} ?> >
                      <label for="status_zakat_fitrah1" class="custom-control-label">Dewasa</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="status_zakat_fitrah2" name="status_zakat_fitrah" value="Anak-anak" <?php if($this->input->post('status_zakat_fitrah') == 'Anak-anak') {echo 'checked';} ?>>
                    <label for="status_zakat_fitrah2" class="custom-control-label">Anak-anak</label>
                    </div>
                    <?= form_error('status_zakat_fitrah', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Nama Muzaki</label>
                    <input class="form-control" name="muzaki_zakat_fitrah" placeholder="Masukkan Nama Muzaki" required oninvalid="this.setCustomValidity('Kolom Nama Muzaki harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('muzaki_zakat_fitrah', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Nominal Zakat Fitrah</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input class="form-control" name="nominal_zakat_fitrah" required oninvalid="this.setCustomValidity('Kolom Nominal Zakat Fitrah harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('nominal_zakat_fitrah', '<small class="text-danger pl-2">', '</small>'); ?>
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