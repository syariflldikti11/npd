
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update penerima</h4>
                    
                    <?php  
             echo validation_errors();                       
    echo form_open('operator/update_penerima','class="form-sample"'); ?>
                      <div class="form-group">
                           <input type="hidden" class="form-control" name="id_penerima" value="<?= $d->id_penerima; ?>">   
                        <label for="exampleInputUsername1">Nama Penerima</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="nama_penerima" value="<?= $d->nama_penerima; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea class="form-control" name="alamat_penerima" rows="4"><?= $d->alamat_penerima; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">No Telp</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" value="<?= $d->nomor_penerima; ?>" name="nomor_penerima">
                      </div>
                      
                     
                      <button type="submit" name="submit" class="btn btn-primary me-2">Update</button>
                      
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        