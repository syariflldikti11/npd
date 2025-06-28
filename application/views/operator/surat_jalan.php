
   <?php 

 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
 

?>       
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?= $judul; ?> <a class="btn btn-primary" href="<?= base_url('operator/tambah_surat_jalan');?>">Tambah Data</a></h4>
                     
                    <div class="table-responsive">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                             <th>Opsi</th>
                             <th>Status</th>
                             <th>Operator</th>
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
<a class=" btn btn-sm btn-primary shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" 
href="<?= base_url('operator/update_surat_jalan/'.$a->id_surat_jalan);?>" 
><i class="fa fa-pencil fa-sm"></i></a>
<a class=" btn btn-sm btn-dark shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Barang" 
href="<?= base_url('operator/detail_surat_jalan/'.$a->id_surat_jalan);?>" 
><i class="fa fa-cubes fa-sm"></i></a><?php endif; ?>
<a class=" btn btn-sm btn-warning shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Cetak" 
href="<?= base_url('operator/cetak_surat_jalan/'.$a->id_surat_jalan);?>" 
><i class="fa fa-print fa-sm"></i></a></td>
 <td><?php if($a->tgl_pulang=='0000-00-00'): ?>
                    <label class="badge badge-warning">Belum Pulang</label>
                    <?php endif; ?> <?php if($a->tgl_pulang!='0000-00-00'): ?>
                    <label class="badge badge-success">Sudah Pulang</label>
                    <?php endif; ?></td>
                    <td> <label class="badge badge-dark">Di input oleh : <?= $a->opr_input; ?></label> <br />
                    <label class="badge badge-dark"> Di update oleh : <?= $a->opr_update; ?> </label></td>
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
                    </div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
         