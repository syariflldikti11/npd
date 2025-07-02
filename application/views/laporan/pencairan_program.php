
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
 $id_bagian=$_POST['id_bagian'];
 $id_jenis_npd=$_POST['id_jenis_npd'];
  // FUNGSI TERBILANG OLEH : MALASNGODING.COM
  // WEBSITE : WWW.MALASNGODING.COM
  // AUTHOR : https://www.malasngoding.com/author/admin
 $jenis=$this->m_umum->ambil_data('jenis_npd','id_jenis_npd',$id_jenis_npd);
 $bagian=$this->m_umum->ambil_data('bagian','id_bagian',$id_bagian);
 
 
  
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
LAPORAN PENCARIAN DANA BERDASARKAN PROGRAM</strong><br />
  <br />

                        Dari tanggal <?= date('d-m-Y', strtotime($dari)); ?> sampai tanggal <?= date('d-m-Y', strtotime($sampai)); ?><br /> <br />
</center>
<?php if ($id_jenis_npd !='semua') : ?>
 Jenis NPD : <?= $jenis->nama_jenis_npd; ?> <br />
  <?php endif; ?>
  <?php if ($id_jenis_npd =='semua') : ?>
 Jenis NPD : Semua NPD<br />
  <?php endif; ?>
<?php if ($id_bagian !='semua') : ?>
Bagian : <?= $bagian->nama_bagian; ?> <br />
 <?php endif; ?>
<?php if ($id_bagian =='semua') : ?>
Bagian : Semua Bagian <br />
 <?php endif; ?>

        <p />
        <?php $program=$this->db->query("Select * from program")->result(); ?>
     
           <?php 
                    $no=1;
                    foreach ($program as $d):
                    ?> 
                  
                
                <?= $no++; ?>. <?= $pr=$d->nama_program; ?> <?= $d->kode_program; ?>
               
            
       
            <hr>

             <?php 
             if($id_bagian !='semua' && $id_jenis_npd !='semua'){
             $total=$this->db->query('Select sum(a.total) as total from permintaan_anggaran a 
             join akun b on a.id_akun=b.id_akun join pegawai c on b.id_pegawai=c.id_pegawai join bagian d on c.id_bagian=d.id_bagian where a.tgl_permintaan_anggaran between "'.$dari.'" and "'.$sampai.'" and a.id_jenis_npd="'.$id_jenis_npd.'" and a.program="'.$pr.'"  and d.id_bagian="'.$id_bagian.'"')->row()->total;
           }
           elseif ($id_bagian !='semua' && $id_jenis_npd =='semua' ) {
              $total=$this->db->query('Select sum(a.total) as total from permintaan_anggaran a 
             join akun b on a.id_akun=b.id_akun join pegawai c on b.id_pegawai=c.id_pegawai join bagian d on c.id_bagian=d.id_bagian where a.tgl_permintaan_anggaran between "'.$dari.'" and "'.$sampai.'" and a.id_jenis_npd !="semua" and a.program="'.$pr.'"  and d.id_bagian="'.$id_bagian.'"')->row()->total;
           }
            elseif ($id_bagian =='semua' && $id_jenis_npd !='semua' ) {
               $total=$this->db->query('Select sum(a.total) as total from permintaan_anggaran a 
             join akun b on a.id_akun=b.id_akun join pegawai c on b.id_pegawai=c.id_pegawai join bagian d on c.id_bagian=d.id_bagian where a.tgl_permintaan_anggaran between "'.$dari.'" and "'.$sampai.'" and a.id_jenis_npd="'.$id_jenis_npd.'" and a.program="'.$pr.'"  and d.id_bagian !="semua"')->row()->total;
           }
            elseif ($id_bagian =='semua' && $id_jenis_npd =='semua' ) {
               $total=$this->db->query('Select sum(a.total) as total from permintaan_anggaran a 
             join akun b on a.id_akun=b.id_akun join pegawai c on b.id_pegawai=c.id_pegawai join bagian d on c.id_bagian=d.id_bagian where a.tgl_permintaan_anggaran between "'.$dari.'" and "'.$sampai.'" and a.id_jenis_npd !="semua" and a.program="'.$pr.'"  and d.id_bagian !="semua"')->row()->total;
           }
              ?>
           
                
                
                Rp. <?= rupiah($total); ?>
                  <p />
            
               
            
          <?php endforeach; ?>
          
     