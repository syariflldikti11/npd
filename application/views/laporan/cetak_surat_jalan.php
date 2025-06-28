<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
 <script type="text/javascript">
  window.print();
    </script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
<!--
.style6 {font-weight: bold}
.style7 {
	font-size: x-small
}
-->
</style>
</head>
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
  font-weight: bold; font-family: "Calibri Light"; padding-left:3px; padding-right:3px; }
.style8 {border: 1px solid black; border-collapse: collapse; font-size:12px;  padding-left:3px;  }
</style>
<body>
<table width="100%" border="0">
  <tr>
    <td width="69%"><font size="+2">Ghifa Express</font></td>
    <td width="31%" rowspan="2" class="saya"><p><strong><font size="+2">SURAT JALAN<br />
    </font></strong></p>
    <p>No :
      <?= $d->no_surat_jalan; ?>
    </p></td>
  </tr>
  <tr>
    <td><strong>GHIFA ASTHILA SUKSES, PT.</strong></td>
  </tr>
  <tr>
    <td>Jl. Gatot Subroto VIII Komplek Kelapa Gading No. 1A</td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>Telp : (0511) 6198 111 Fax : - Email:ghifa.express.bdj@gmail.com</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="14%" ><strong>Nama Sopir</strong></td>
    <td width="32%">: <?= $d->nama_karyawan; ?></td>
    <td width="21%" class="style8"><strong>No. Polisi : </strong>
      <?= $d->no_polisi; ?>    </td>
    <td width="14%" class="style8"><strong>Berangkat</strong></td>
    <td width="19%" class="style8"><strong>Pulang</strong></td>
  </tr>
  <tr>
    <td><strong>Helper</strong></td>
    <td>: <?= $d->helper; ?></td>
    <td class="style8"><strong>KM Awal :</strong>      <?= $d->km_awal; ?></td>
    <td rowspan="2" class="style8"><strong>Tgl :</strong> 
      <?= date('d/m/Y', strtotime($d->tgl_berangkat));  ?>
      <br />
      <strong>Jam :</strong>      <?= $d->jam_berangkat; ?></td>
    <td rowspan="2" class="style8"><strong>Tgl :</strong> 
     <?php if($d->tgl_pulang!='0000-00-00'): ?> <?= $d->tgl_pulang; ?> <?php endif; ?>
      <br />
      <strong>Jam :</strong>    <?php if($d->tgl_pulang!='0000-00-00'): ?>   <?= $d->jam_pulang; ?> <?php endif; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="style8"><strong>KM Akhir:</strong>      <?= $d->km_akhir; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" class="saya">
  <tr>
    <td class="style5" width="3%" rowspan="2"><div align="center"><strong>No</strong></div></td>
    <td class="style5" width="13%" rowspan="2"><div align="center"><strong>Costumer</strong></div></td>
    <td class="style5" width="16%" rowspan="2"><div align="center"><strong>NoBTTB</strong></div></td>
    <td class="style5" width="14%" rowspan="2"><div align="center"><strong>Kota Tujuan</strong></div></td>
    <td class="style5" width="14%" rowspan="2"><div align="center"><strong>Penerima</strong></div></td>
  
    <td class="style5" width="13%" rowspan="2"><div align="center"><strong>Ket</strong></div></td>
    <td colspan="3" class="style5 style6"><div align="center">Jumlah</div>      <div align="center"></div>      <div align="center"></div></td>
  </tr>
  <tr>
    <td class="style5" width="5%"><div align="center"><strong>Colly</strong></div></td>
    <td class="style5" width="5%"><div align="center"><strong>Dos</strong></div></td>
    <td class="style5" width="4%"><div align="center"><strong>KG</strong></div></td>
  </tr>
<?php 
    $no = 1;
    $total_colly = 0;
    $total_dos = 0;
    $total_kg = 0;
    foreach ($dt_detail_surat_jalan as $a):
?> 
  <tr>
     <td class="style5"><div align="center">
       <?= $no++; ?>
     </div></td>
     <td class="style5"><?= $a->nama_pelanggan; ?></td>
     <td class="style5"><?= $a->nobttb; ?>
     <div align="center"></div></td>
     <td class="style5"><?= $a->kota_tujuan; ?></td>
     <td class="style5"><?= $a->nama_penerima; ?></td>
     <td class="style5"><?= $a->ket; ?></td>
     <td class="style5"><div align="center">
       <?= $a->colly; ?>
     </div></td>
     <td class="style5"><div align="center">
       <?= $a->dos; ?>
     </div></td>
     <td class="style5"><div align="center">
       <?= $a->kg; ?>
     </div></td>
  </tr>
  
  <?php 
    // Accumulate totals
    $total_colly += $a->colly;
    $total_dos += $a->dos;
    $total_kg += $a->kg;
  ?>
  
<?php endforeach; ?>

<tr>
    <td colspan="6" class="style5"><div align="right"><strong><em>Jumlah</em></strong></div></td>
    <td class="style5"><div align="center">
      <?= $total_colly; ?>
    </div></td>
    <td class="style5"><div align="center">
      <?= $total_dos; ?>
    </div></td>
    <td class="style5"><div align="center">
      <?= $total_kg; ?>
    </div></td>
</tr>
</table>
<p align="right">&nbsp;</p>
<p align="right">Banjarmasin, 
  <?= tgl_indo($d->tgl_surat_jalan); ?>
</p>
<table width="100%" border="0">
  <tr>
    <td width="26%"><div align="center">Direktur</div></td>
    <td width="29%"><div align="center">Koordinator,</div></td>
    <td width="45%">&nbsp;</td>
    <td width="45%"><div align="center">Driver/Motoris</div></td>
  </tr>
  <tr>
    <td><p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
    <p align="center">(.............................)</p></td>
    <td><p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
    <p align="center">(.............................)</p></td>
    <td>&nbsp;</td>
    <td><p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
    <p align="center">(.............................)</p></td>
  </tr>
</table>
<p class="style7">Catatan: 1.Putih untuk kantor, 2. Biru untuk Koordinator, 3. Kuning untuk Driver/Motoris</p>
<p align="right">&nbsp; </p>
</body>
</html>
