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
                <h3 class="card-title">Tabel Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p><a class="btn btn-primary icon-btn" href="<?php echo base_url('Members/insert_biodata');?>"><i class="fa fa-plus"></i> Tambah Data</a></p>
                <div class="row">
                  <div class="col-md-12">
                    <form id="form-filter_member" class="form-horizontal">
                      <div class="form-group">
                        <label for="nama_member">Nama</label>
                        <input type="text" class="form-control col-sm-3" id="nama_member" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="rt_member">RT</label>
                        <input type="text" class="form-control col-sm-3" id="rt_member" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <div class="col-sm-3">
                          <center>
                            <button type="button" id="btn-filter_member" class="btn btn-sm btn-success">Search</button>
                            <button type="button" id="btn-reset_member" class="btn btn-sm btn-warning">Reset</button>
                          </center>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <table id="table_member" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="6px">No</th>
                    <th width="50px">No ID</th>
                    <th width="100px">Nama</th>
                    <th width="10px">RT</th>
                    <th width="10px">PKL</th>
                    <th width="50px" style="text-align: center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
        
                  </tbody>  
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