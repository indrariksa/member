<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Jalur</th>
                    <th>Program Studi</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>NISN</th>
                    <th>Kota</th>
                    <th width="90px">Tgl Daftar</th>
                    <th width="160px" style="text-align:center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                    foreach($mahasiswa_data as $mahasiswa) { 
                    $no = $no++;
                    $kode_program = $mahasiswa->program_studi_1;
                    $program = $this->db->query("SELECT * FROM program_studi where kode_program_studi = '$kode_program'")->row();
                    $tanggal_daftar = date("d-m-Y", strtotime($mahasiswa->tanggal_daftar));
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                  <td><?php echo $mahasiswa->tahun ?></td>
                  <td style="text-transform: uppercase;"><?php echo $mahasiswa->jalur ?></td>
                  <td>
                    <?php 
                    echo anchor(site_url('mahasiswa/read/'.$mahasiswa->id), $program->program_studi, 'class=""'); 
                    ?>
                  </td>
                  <td>
                    <?php 
                    echo anchor(site_url('mahasiswa/read/'.$mahasiswa->id), $mahasiswa->nama_lengkap, 'class=""'); 
                    ?>
                  </td>
                  <td><?php echo $mahasiswa->jenis_kelamin ?></td>
                  <td><?php echo $mahasiswa->nisn ?></td>
                  <?php if(is_null($mahasiswa->kelurahan) AND (is_null($mahasiswa->kecamatan))) : ?>
                  <td><?php echo $mahasiswa->kota ?></td>
                  <?php else : ?>
                    <td><?php echo strtoupper($mahasiswa->nama_kabupaten) ?></td>
                  <?php endif ?>
                  <td><?php echo $tanggal_daftar ?></td>


                  <td style="text-align:center">
                    <?php 
                    echo anchor(site_url('mahasiswa/set_lulus/'.$mahasiswa->id),'Lulus', 'onclick="return confirm('."'".'Apakah anda yakin '.$mahasiswa->nama_lengkap.' Lulus ?'."'".');" class="btn btn-success btn-sm"'); 
                  
                    if (strtolower($mahasiswa->jalur) == 'reguler'){
                      echo " | ";
                      echo anchor(site_url('mahasiswa/send_nomor_ujian/'.$mahasiswa->id),'Send Email', 'onclick="return confirm('."'".'Apakah anda yakin '.$mahasiswa->nama_lengkap.' akan dikirim nomor ujian ?'."'".');" class="btn btn-info btn-sm"'); 
                    }
                    ?>
                  </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-danger card-outline">
              <div class="card-header">

                <h3 class="card-title"><i class="fa fa-info-circle"></i> Laporan Sederhana (Tahun 2020/2021)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            <div class="box box-warning">
              <div class="box-body">
                <table>
                  <tr>
                    <td colspan="2"><b>Data Calon Mahasiswa</b></td>
                  </tr>
                  <tr>
                    <td width="350px">Jumlah Pendaftar Keseluruhan</td>
                    <td width="120px">: <?php echo $jml_mhs;?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Pendaftar Laki-Laki</td>
                    <td>: <?php echo $jml_mhs_laki;?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Pendaftar Perempuan</td>
                    <td>: <?php echo $jml_mhs_perempuan;?> Orang</td>
                  </tr>
                </table>
                <br>

                <table>
                  <tr>
                    <td colspan="2"><b>Data Jalur Pendaftaran</b></td>
                  </tr>
                  <tr>
                    <td width="350px">Jumlah Pendaftar Jalur PMDK</td>
                    <td width="120px">: <?php echo $jml_mhs_pmdk;?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Pendaftar Jalur Reguler</td>
                    <td>: <?php echo $jml_mhs_reguler;?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Pendaftar Jalur Undangan</td>
                    <td>: <?php echo $jml_mhs_undangan;?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Pendaftar Jalur Mandiri</td>
                    <td>: <?php echo $jml_mhs_mandiri;?> Orang</td>
                  </tr>
                  <tr>
                    <td>Jumlah Pendaftar Jalur Beasiswa</td>
                    <td>: <?php echo $jml_mhs_beasiswa;?> Orang</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>

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