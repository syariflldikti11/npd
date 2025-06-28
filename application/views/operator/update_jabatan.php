
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Jabatan</h4>
                    
                    <?php  
             echo validation_errors();                       
    echo form_open('operator/update_jabatan','class="form-sample"'); ?>
                      <div class="form-group">
                           <input type="hidden" class="form-control" name="id_jabatan" value="<?= $d->id_jabatan; ?>">   
                        <label for="exampleInputUsername1">Nama Jabatan</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="nama_jabatan" value="<?= $d->nama_jabatan; ?>">
                      </div>
                    
                      
                     
                      <button type="submit" name="submit" class="btn btn-primary me-2">Update</button>
                      
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        