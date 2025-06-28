
          
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?= $judul; ?> <a class="btn btn-primary" href="<?= base_url('operator/tambah_karyawan');?>">Tambah Data</a></h4>
                     
                    <div class="table-responsive">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama karyawan</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Jabatan</th>
                           
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_karyawan as $a):
                    ?> 
                      
                          <tr>
                             <td><?= $no++; ?></td>
                   
                    <td><?= $a->nama_karyawan; ?></td>
                     <td><?= $a->jk_karyawan; ?></td>
                    <td><?= $a->alamat_karyawan; ?></td>
                    <td><?= $a->nomor_karyawan; ?></td>
                    <td><?= $a->nama_jabatan; ?></td>
                   
                          
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
         