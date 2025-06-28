
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Surat Jalan</h4>
                    
                    <?php  
                                    
    echo form_open('operator/tambah_surat_jalan','class="form-sample"'); ?>
       <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
    
      <div class="form-group">
                            <label>Tgl Surat Jalan</label>
                           
                              <input type="date" required class="form-control" name="tgl_surat_jalan" value="<?= date('Y-m-d'); ?>" />
                          
                          </div>
                       <div class="form-group">
                        <label for="exampleSelectGender">Sopir</label>
                       <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGender" name="id_karyawan" required>
                           <?php 
                  
                    foreach ($dt_karyawan as $a):
                    ?> 
                       <option value="<?= $a->id_karyawan; ?>"><?= $a->nama_karyawan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                         <div class="form-group">
                        <label for="exampleInputPassword1">Helper</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="helper">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">No Polisi</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="no_polisi" required>
                      </div>
                     
                       <div class="form-group">
                        <label for="exampleInputPassword1">KM Awal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="km_awal" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tgl Berangkat</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_berangkat" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jam Berangkat</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" name="jam_berangkat" required>
                      </div>
                     
                      <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                     
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        