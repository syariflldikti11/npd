   <!-- first row starts here -->
     <?php 

function rupiah($angka){
  
  $hasil_rupiah = "" . number_format($angka,2,',','.');
  return $hasil_rupiah;

}
?>

     <div class="row">
              <div class="col-xl-4 stretch-card grid-margin">
                 <div class="card" >
                  <div class="card-body d-flex flex-wrap justify-content-between">
                    <div>
                      <h4 class="fw-semibold mb-1 text-black">Transksi</h4>
                      <h6 class="text-muted">Harian</h6>
                    </div>
                    <h3 class="text-success fw-bold"><?php

$date=date('Y-m-d');
$query=$this->db->query("Select sum(biaya_paket) as today from bttb where tgl_bttb='$date'");
 foreach ($query->result() as $t) :?>
<?= rupiah($t->today); ?>
 <?php endforeach; ?></h3>
                  </div>
                </div>
                </div>
                 <div class="col-xl-4 stretch-card grid-margin">
                  <div class="card">
                  <div class="card-body d-flex flex-wrap justify-content-between">
                    <div>
                    <h4 class="fw-semibold mb-1 text-black">Transksi</h4>
                      <h6 class="text-muted">Bulanan</h6>
                    </div>
                    <h3 class="text-success fw-bold"><?php

$m=date('m');
$y=$this->session->userdata('tahun');;
$monthly=$this->db->query("Select sum(biaya_paket) as monthly from bttb where month(tgl_bttb)=$m and year(tgl_bttb)=$y");
 foreach ($monthly->result() as $mt) :?>
<?= rupiah($mt->monthly); ?>
 <?php endforeach; ?></h3>
                  </div>
                  </div>
                </div>
                <div class="col-xl-4 stretch-card grid-margin">
                  <div class="card">
                  <div class="card-body d-flex flex-wrap justify-content-between">
                    <div>
                     <h4 class="fw-semibold mb-1 text-black">Transksi</h4>
                      <h6 class="text-muted">Tahunan</h6>
                    </div>
                    <h3 class="text-success fw-bold"><?php

$year=$this->db->query("Select sum(biaya_paket) as year from bttb where  year(tgl_bttb)=$y");
 foreach ($year->result() as $yr) :?>
<?= rupiah($yr->year); ?>
 <?php endforeach; ?></h3>
                  </div>
                </div>
                </div>
            </div>
            <div class="row">
              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                   
                  
                    <div class="flot-chart-wrapper">
                      <div id="chart"></div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-sm-3 stretch-card grid-margin">
                <div class="card color-card-wrapper">
                  <div class="card-body">
                    <img class="img-fluid card-top-img w-100" src="<?= base_url(); ?>assets/images/dashboard/img_5.jpg" alt="">
                    <div class="d-flex flex-wrap justify-content-around color-card-outer">
                      <div class="col-6 p-0 mb-4">
                        <div class="color-card primary m-auto">
                          <i class="fa fa-users"></i>
                          <p class="fw-semibold mb-0">Karyawan</p>
                          <span class="small"><?= $karyawan; ?></span>
                        </div>
                      </div>
                      <div class="col-6 p-0 mb-4">
                        <div class="color-card bg-success  m-auto">
                          <i class="fa fa-address-card"></i>
                          <p class="fw-semibold mb-0">Pelanggan</p>
                          <span class="small"><?= $pelanggan; ?></span>
                        </div>
                      </div>
                      <div class="col-6 p-0">
                        <div class="color-card bg-info m-auto">
                          <i class="fa fa-file"></i>
                          <p class="fw-semibold mb-0">BTTB</p>
                          <span class="small"><?= $bttb; ?></span>
                        </div>
                      </div>
                      <div class="col-6 p-0">
                        <div class="color-card bg-danger m-auto">
                          <i class="fa fa-truck"></i>
                          <p class="fw-semibold mb-0">Surat Jalan</p>
                          <span class="small"><?= $surat_jalan; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- chart row starts here -->
            <div class="row">
              <div class="col-sm-6 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                   
                   
                     <div id="bttb"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                   
                   
                    <div id="sj"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- image card row starts here -->
        
            <!-- table row starts here -->
           
            <!-- doughnut chart row starts -->
          
            <!-- last row starts here -->
            
          </div>