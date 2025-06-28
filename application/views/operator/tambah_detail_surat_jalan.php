  <?php 

 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
 

?> 
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <form method="post" action="<?php echo site_url('operator/insert_multiple'); ?>"> 
                        
                     <input type="hidden" name="id_sj" value="<?= $id ?>">
                      <h4 class="card-title">Pilih BTTB <button type="submit" name="submit" class="btn btn-primary me-2">Simpan</button></h4>
                     <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
          <?php if ($this->session->flashdata('warning')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('warning'); ?>
            </div>
        <?php endif; ?>
                  
                  <div class="table-responsive">
                      <table id="examplee" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            
                           
                         
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
                           
                          
                           
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_bttb as $a):
                    ?> 
                      
                          <tr>
                             <td><?= $no++; ?></td>
                   
                   
                    <td><input type="checkbox" name="selected_ids[]" value="<?= $a->id_bttb; ?>"> <?= $a->nobttb; ?></td>
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
                  
                   
                         
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </form>
                    </div>
                </div>
              </div>
             
          
            </div>
        