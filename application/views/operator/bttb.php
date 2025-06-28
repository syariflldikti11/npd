
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
                    <h4 class="card-title"><?= $judul; ?> <a class="btn btn-primary" href="<?= base_url('operator/tambah_bttb');?>">Tambah BTTB Pelanggan Tetap</a> <a class="btn btn-primary" href="<?= base_url('operator/tambah_bttb_umum');?>">Tambah BTTB Pelanggan Umum</a></h4>
                     
                    <div class="table-responsive">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                             <th>Opsi</th>
                            <th>Status</th>
                                <th>Operator</th>
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
                    <td>
<?php if($a->barang_diterima=='0000-00-00' && $a->jenis_bttb==0): ?><a class=" btn btn-sm btn-primary shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" 
href="<?= base_url('operator/update_bttb/'.$a->id_bttb);?>" 
><i class="fa fa-pencil fa-sm"></i></a><?php endif; ?>
<?php if($a->barang_diterima=='0000-00-00' && $a->jenis_bttb==1): ?><a class=" btn btn-sm btn-primary shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" 
href="<?= base_url('operator/update_bttb_umum/'.$a->id_bttb);?>" 
><i class="fa fa-pencil fa-sm"></i></a><?php endif; ?></td>
                    <td><?php if($a->barang_diterima=='0000-00-00'): ?>
                    <label class="badge badge-warning">Belum diterima</label>
                    <?php endif; ?> <?php if($a->barang_diterima!='0000-00-00'): ?>
                    <label class="badge badge-success">Sudah diterima</label>
                    <?php endif; ?></td>
                    <td> <label class="badge badge-dark">Di input oleh : <?= $a->opr_input; ?></label> <br />
                    <label class="badge badge-dark"> Di update oleh : <?= $a->opr_update; ?> </label></td>
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
                    </div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
         