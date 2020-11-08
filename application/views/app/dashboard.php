<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">
		<!-- <h2 style="margin-top:0px">Home</h2> -->

		<div class="row">
			<div class="col-md-4 text-center"></div>
			<div class="col-md-4 text-center">
				<div style="margin-top: 8px" id="message">
					<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
				</div>
			</div>
			</div>		

		<div class="row">		

			<div class="col-md-12">

				<div class="box box-warning">
					<center>
						<br>
						<p><img class="logo-poltekpos" src="<?php echo base_url('assets/images/poltekpos.png'); ?>" width="288px"></p>
						<br>
						<h3 class="box-title"><b>DASHBOARD</b><br>PENERIMAAN MAHASISWA BARU</h3>
					</center>

					<div class="box-header">
					<?php 
		              $id = $this->session->userdata('nisn');
		              $row = $this->Mahasiswa_model->get_by_id_nisn($id);
		              if (is_null($row)) { ?>
		            <h3 class="box-title"><b>Hai! <?php echo $nama_mhs; ?></b>, selamat datang di Dashboard Pendaftaran <?php echo $perguruan_tinggi; ?> 2020/2021. </h3>
		            <?php } else { ?>
                	<h3 class="box-title"><b>Hai! <?php echo $nama_lengkap; ?></b>, selamat datang di Dashboard Pendaftaran <?php echo $perguruan_tinggi; ?> 2020/2021. </h3>
                	<?php } ?>
					</div>

					<div class="box-header with-border box box-primary">
					<i class="fa fa-bullhorn"></i>
                	<h3 class="box-title">Informasi</h3>
					</div>

					<div class="box-body">
						<?php 
			              $id = $this->session->userdata('nisn');
			              $row = $this->Mahasiswa_model->get_by_id_nisn($id);
			              if (is_null($row)) { ?>
				        <table>
							<tr>
								<td width="120px">Nama</td><td width="320px">: <?php echo $nama_mhs; ?></td>	
								<td width="120px">Jenis Kelamin</td><td>: <?php echo $jk_mhs; ?></td>
							</tr>

							<tr>
								<td>NISN</td><td>: <?php echo $nisn_mhs; ?></td>
								<td>Jalur</td><td>: <?php echo strtoupper($jalur); ?><b> (<?php echo strtoupper($perguruan_tinggi); ?>)</b></td>
							</tr>

							<tr>
								<td>No HP</td><td>: <?php echo $hp_mhs; ?></td>
								<td>Email</td><td>: <?php echo $email_mhs; ?></td>
							</tr>
							<!-- <tr><td>&nbsp;</td><td></td><td></td><td></td></tr> -->
						</table>
				            <?php } else { ?>
						<table>
							<tr>
								<td width="120px" rowspan="4"><img src="<?php echo base_url ('../uploads/'.$nomor_ujian.'/'.$photo); ?>" style="width: 3cm; height: 4cm;"></td>
								<!-- <td rowspan="4"></td> -->
							</tr>
							
							<tr>
								<td width="60px">Nama</td><td width="210px">: <?php echo $nama_lengkap; ?></td>	
								<td width="100px">Jenis Kelamin</td><td>: <?php echo $jenis_kelamin; ?></td>
							</tr>

							<tr>
								<td>NISN</td><td>: <?php echo $nisn; ?></td>
								<td>Jalur</td><td>: <?php echo strtoupper($jalur); ?><b> (<?php echo strtoupper($perguruan_tinggi); ?>)</b></td>
							</tr>

							<tr>
								<td>No HP</td><td>: <?php echo $telephone; ?></td>
								<td>Email</td><td>: <?php echo $email; ?></td>
							</tr>
							<!-- <tr><td>&nbsp;</td><td></td><td></td><td></td></tr> -->
						</table>
						<?php } ?>
						<br>

					</div> 

					<div class="box-header box box-primary">
					<i class="fa fa-info-circle"></i>
                	<h3 class="box-title">Petunjuk</h3>
					</div>
					<!-- <center><h3><b>Scan QR Code</b></h3></center> -->

					<div class="box-body">
						<!-- BUTTON -->
						<table>
							<tr>
								<td><center><a href="#" style="float: left;" class="btn btn-success"><i class="fa fa-envelope"> Tutorial Pendaftaran</i></a></center></td>
							</tr>

							<tr>
								<td><center><br><a href="#" style="float: left;" class="btn btn-success"><i class="fa fa-book"> E-Book Panduan Pendaftaran</i></a></center></td>
							</tr>
							<tr>
								<td><center><br><a href="#" style="float: left;" class="btn btn-success"><i class="fa fa-book"> E-Book Panduan Daftar Ulang</i></a></center></td>
							</tr>
							<tr>
								<td><center><br><a href="#" style="float: left;" class="btn btn-success"><i class="fa fa-download"> Download Surat Pernyataan Daftar Ulang</i></a></center></td>
							</tr>
							<tr>
								<td><center><br><a href="#" style="float: left;" class="btn btn-success"><i class="fa fa-whatsapp"> Layanan Konsultasi via WhatsApps</i></a></center></td>
							</tr>
						</table>
						<!-- QR CODE -->
						<!-- <table>
							<tr>
								<td width="520px"><center><img src="<?php echo base_url ('assets/barcode/home/barcode.gif'); ?>" width="130px;"><br><br>Tutorial Pendaftaran</center></td>
								<td width="520px"><center><img src="<?php echo base_url ('assets/barcode/home/barcode.gif'); ?>" width="130px;"><br><br>E-Book Panduan Daftar Ulang</center></td>
								<td width="520px"><center><img src="<?php echo base_url ('assets/barcode/home/barcode.gif'); ?>" width="130px;"><br><br>Layanan Konsultasi via WhatsApps</center></td>
							</tr>

							<tr>
								<td><center><br><img src="<?php echo base_url ('assets/barcode/home/barcode.gif'); ?>" width="130px;"><br><br>E-Book Panduan Pendaftaran</center></td>
								<td><center><br><img src="<?php echo base_url ('assets/barcode/home/barcode.gif'); ?>" width="130px;"><br><br>Download Surat Pernyataan Daftar Ulang</center></td>
								<td></td>
							</tr>
						</table> -->

						<br><br>

					</div>				

				</div>
			</div> 
		</div>


	</section>

</div>