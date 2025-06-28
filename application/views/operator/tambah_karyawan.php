
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Karyawan</h4>
                    
                    <?php  
             echo validation_errors();                       
    echo form_open('operator/tambah_karyawan','class="form-sample"'); ?>
                      <div class="form-group">
                       
                        <label for="exampleInputUsername1">Nama karyawan</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="nama_karyawan">
                      </div>
                       <div class="form-group">
                        <label for="exampleSelectGender">JK</label>
                        <select class="form-select" id="exampleSelectGender" name="jk_karyawan">
                          <option value="L">Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea class="form-control" name="alamat_karyawan" rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">No Telp</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="nomor_karyawan">
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleSelectGender">Jabatan</label>
                        <select class="form-select" id="exampleSelectGender" name="id_jabatan">
                         
                           <?php 
                  
                    foreach ($dt_jabatan as $a):
                    ?> 
                       <option value="<?= $a->id_jabatan; ?>"><?= $a->nama_jabatan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                     
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        