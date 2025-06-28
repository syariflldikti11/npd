
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Harga Umum</h4>
                    
                    <?php  
             echo validation_errors();                       
    echo form_open('admin/tambah_harga_umum','class="form-sample"'); ?>
   
                         <div class="form-group">
                            <label>Kota Tujuan</label>
                           
                              <input type="text" required class="form-control" name="kota_tujuan"  />
                          
                          </div>
                        <div class="form-group">
                            <label>Harga Per Colly</label>
                           
                              <input type="number" required class="form-control" name="harga_per_colly"  />
                          
                          </div>
                          <div class="form-group">
                            <label>Keberangkatan</label>
                           
                              <input type="text" required class="form-control" name="keberangkatan"  />
                          
                          </div>
                          <div class="form-group">
                            <label>Lead Time</label>
                           
                              <input type="text" required class="form-control" name="lead_time"  />
                          
                          </div>



                      <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                     
                    </form>
                  </div>
                </div>
              </div>
             
          
            </div>
        