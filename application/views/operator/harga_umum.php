
     
   <?php 

 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
 
}
 

?>     
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?= $judul; ?> <a class="btn btn-primary" href="<?= base_url('operator/tambah_harga_umum');?>">Tambah Data</a></h4>
                     
                    <div class="table-responsive">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                      
                            <th>Kota Tujuan</th>
                            <th>Harga Per Colly</th>
                            <th>Keberangkatan</th>
                             <th>Lead Time</th>
                         
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_harga_umum as $a):
                    ?> 
                      
                          <tr>
                             <td><?= $no++; ?></td>
                <td><?= $a->kota_tujuan; ?></td>
                      <td><?= rupiah($a->harga_per_colly); ?></td>
                    <td><?=  $a->keberangkatan; ?></td>
                    <td><?= $a->lead_time; ?></td>
                   
                   
                          <td>
<a class=" btn btn-sm btn-primary shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" 
href="<?= base_url('operator/update_harga_umum/'.$a->id_harga_umum);?>" 
><i class="fa fa-pencil fa-sm"></i></a></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
         