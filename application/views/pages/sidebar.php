<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('index.php/Welcome') ?>" class="brand-link">
      <img src="<?php echo base_url();?>assets/images/google.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><center><h5><b>DASHBOARD</b></h5></center></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>assets/template/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nama_user')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 text-sm">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('Welcome') ?>" class="nav-link <?php if($this->uri->segment(1)=="Welcome"){echo "active";}?>">
              <i class="nav-icon fas fa-tachometer-alt text-danger"></i>
              <p>
                Dashboard
                <span class="right badge badge-warning">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($this->uri->segment(1)=="Members" OR $this->uri->segment(1)=="Amwal" OR $this->uri->segment(1)=="Zakat_fitrah" OR $this->uri->segment(1)=="Qurban"){echo "menu-open";}?>">
            <a href="<?php echo base_url('Members') ?>" class="nav-link <?php if($this->uri->segment(1)=="Members" OR $this->uri->segment(1)=="Amwal" OR $this->uri->segment(1)=="Zakat_fitrah" OR $this->uri->segment(1)=="Qurban"){echo "active";}?>">
              <i class="nav-icon fas fa-th text-danger"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>Table Anggota</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo base_url('Members') ?>" class="nav-link <?php if($this->uri->segment(1)=="Members"){echo "active";}?>">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>Tabel Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Amwal') ?>" class="nav-link <?php if($this->uri->uri_string()=="Amwal"){echo "active";}?>">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>Tabel Amwal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Zakat_fitrah') ?>" class="nav-link <?php if($this->uri->segment(1)=="Zakat_fitrah"){echo "active";}?>">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>Tabel Zakat Fitrah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Qurban') ?>" class="nav-link <?php if($this->uri->segment(1)=="Qurban"){echo "active";}?>">
                  <i class="far fa-circle nav-icon text-pink"></i>
                  <p>Tabel Qurban</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->