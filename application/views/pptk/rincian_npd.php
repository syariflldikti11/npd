  <?php 

 
function rupiah($angka){
  
  $hasil_rupiah = "" . number_format($angka,0,',','.');
  return $hasil_rupiah;
 
}
 

?>
<?php 
 
  // FUNGSI TERBILANG OLEH : MALASNGODING.COM
  // WEBSITE : WWW.MALASNGODING.COM
  // AUTHOR : https://www.malasngoding.com/author/admin
 
 
  function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
  }
 
  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
    } else {
      $hasil = trim(penyebut($nilai));
    }         
    return $hasil;
  }
 
 
  
  ?>
 <div class="container-fluid">
   <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Sistem Informasi Nota Pencairan Dana (<?= $this->session->userdata('ses_bag'); ?> <?= $this->session->userdata('tahun'); ?>)</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><?= $judul; ?> 
  <?php if($y->dokumen!='') :?> <a class="btn btn-dark"  target="_blank" href="<?= base_url();?>upload/<?= $y->dokumen; ?>">Lihat Dokumen</a> <?php endif; ?></h2>
                                 </div>

                              </div>

                              <div class="table_section padding_infor_info">
                                <table class="table">
                                  <tr>
                                    <td width="4%">1.</td>
                                    <td width="50%">Pejabat Pelaksana Teknis Kegiatan</td>
                                    <td width="46%"><?= $this->session->userdata('ses_nama'); ?></td>
                                  </tr>
                                  <tr>
                                    <td>2.</td>
                                    <td>Program</td>
                                    <td>: <?= $y->program; ?></td>
                                  </tr>
                                  <tr>
                                    <td>3.</td>
                                    <td>Kegiatan</td>
                                    <td>: <?= $y->kegiatan; ?></td>
                                  </tr>
                                  <tr>
                                    <td>4.</td>
                                    <td>Sub Kegiatan</td>
                                    <td>: <?= $y->sub_kegiatan; ?></td>
                                  </tr>
                                  <tr>
                                    <td>5.</td>
                                    <td>Nomor DPA-/DPAL-/DPPA-SKPD</td>
                                    <td>: <?= $y->no_dpa; ?></td>
                                  </tr>
                                  <tr>
                                    <td>6.</td>
                                    <td>Tahun Anggaran</td>
                                    <td>: <?= $y->tahun_anggaran; ?></td>
                                  </tr>
                                  <tr>
                                    <td>7.</td>
                                    <td>Belanja</td>
                                    <td>: <?= $y->nama_rek_05; ?></td>
                                  </tr>
                                  <tr>
                                    <td>8.</td>
                                    <td>Jumlah Dana Yang Diminta</td>
                                    <td>: <?= rupiah($y->total); ?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>(Terbilang <?= terbilang($y->total) ?> Rupiah)</td>
                                  </tr>
                                </table>           
   

   
    
  
  

                                <strong>Pembebanan Pada Kode Rekening</strong> :<br />
                                <div class="table-responsive-sm">
                                 
                                  <table  class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Rekening</th>
                <th>Uraian</th>
                <th>Anggaran</th>
                <th>RAK Tersedia</th>
                <th>Akumulasi Pencairan Sebelumnya</th>
                <th>Pengajuan Pencairan</th>
                  <th>Akumulasi Pencairan sd Saat ini</th>
                  <th>Sisa</th>
            </tr>
        </thead>
        <tbody>
        
            <tr>
              <td>1.</td>
              <td> <?= $y->no_rek_05; ?></td>
              <td> <?= $y->nama_rek_05; ?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td> <?= $y->no_rek_06; ?></td>
              <td> <?= $y->nama_rek_06; ?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
               <?php 
                    $no=1;
                    $anggaran=0;
                    $rak_tersedia=0;
                    $akum_before=0;
                    $pencairan=0;
                    $akum_after=0;
                    $sisa=0;
                    foreach ($dt_rincian_npd as $d):
                    ?> 
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?= $d->uraian; ?></td>
                <td><?= rupiah($ag=$d->anggaran); ?></td>
                <td><?= rupiah($rak=$d->rak_tersedia); ?></td>
                <td><?= rupiah($ab=$d->akum_before); ?></td>
                <td><?= rupiah($penc=$d->pencairan); ?></td>
                <td><?= rupiah($aa=$d->akum_after); ?></td>
                <td><?= rupiah($si=$d->sisa); ?></td>
            </tr>
            <?php 
            $anggaran=$anggaran+$ag;
            $rak_tersedia=$rak_tersedia+$rak;
            $akum_before=$akum_before+$ab;
            $pencairan=$pencairan+$penc;
            $akum_after=$akum_after+$aa;
            $sisa=$sisa+$si;

             ?>
             <?php endforeach; ?>
            <tr>
              <td colspan="3"><div align="right"><strong>Jumlah</strong></div></td>
              <td><?= rupiah($anggaran); ?></td>
              <td><?= rupiah($rak_tersedia); ?></td>
              <td><?= rupiah($akum_after); ?></td>
              <td><?= rupiah($pencairan); ?></td>
              <td><?= rupiah($akum_after); ?></td>
              <td><?= rupiah($sisa); ?></td>
            </tr>
            <tr>
              <td colspan="9"><div align="center"><strong>Potongan-Potongan</strong></div></td>
              </tr>
            <tr>
              <td colspan="3">PPN <?= $y->ppn; ?> %</td>
              <td colspan="6">: <?= rupiah($y->total * ($y->ppn / 100)) ?></td>
              </tr>
            <tr>
              <td colspan="3">Pajak Daerah <?= $y->pajak_daerah; ?> %</td>
              <td colspan="6">: <?= rupiah($y->total * ($y->pajak_daerah / 100)) ?></td>
              </tr>
            <tr>
              <td colspan="3">: </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
                                </div>
                              </div>
                          </div>
                        </div>
                  </div>
               </div>

             