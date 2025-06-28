
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Pelanggan</h4>
                    
                    <?php  
             echo validation_errors();                       
    echo form_open('operator/tambah_pelanggan','class="form-sample"'); ?>
                      <div class="form-group">
                       
                        <label for="exampleInputUsername1">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="nama_pelanggan">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea class="form-control" name="alamat_pelanggan" rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">No Telp</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="nomor_pelanggan">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Jenis Pelanggan</label>
                        <select class="form-select" id="exampleSelectGender" name="jenis_pelanggan">
                          <option value="0">Pelanggan Tetap</option>
                          <option value="1">Pelanggan Umum</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select class="form-select" id="exampleSelectGender" name="status_pelanggan">
                          <option value="1">Aktif</option>
                          <option value="2">Tidak Aktif</option>
                        </select>
                      </div>
                     
                      <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                     
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        