
          
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?= $judul; ?> <a class="btn btn-primary" href="<?= base_url('operator/tambah_penerima');?>">Tambah Data</a></h4>
                     
                    <div class="table-responsive">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama penerima</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                           
                         
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_penerima as $a):
                    ?> 
                      
                          <tr>
                             <td><?= $no++; ?></td>
                    <td><?= $a->nama_penerima; ?></td>
                    <td><?= $a->alamat_penerima; ?></td>
                    <td><?= $a->nomor_penerima; ?></td>
                   
                         
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
         