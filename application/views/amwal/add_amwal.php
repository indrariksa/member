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
                <h3 class="card-title">Insert Amwal</h3>
              </div>
              <!-- /.card-header -->
              <form action="<?php echo base_url('Amwal/insert_amwal'); ?>" enctype="multipart/form-data" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <input class="form-control" type="hidden" name="no_id" value="<?php echo $formx->no_id ?>">
              <div class="card-body">
                  <div class="form-group">
                    <label>Member</label>
                     <input class="form-control" value="<?php echo $formx->no_id ?> | <?php echo $formx->nama ?>" readonly>
                     <?= form_error('no_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Bulan</label>
                    <div class="input-group">
                    <input class="form-control" id="datepicker2" type="text" name="bulan_amwal" autocomplete="off" required>
                    <div class="input-group-prepend"><span class="input-group-text"><i class="icon fa fa-calendar"></i></span></div>
                    </div>
                    <?= form_error('bulan_amwal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>MBI</label>
                    <input class="form-control" name="mbi_amwal" required oninvalid="this.setCustomValidity('Kolom MBI harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('mbi_amwal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>IN</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input class="form-control" name="in_amwal" oninvalid="this.setCustomValidity('Kolom IN harus diisi')" oninput="setCustomValidity('')">
                    </div>
                    <?= form_error('in_amwal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>ZM</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input class="form-control" name="zm_amwal" oninvalid="this.setCustomValidity('Kolom ZM harus diisi')" oninput="setCustomValidity('')">
                    </div>
                    <?= form_error('zm_amwal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>SH</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input class="form-control" name="sh_amwal" oninvalid="this.setCustomValidity('Kolom SH harus diisi')" oninput="setCustomValidity('')">
                    </div>
                    <?= form_error('sh_amwal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>ZE</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input class="form-control" name="ze_amwal" oninvalid="this.setCustomValidity('Kolom ZE harus diisi')" oninput="setCustomValidity('')">
                    </div>
                    <?= form_error('ze_amwal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>LN</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    <input class="form-control" name="ln_amwal" oninvalid="this.setCustomValidity('Kolom LN harus diisi')" oninput="setCustomValidity('')">
                    <?= form_error('ln_amwal', '<small class="text-danger pl-2">', '</small>'); ?>
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