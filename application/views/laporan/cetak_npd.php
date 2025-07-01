
 <script type="text/javascript">
  window.print();
    </script>
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
 
 
  
  ?></head></head></head></head></head></head></head></head></head></head></head></head></head></head>
<style>

 .saya
   {
  border : 1px solid black;

  border-collapse: collapse;
  font-size: 15px
}
.sayalagi
   {
  border : 1px solid black;
font-size:14px;
  border-collapse: collapse;
}
  .kiri
   {
  border-left : 1px solid black;

  border-collapse: collapse;
}
.kanan
   {
  border-right:  : 1px solid black;

  border-collapse: collapse;
}
.atas
   {
  border-top:  : 0px solid black;

  border-collapse: collapse;
}
.bawah
   {
  border-bottom : 1px solid black;

  border-collapse: collapse;
}
.kiribawah
   {
  border-bottom : 1px solid black;
 border-left : 1px solid black;
  border-collapse: collapse;
}
 .tes
   {

margin : 0px;
}
@media print {
    .footer,
    #non-printable {
        display: none !important;
    }
    #printable {
        display: block;
    }
    .page-break {
                page-break-after: always; /* For modern browsers */
                break-after: page; /* For some older browsers */
            }
}
.style5 {border: 1px solid black; border-collapse: collapse;
   padding-left:3px; padding-right:3px; }
</style>

 <table width="100%" border="0">
  <tr>
    <td width="18%"><img src="<?= base_url(); ?>/assets/images/banjar.png" width="80px"></td>
    <td width="79%"><div align="center"><strong><font size="+1">PEMERINTAH KABUPATEN BANJAR</font></strong><br />
        <strong>SEKRETARIAT DAERAH</strong><br />
       <font size="-1">Jl. A. Yani No.2 Martapura Telp. (0511) 4721002-4721064 Fax (0511)4721538 Kode Pos 70611 Kalsel    </font>            

        <br />
        <font size="-1">Website : www.banjarkab.go.id E-Mail : banjarkab@banjarkab.go.id   </font>              

       

    </div></td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>
<div style='mso-element:para-border-div;border:none;border-top:solid windowtext 3.0pt;
padding:1.0pt 0cm 0cm 0cm'>
<p align="center"><strong>NOTA PENCAIRAN DANA (NPD)
</strong>
  <br />
Nomor : 
<?= $y->no_npd; ?>
<br />
<br />
<table class="saya" width="100%">
                                  <tr>
                                    <td><b>BENDAHARA PENGELUARAN</b></td>

                                   
                                  </tr>
                                   <tr>
                                    <td><b><?= strtoupper($y->nama_bagian); ?> KABUPATEN BANJAR</b></td>

                                   
                                  </tr>
                                   <tr>
                                    <td>Supaya Mencairkan Kepada :</td>

                                   
                                  </tr>
                                  </table>
   <table class="saya" width="100%">
                                  <tr>
                                    <td width="4%">1.</td>
                                    <td width="35%">Pejabat Pelaksana Teknis Kegiatan</td>
                                    <td width="61%">: 
                                    <?= $r->nama_pegawai ?></td>
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
                                    <tr>
                                    <td colspan="3"><b>Pembebanan Pada Kode Rekening :</b>   
</td>
                                  </tr>
                                </table>           
   

     <table class="saya" width="100%">
        <thead>
            <tr>
                <th class="style5">No</th>
                <th class="style5">Kode Rekening</th>
                <th class="style5">Uraian</th>
                <th class="style5">Anggaran</th>
                <th class="style5">RAK Tersedia</th>
                <th class="style5">Akumulasi Pencairan Sebelumnya</th>
                <th class="style5">Pengajuan Pencairan</th>
                  <th class="style5">Akumulasi Pencairan sd Saat ini</th>
                  <th class="style5">Sisa</th>
            </tr>
        </thead>
        <tbody>
        
            <tr>
              <td class="style5">1.</td>
              <td class="style5"> <?= $y->no_rek_05; ?></td>
              <td class="style5"> <?= $y->nama_rek_05; ?></td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
            </tr>
            <tr>
              <td class="style5">&nbsp;</td>
              <td class="style5"> <?= $y->no_rek_06; ?></td>
              <td class="style5"> <?= $y->nama_rek_06; ?></td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
              <td class="style5">&nbsp;</td>
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
                <td class="style5">&nbsp;</td>
                <td class="style5">&nbsp;</td>
                <td class="style5"><?= $d->uraian; ?></td>
                <td class="style5"><?= rupiah($ag=$d->anggaran); ?></td>
                <td class="style5"><?= rupiah($rak=$d->rak_tersedia); ?></td>
                <td class="style5"><?= rupiah($ab=$d->akum_before); ?></td>
                <td class="style5"><?= rupiah($penc=$d->pencairan); ?></td>
                <td class="style5"><?= rupiah($aa=$d->akum_after); ?></td>
                <td class="style5"><?= rupiah($si=$d->sisa); ?></td>
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
              <td class="style5" colspan="3"><div align="right"><strong>Jumlah</strong></div></td>
              <td class="style5"><?= rupiah($anggaran); ?></td>
              <td class="style5"><?= rupiah($rak_tersedia); ?></td>
              <td class="style5"><?= rupiah($akum_after); ?></td>
              <td class="style5"><?= rupiah($pencairan); ?></td>
              <td class="style5"><?= rupiah($akum_after); ?></td>
              <td class="style5"><?= rupiah($sisa); ?></td>
            </tr>
            <tr>
              <td class="style5" colspan="9"><div align="center"><strong>Potongan-Potongan</strong></div></td>
              </tr>
            <tr>
              <td class="style5" colspan="3">PPN <?= $y->ppn; ?> %</td>
              <td class="style5" colspan="6">: <?php
        $potonganppn=0;
        $potonganppn= $y->total * ($y->ppn / 100);
        echo rupiah($potonganppn);
         ?></td>
              </tr>
            <tr>
              <td class="style5" colspan="3">Pajak Daerah <?= $y->pajak_daerah; ?> %</td>
              <td class="style5" colspan="6">: <?php
        $potonganpajak=0;
        $potonganpajak= $y->total * ($y->pajak_daerah / 100);
        echo rupiah($potonganpajak);
         ?></td>
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
              <td colspan="3">Jumlah Yang Diminta</td>
              <td>: <?= rupiah($y->total); ?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">Potongan</td>
              <td>: <?php
        $potongan=0;
         $potongan=$potonganppn+$potonganpajak;
         echo rupiah($potongan); ?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">Jumlah Yang Dibayarkan</td>
              <td>: <?php
              $bayar=0;
        $bayar=$y->total-$potongan;
        echo rupiah($bayar); ?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="9">(Terbilang
                <?= terbilang($bayar) ?> Rupiah)</td>
              </tr>
        </tbody>
    </table>
     <table width="100%" border="0">
       <tr>
         <td width="50%">&nbsp;</td>
         <td width="50%"><p>Martapura, 
           <?= date('Y-m-d'); ?>
           <br />
         </p></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>Kuasa Pengguna Anggaran</td>
         <td>Pejabat Pelaksana Teknis Kegiatan</td>
       </tr>
       <tr>
         <td><p>
          <?php
   include "phpqrcode/qrlib.php";
   ?>
   <?php if($y->status_kpa==2) :?>
   <?php
   

   $no=1;
                                           $tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);
    $teks=$y->id_permintaan_anggaran; 
   $isi_teks1 = $teks;
                //Nama file yang akan disimpan pada folder temp 
                $namafile1 = $teks . "_1.png";
                //Kualitas dari QRCode 
                $quality1 = 'H'; 
                //Ukuran besar QRCode
                $ukuran1 = 4; 
                $padding1 =0; 
 QRCode::png(base_url("cekqr/kpa/$isi_teks1"), $tempdir . $namafile1, $quality1, $ukuran1, $padding1);
                ?>
    <img src="<?php echo base_url();?>temp/<?php echo $namafile1; ?>" width="100px"><?php endif; ?></p>
         </td>
         <td>
            <?php if($y->status_kpa==2) :?><?php
  

   $no=1;
                                           $tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);
    $teks2=$y->id_permintaan_anggaran; 
   $isi_teks2 = $teks2;
                //Nama file yang akan disimpan pada folder temp 
            $namafile2 = $teks . "_2.png";
                //Kualitas dari QRCode 
                $quality2 = 'H'; 
                //Ukuran besar QRCode
                $ukuran2 = 4; 
                $padding2 =0; 
 QRCode::png(base_url("cekqr/pptk/$isi_teks1"), $tempdir . $namafile2, $quality2, $ukuran2, $padding2);
                ?>
   <img src="<?php echo base_url();?>temp/<?php echo $namafile2; ?>" width="100px"><?php endif; ?></td>
       </tr>
       <tr>
         <td>
           <?= $t->nama_pegawai ?>
       </td>
         <td><?= $r->nama_pegawai ?></td>
       </tr>
       <tr>
         <td>
           NIP. <?= $t->nip ?>
         </td>
         <td>NIP.
         <?= $r->nip ?></td>
       </tr>
     </table>
     <p>&nbsp;</p>
 