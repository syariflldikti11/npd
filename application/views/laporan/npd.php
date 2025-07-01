
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

 $dari=$_POST['dari'];
 $sampai=$_POST['sampai'];
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
    <td width="79%"><div align="center"><strong><font size="+1">PEMERINTAH kegiatan BANJAR</font></strong><br />
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
<center><strong><br />
LAPORAN NOTA PENCAIRAN DANA</strong><br />
  <br />
 
                        Dari tanggal <?= date('d-m-Y', strtotime($dari)); ?> sampai tanggal <?= date('d-m-Y', strtotime($sampai)); ?><br />
</center>

  <table class="saya" width="100%">
        <thead>
            <tr>
                <th class="style5">No</th>
                <th class="style5">Status</th>
                <th class="style5">Bagian</th>
                <th class="style5">Jenis NPD</th>
                <th class="style5">Tanggal</th>
                  <th class="style5">Program</th>
                <th class="style5">Kegiatan</th>
                <th class="style5">Sub Kegiatan</th>
              
                <th class="style5">No DPA</th>
                <th class="style5">Tahun Anggaran</th>
                <th class="style5">Rek 05</th>
                <th class="style5">Rek 06</th>
                <th class="style5">RAB</th>
             
               
               
           
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_permintaan_anggaran as $d):
                    ?> 
            <tr>
                <td class="style5"><?= $no++; ?></td>
                 <td class="style5">
                       PPTK :  <?php if($d->status_pptk==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_pptk==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>  <?php if($d->status_pptk==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $d->catatan_npd; ?> <?php endif; ?> <br />
KPA : <?php if($d->status_kpa==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_kpa==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>
                        <?php if($d->status_kpa==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $d->catatan_npd; ?>  <?php endif; ?>  <br />
PPKEU : <?php if($d->status_ppkeu==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_ppkeu==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>
                       <?php if($d->status_ppkeu==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $d->catatan_npd; ?>  <?php endif; ?>
                         <br />
BENDAHARA : <?php if($d->status_bend==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_bend==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>
                       <?php if($d->status_bend==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $d->catatan_npd; ?>  <?php endif; ?>
                        <br /></td>
                      <td class="style5"><?= $d->nama_bagian; ?></td>
                <td class="style5"><?= $d->nama_jenis_npd; ?></td>
                <td class="style5"><?= $d->tgl_permintaan_anggaran; ?></td>
                <td class="style5"><?= $d->program; ?></td>
                <td class="style5"><?= $d->kegiatan; ?></td>
                <td class="style5"><?= $d->sub_kegiatan; ?></td>
                
                <td class="style5"><?= $d->no_dpa; ?></td>
                <td class="style5"><?= $d->tahun_anggaran; ?></td>
                <td class="style5"><?= $d->no_rek_05; ?> | <?= $d->nama_rek_05; ?></td>
                <td class="style5"><?= $d->no_rek_06; ?> | <?= $d->nama_rek_06; ?></td>
          <td class="style5"> <a  target="_blank" href="<?= base_url();?>upload/<?= $d->file; ?>"><i class="fa fa-file"></i></a> </td>
             
               
            </tr>
          <?php endforeach; ?>
        </tbody>
       
    </table>