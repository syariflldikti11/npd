
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Surat Jalan</h4>
                    
                    <?php                        
    echo form_open('operator/update_surat_jalan','class="form-sample"'); ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>



   
      <input type="hidden" class="form-control" name="id_surat_jalan" value="<?= $d->id_surat_jalan; ?>">    
                            
                           <div class="form-group">
                            <label>Tgl Surat Jalan</label>
                           
                              <input type="date" class="form-control" name="tgl_surat_jalan" value="<?= $d->tgl_surat_jalan; ?>" />
                          
                          </div>
                       <div class="form-group">
                          
                        <label for="exampleSelectGender">Sopir</label>
                        <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGender" name="id_karyawan">
                         
                           <?php 
                  
                    foreach ($dt_karyawan as $a):
                    ?> 
                       <option value="<?= $a->id_karyawan; ?>" <?php if($d->id_karyawan==$a->id_karyawan) { echo 'selected'; } ?>><?= $a->nama_karyawan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                         <div class="form-group">
                        <label for="exampleInputPassword1">Helper</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="helper" value="<?= $d->helper; ?>">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">No Polisi</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="no_polisi" value="<?= $d->no_polisi; ?>">
                      </div>
                     
                       <div class="form-group">
                        <label for="exampleInputPassword1">KM Awal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="km_awal" value="<?= $d->km_awal; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">KM Akhir</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="km_akhir" value="<?= $d->km_akhir; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tgl Berangkat</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_berangkat" value="<?= $d->tgl_berangkat; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jam Berangkat</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" name="jam_berangkat" value="<?= $d->jam_berangkat; ?>">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputPassword1">Tgl Pulang</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_pulang" value="<?= $d->tgl_pulang; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Jam Pulang</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" name="jam_pulang" value="<?= $d->jam_pulang; ?>">
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary me-2">Update</button>
                     
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        