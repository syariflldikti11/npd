
   
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan transaksi surat jalan.xls");
?>
 <?php 
 $dari=$_POST['dari'];
 $sampai=$_POST['sampai'];
 $id_karyawan=$_POST['id_karyawan'];

function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
 

?>
 <style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
}
-->
 </style>
        

                     
            
                      <p align="center"><span class="style1">Laporan Transaksi Surat Jalan</span><br />
                        Dari tanggal <?= date('d-m-Y', strtotime($dari)); ?> sampai tanggal <?= date('d-m-Y', strtotime($sampai)); ?><br />
                      </p>
                      <table width="100%" border="0">
                        <tr>
                          <td width="12%">Tanggal Laporan</td>
                          <td width="88%">: <?= date('d-m-Y'); ?></td>
                        </tr>
                        <tr>
                          <td>Pembuat Laporan</td>
                          <td>: <?= $id_karyawan; ?></td>
                        </tr>
                       
                      </table>
<table border="1px">
                        <thead>
                          <tr>
                            <th>No</th>
                            
                             <th>Status</th>
                            <th>No Surat Jalan</th>
                            <th>Tgl Surat Jalan</th>
                            <th>Sopir</th>
                            <th>Helper</th>
                             <th>Nopol</th>
                            <th>KM Awal</th>
                            <th>KM Akhir</th>
                            <th>Keberangkatan</th>
                            <th>Kepulangan</th>
                           
                          
                           
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_surat_jalan as $a):
                    ?> 
                      
                          <tr>
                             <td><?= $no++; ?></td>
                
 <td><?php if($a->tgl_pulang=='0000-00-00'): ?>
                    <label class="badge badge-warning">Belum Pulang</label>
                    <?php endif; ?> <?php if($a->tgl_pulang!='0000-00-00'): ?>
                    <label class="badge badge-success">Sudah Pulang</label>
                    <?php endif; ?></td>
                    <td><?= $a->no_surat_jalan; ?></td>
                    <td><?= $a->tgl_surat_jalan; ?></td>
                     <td><?=  $a->nama_karyawan; ?></td>
                    <td><?= $a->helper; ?></td>
                    <td><?= $a->no_polisi; ?></td>
                    <td><?= $a->km_awal; ?></td>
                    <td><?= $a->km_akhir; ?></td>
                    <td><?= $a->tgl_berangkat; ?> | <?= $a->jam_berangkat; ?></td>
                    <td><?= $a->tgl_pulang; ?> | <?= $a->jam_pulang; ?></td>
                  
                  
                   
                         
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    
          <?php
 exit ()
 ?>