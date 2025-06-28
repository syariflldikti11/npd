
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Tarif Pelanggan</h4>
                    
                    <?php  
             echo validation_errors();                       
    echo form_open('operator/update_tarif_pelanggan','class="form-sample"'); ?>
     <input type="hidden" class="form-control" name="id_tarif_pelanggan" value="<?= $d->id_tarif_pelanggan; ?>">  
     <input type="hidden" class="form-control" name="id_pelanggan" value="<?= $d->id_pelanggan; ?>">  
                         <div class="form-group">
                            <label>Kota Tujuan</label>
                           
                              <input type="text" required class="form-control" name="kota_tujuan"  value="<?= $d->kota_tujuan; ?>"  />
                          
                          </div>
                        <div class="form-group">
                            <label>Harga Per Colly</label>
                           
                              <input type="number" required class="form-control" name="harga_per_colly"  value="<?= $d->harga_per_colly; ?>"  />
                          
                          </div>
                          <div class="form-group">
                            <label>Keberangkatan</label>
                           
                              <input type="text" required class="form-control" name="keberangkatan"  value="<?= $d->keberangkatan; ?>"  />
                          
                          </div>
                          <div class="form-group">
                            <label>Lead Time</label>
                           
                              <input type="text" required class="form-control" name="lead_time"  value="<?= $d->lead_time; ?>"  />
                          
                          </div>



                      <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                     
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        