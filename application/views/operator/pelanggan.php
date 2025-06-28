
          
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?= $judul; ?> <a class="btn btn-primary" href="<?= base_url('operator/tambah_pelanggan');?>">Tambah Data</a></h4>
                     
                    <div class="table-responsive">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Status</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_pelanggan as $a):
                    ?> 
                      
                          <tr>
                             <td><?= $no++; ?></td>
                    <td><?= $a->nama_pelanggan; ?></td>
                     <td><?php if($a->jenis_pelanggan==0): ?>
                   Pelanggan Tetap</label>
                    <?php endif; ?>
                    <?php if($a->jenis_pelanggan==1): ?>
                    Pelanggan Umum
                    <?php endif; ?></td>
                    <td><?= $a->alamat_pelanggan; ?></td>
                    <td><?= $a->nomor_pelanggan; ?></td>
                    <td><?php if($a->status_pelanggan==1): ?>
                    <label class="badge badge-success">Aktif</label>
                    <?php endif; ?>
                    <?php if($a->status_pelanggan==2): ?>
                    <label class="badge badge-warning">Tidak Aktif</label>
                    <?php endif; ?></td>
                          <td>
                            

<?php if($a->jenis_pelanggan==0): ?>
<a class=" btn btn-sm btn-dark shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Tarif" 
href="<?= base_url('operator/tarif_pelanggan/'.$a->id_pelanggan);?>" 
><i class="fa fa-money fa-sm"></i></a>
 <?php endif; ?></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
         