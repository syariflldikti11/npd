
   
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan transaksi bttb.xls");
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
        

                     
            
                      <p align="center"><span class="style1">Laporan Transaksi BTTB</span><br />
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
                        <tr>
                          <td>Pendapatan</td>
                          <td>: <?php


$profit=$this->db->query("Select sum(total) as profit from bttb where tgl_bttb between '$dari' and '$sampai'");
 foreach ($profit->result() as $mt) :?>
<?= rupiah($mt->profit); ?>
 <?php endforeach; ?></td>
                        </tr>
                      </table>
<table border="1px">
                        <thead>
                          <tr>
                            <th>No</th>
                          
                            <th>Status</th>
                            <th>No BTTB</th>
                            <th>No Faktur</th>
                            <th>Tgl BTTB</th>
                            <th>Kota Asal</th>
                             <th>Pengirim</th>
                            <th>Kota Tujuan</th>
                            <th>Penerima</th>
                            <th>Jml Colly</th>
                            <th>Jml Dos</th>
                            <th>Berat KG</th>
                             <th>Biaya Per Colly</th>
                            <th>Biaya Tambahan</th>
                            <th>Total Biaya</th>
                            <th>Isi Paket</th>
                            <th>Ket</th>
                            <th>Pembayaran</th>
                            <th>Tgl Barang diterima</th>
                            <th>BTTB Kembali</th>
                          
                           
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_bttb as $a):
                    ?> 
                      
                          <tr>
                             <td><?= $no++; ?></td>
                   
                    <td><?php if($a->barang_diterima=='0000-00-00'): ?>
                    <label class="badge badge-warning">Belum diterima</label>
                    <?php endif; ?> <?php if($a->barang_diterima!='0000-00-00'): ?>
                    <label class="badge badge-success">Sudah diterima</label>
                    <?php endif; ?></td>
                    <td><?= $a->nobttb; ?></td>
                    <td><?= $a->no_faktur; ?></td>
                     <td><?= $a->tgl_bttb; ?></td>
                    <td><?= $a->kota_asal; ?></td>
                    <td><?= $a->nama_pelanggan; ?></td>
                    <td><?= $a->kota_tujuan; ?></td>
                    <td><?= $a->nama_penerima; ?></td>
                    <td><?= $a->colly; ?></td>
                    <td><?= $a->dos; ?></td>
                    <td><?= $a->kg; ?></td>
                    <td><?= rupiah($a->biaya_paket); ?></td>
                    <td><?= rupiah($a->biaya_tambahan); ?></td>
                    <td><?= rupiah($a->total); ?></td>
                    <td><?= $a->isi_barang; ?></td>
                    <td><?= $a->ket; ?></td>
                    <td><?= $a->pembayaran; ?></td>
                    <td><?= $a->barang_diterima; ?></td>
                    <td><?= $a->bttb_kembali; ?></td>
                  
                   
                         
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    
          <?php
 exit ()
 ?>