
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Karyawan</h4>
                    
                    <?php  
             echo validation_errors();                       
    echo form_open('operator/update_karyawan','class="form-sample"'); ?>
                      <div class="form-group">
                           <input type="hidden" class="form-control" name="id_karyawan" value="<?= $d->id_karyawan; ?>">   
                        <label for="exampleInputUsername1">Nama karyawan</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="nama_karyawan" value="<?= $d->nama_karyawan; ?>">
                      </div>
                       <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select class="form-select" id="exampleSelectGender" name="jk_karyawan">
                          <option value="L" <?php if($d->jk_karyawan=='L') { echo 'selected'; } ?>>Laki-laki</option>
                          <option value="P" <?php if($d->jk_karyawan=='P') { echo 'selected'; } ?>>Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea class="form-control" name="alamat_karyawan" rows="4"><?= $d->alamat_karyawan; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">No Telp</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" value="<?= $d->nomor_karyawan; ?>" name="nomor_karyawan">
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleSelectGender">Jabatan</label>
                        <select class="form-select" id="exampleSelectGender" name="id_jabatan">
                          <?php 
                  
                    foreach ($dt_jabatan as $a):
                    ?> 
                       <option value="<?= $a->id_jabatan; ?>" <?php if($d->id_jabatan==$a->id_jabatan) { echo 'selected'; } ?>><?= $a->nama_jabatan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary me-2">Update</button>
                      
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        