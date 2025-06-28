<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ghifa Express</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/jquery-bar-rating/css-stars.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
     <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="<?= base_url(); ?>/assets/images/logo.png" alt="profile">
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                <span class="fw-semibold mb-1 mt-2 text-center">Ghifa Express</span>
              
              </div>
            </a>
          </li>
       
         
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/index'); ?>">
              <i class="fa fa-dashboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/harga_umum'); ?>">
              <i class="fa fa-money menu-icon"></i>
              <span class="menu-title">Harga Umum</span>
            </a>
          </li>
       <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/jabatan'); ?>">
              <i class="fa fa-folder menu-icon"></i>
              <span class="menu-title">Jabatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/karyawan'); ?>">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Karyawan</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/pelanggan'); ?>">
              <i class="fa fa-address-card menu-icon"></i>
              <span class="menu-title">Pelanggan</span>
            </a>
          </li>
             <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/penerima'); ?>">
              <i class="fa fa-address-book menu-icon"></i>
              <span class="menu-title">Penerima</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/bttb'); ?>">
              <i class="fa fa-file menu-icon"></i>
              <span class="menu-title">BTTB</span>
            </a>
          </li>
             <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/surat_jalan'); ?>">
              <i class="fa fa-truck menu-icon"></i>
              <span class="menu-title">Surat Jalan</span>
            </a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator/laporan'); ?>">
              <i class="fa fa-book menu-icon"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../../<?= base_url(); ?>/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
         
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-logout d-none d-md-block me-3">
                <a class="nav-link" href="#">Tahun <?= $tahun=$this->session->userdata('tahun'); ?></a>
              </li>
              <li class="nav-item nav-logout d-none d-md-block">
                 <a class="btn btn-sm btn-danger" href="<?= base_url('login/logout'); ?>">Logout</a>
              </li>
           
            
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper pb-0">
        
                <?= $contents ?>
                <!-- /.container-fluid -->

         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url(); ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
     <script src="<?= base_url(); ?>/assets/vendors/select2/select2.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/flot/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>/assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>/assets/js/misc.js"></script>
    <script src="<?= base_url(); ?>/assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>/assets/js/todolist.js"></script>
    <script src="<?= base_url(); ?>/assets/js/hoverable-collapse.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url(); ?>/assets/js/proBanner.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dashboard.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.bootstrap4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js"></script>
           <script src="<?= base_url(); ?>/assets/js/select2.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!-- End custom js for this page -->
  </body>
</html>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart',
   type: 'column',
  },
  title: {
   text: 'Pendapatan Tahun <?= $tahun=$this->session->userdata('tahun'); ?> ',
   x: -20
  },
  subtitle: {
   text: '',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
  },
  yAxis: {
   title: {
    text: 'Total Pendapatan'
   }
  },
  series: [{
   name: 'BTTB',
   data: <?php echo json_encode($grafik_transaksi); ?>,
   color: 'red'
 
  }
  
  ]
 });
}); 
</script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'bttb',
   type: 'line',
  },
  title: {
   text: 'BTTB Tahun <?= $tahun=$this->session->userdata('tahun'); ?> ',
   x: -20
  },
  subtitle: {
   text: '',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
  },
  yAxis: {
   title: {
    text: 'Total BTTB'
   }
  },
  series: [{
   name: 'BTTB',
   data: <?php echo json_encode($grafik_bttb); ?>,
   color: 'blue'
 
  }
  
  ]
 });
}); 
</script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'sj',
   type: 'bar',
  },
  title: {
   text: 'Surat Jalan Tahun <?= $tahun=$this->session->userdata('tahun'); ?> ',
   x: -20
  },
  subtitle: {
   text: '',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
  },
  yAxis: {
   title: {
    text: 'Total Surat Jalan'
   }
  },
  series: [{
   name: 'Surat Jalan',
   data: <?php echo json_encode($grafik_surat_jalan); ?>,
   color: 'green'
 
  }
  
  ]
 });
}); 
</script>
 <script>
    new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
  </script>
  <script>
    new DataTable('#examplee', {
   
});
  </script>
     <script type="text/javascript">

        <?php if ($this->session->flashdata('success')) { ?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php } else if ($this->session->flashdata('delete')) {  ?>
            toastr.error("<?php echo $this->session->flashdata('delete'); ?>");
        <?php } else if ($this->session->flashdata('update')) {  ?>
            toastr.info("<?php echo $this->session->flashdata('update'); ?>");
        <?php } ?>
    </script>