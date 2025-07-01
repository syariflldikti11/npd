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
      <!-- calendar file css -->
      <link rel="stylesheet" href="<?= base_url();?>assets/js/semantic.min.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
      
      <!--[if lt IE 9]>
      <script src="<?= base_url(); ?>assets/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?= base_url(); ?>assets/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="<?= base_url(); ?>assets/images/logo/logo.png" alt="#" />
                     </div>
                  </div>
                   <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
                  <div class="login_form">
                      <?php
                echo validation_errors();
                     echo form_open('login/auth'); ?>
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Nomor NPD</label>
                              <input type="text" name="username" value="<?= $y->no_npd; ?>" readonly  />
                           </div>
                          <div class="field">
                              <label class="label_field">Nama PPTK</label>
                              <input type="text" name="username" value=" <?= $r->nama_pegawai ?>" readonly   />
                           </div>
                             <div class="field">
                              <label class="label_field">NIP</label>
                              <input type="text" name="username" value=" <?= $r->nip ?>" readonly   />
                           </div>
                           
                                    <div class="field">
                              <label class="label_field">Tanggal Persetujuan</label>
                          <input type="text" name="username" value=" <?= $y->tgl_persetujuan_pptk ?>" readonly   />
                           </div>
                         
                          
                        </fieldset>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->

      <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
      <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="<?= base_url(); ?>assets/js/animate.js"></script>
      <!-- select country -->
      <script src="<?= base_url(); ?>assets/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="<?= base_url(); ?>assets/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="<?= base_url(); ?>assets/js/custom.js"></script>
   </body>
</html>

    