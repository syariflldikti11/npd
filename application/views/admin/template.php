<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sistem Informasi Nota Pencairan Dana</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="<?= base_url();?>assets/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="<?= base_url();?>assets/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="<?= base_url();?>assets/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="<?= base_url();?>assets/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="<?= base_url();?>assets/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="<?= base_url();?>assets/css/custom.css" />
      <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
     <?php
                                            
                                             $dt_jenis_npd=$this->m_umum->get_data('jenis_npd');
                                              ?>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="<?= base_url();?>"><img class="logo_icon img-responsive" src="<?= base_url();?>assets/images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class=""><img width="50px" class="img-responsive" src="<?= base_url();?>assets/images/banjar.png" alt="#" /></div>
                        <div class="user_info">
                           <h6>Sekretaria Daerah</h6>
                           <p><span></span> Kabupaten Banjar</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Admin</h4>
                  <ul class="list-unstyled components">
                   
                     <li><a href="<?= base_url();?>"><i class="fa fa-home red_color"></i> <span>Home</span></a></li>
                      <!--  <li><a href="<?= base_url('admin/role');?>"><i class="fa fa-briefcase orange_color"></i> <span>Role</span></a></li> -->
                         <li><a href="<?= base_url('admin/jenis_npd');?>"><i class="fa fa-briefcase green_color"></i> <span>Jenis NPD</span></a></li>
                         <li><a href="<?= base_url('admin/bagian');?>"><i class="fa fa-briefcase green_color"></i> <span>Bagian</span></a></li>
                         <li><a href="<?= base_url('admin/akun');?>"><i class="fa fa-briefcase purple_color"></i> <span>Akun</span></a></li>
                         <li><a href="<?= base_url('admin/pegawai');?>"><i class="fa fa-briefcase blue1_color"></i> <span>Pegawai</span></a></li>
                         <li><a href="<?= base_url('admin/rek_05');?>"><i class="fa fa-briefcase orange_color"></i> <span>Kode Rekening</span></a></li>
                         <li><a href="<?= base_url('admin/program');?>"><i class="fa fa-briefcase white"></i> <span>Program</span></a></li>
                         <li><a href="<?= base_url('admin/kegiatan');?>"><i class="fa fa-briefcase green_color"></i> <span>Kegiatan</span></a></li>
                         <li><a href="<?= base_url('admin/sub_kegiatan');?>"><i class="fa fa-briefcase purple_color"></i> <span>Sub Kegiatan</span></a></li>
                       
                         <li><a href="<?= base_url('admin/permintaan_anggaran');?>"><i class="fa fa-file yellow_color"></i> <span>Permintaan Anggaran</span></a></li>
                         <li><a href="<?= base_url('admin/npd');?>"><i class="fa fa-file red_color"></i> <span>NPD</span></a></li>

                     
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book green_color"></i> <span>Laporan</span></a>
                        <ul class="collapse list-unstyled" id="element">
                            
                          <li><a href="<?= base_url();?>">> <span>Program/Kegiatan/Sub</span></a></li>
                          <li><a href="<?= base_url();?>">> <span>Kode Rekening</span></a></li>
                           <li><a href="<?= base_url();?>">> <span>Data Permintaan Anggaran</span></a></li>
                           <li><a href="<?= base_url();?>">> <span>Data NPD</span></a></li>
                           <li><a href="<?= base_url();?>">> <span>Data Detail NPD</span></a></li>
                           <li><a href="<?= base_url();?>">> <span>Pencairan By Program</span></a></li>
                           <li><a href="<?= base_url();?>">> <span>Pencairan By Kegiatan</span></a></li>
                           <li><a href="<?= base_url();?>">> <span>Pencairan By Rekening</span></a></li>
                           <li><a href="<?= base_url();?>">> <span>Laju Verifikasi</span></a></li>
                        </ul>
                    
                    </li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="<?= base_url();?>assets/index.html"><img class="img-responsive" src="<?= base_url();?>assets/images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                            
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="<?= base_url();?>assets/images/layout_img/user_img.jpg" alt="#" /><span class="name_user"><?= $this->session->userdata('ses_nama'); ?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item"   data-toggle="modal" data-target="#ganti" >Ganti Password</a>
                                      
                                       <a class="dropdown-item" href="<?= base_url('login/logout');?>"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
         <div class="modal fade" id="ganti" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Ganti Password</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/ganti_password'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
  <input type="hidden" class="form-control"  name="id_pegawai" value="<?= $this->session->userdata('ses_id_peg'); ?>"  required >
    <label for="exampleInputEmail1">Password Baru</label>
    <input type="text" class="form-control"  name="password"   required >
    
  </div>
  
</div>

<!-- Modal footer -->
<div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">

</div>
</form>
</div>
</div>
</div>
                <?= $contents ?>
                <!-- /.container-fluid -->
   <div class="container-fluid">
                      
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
            <div class="footer">
                        <p>Copyright © 2025 E-NPD. All rights reserved.<br><br>
                           Templated By: <a href="<?= base_url();?>assets/https://themewagon.com/">ThemeWagon</a>
                        </p>
                     </div>
         </div>
      </div>
      <!-- jQuery -->
     
      <script src="<?= base_url();?>assets/js/popper.min.js"></script>
      <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="<?= base_url();?>assets/js/animate.js"></script>
      <!-- select country -->
      <script src="<?= base_url();?>assets/js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="<?= base_url();?>assets/js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="<?= base_url();?>assets/js/Chart.min.js"></script>
      <script src="<?= base_url();?>assets/js/Chart.bundle.min.js"></script>
      <script src="<?= base_url();?>assets/js/utils.js"></script>
      <script src="<?= base_url();?>assets/js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="<?= base_url();?>assets/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="<?= base_url();?>assets/js/custom.js"></script>
      <script src="<?= base_url();?>assets/js/chart_custom_style1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      
     
      <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>


</body>

</html>
      
<script type="text/javascript">
  new DataTable('#example');
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