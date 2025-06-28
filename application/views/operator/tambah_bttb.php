
            <div class="row">
         <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah BTTB Pelanggan Tetap</h4>
                    <?php  
                                 
    echo form_open('operator/tambah_bttb','class="form-sample"'); ?>
                     <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No BTTB</label>
                            <div class="col-sm-9">
                              <input type="number" required class="form-control" name="nobttb"  />
                            </div>
                          </div>
                        </div>

                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jml Colly</label>
                            <div class="col-sm-9">
                              <input type="number" name="colly" class="form-control" />
                            </div>
                          </div>
                        </div>
                          
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal BTTB</label>
                            <div class="col-sm-9">
                              <input type="date" required class="form-control" name="tgl_bttb" value="<?= date('Y-m-d'); ?>" />
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jml Dus</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="dos" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota Asal</label>
                            <div class="col-sm-9">
                             
                        <input type="text" value="Banjarmasin" required name="kota_asal" class="form-control" />
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Berat KG</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="kg" />
                            </div>
                          </div>
                        </div>
                       
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pengirim</label>
                            <div class="col-sm-9">
                            <select class="js-example-basic-single form-select" style="width:100%" id="category" name="id_pelanggan" required>
                           <option value="">Pilih Pelanggan</option>
                           <?php 
                  
                    foreach ($dt_pelanggan as $a):
                    ?> 
                       <option value="<?= $a->id_pelanggan; ?>"><?= $a->nama_pelanggan; ?></option>
                  <?php endforeach; ?>
                        </select>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Biaya Per Colly</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="biaya_paket" required readonly />
                            </div>
                          </div>
                        </div>
                         
                      </div>
                     
                      <div class="row">
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota Tujuan</label>
                            <div class="col-sm-9">
                            <select class="js-example-basic-single form-select" id="sub_category" name="kota_tujuan" required>
                                        <option value="">No Selected</option>
 
                                    </select>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Biaya Tambahan (jika ada)</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="biaya_tambahan" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Penerima</label>
                            <div class="col-sm-9">
                              <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGenderr" name="id_penerima" required>
                         
                           <?php 
                  
                    foreach ($dt_penerima as $c):
                    ?> 
                       <option value="<?= $c->id_penerima; ?>"><?= $c->nama_penerima; ?> - <?= $c->alamat_penerima; ?></option>
                  <?php endforeach; ?>
                        </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                              <input type="text" name="ket" class="form-control" />
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Isi Paket</label>
                            <div class="col-sm-9">
                              <input type="text" name="isi_barang" class="form-control" required />
                            </div>
                          </div>
                        </div>
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pembayaran</label>
                            <div class="col-sm-9">
                              <select class="form-select" name="pembayaran">
                                <option value="Lunas">Lunas</option>
                                <option value="Bayar Tujuan">Bayar Tujuan</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Faktur (gunakan pemisah <code>&lt;br&gt;</code> jika lebih dari satu)</label>
                            <div class="col-sm-9">
                             <textarea class="form-control" name="no_faktur" rows="4"></textarea>
                            </div>
                          </div>
                        </div>

                      </div>
                         <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
          
            </div>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#category').change(function(){ 
            var id = $(this).val();
            $.ajax({
                url : "<?php echo site_url('operator/get_sub_tarif_pelanggan');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '<option value="">Pilih</option>';  // Add "Pilih" option

                    var i;
                    for(i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].kota_tujuan+'">'+data[i].kota_tujuan+' Harga per colly : '+data[i].harga_per_colly+'</option>';
                    }

                    $('#sub_category').html(html);
                }
            });
            return false;
        });

        $('#sub_category').change(function(){
            var selectedOption = $(this).find('option:selected');
            var hargaPerColly = selectedOption.text().split('Harga per colly : ')[1]; // Extracting the harga_per_colly value

            // Insert the harga_per_colly value into the input field
            $('input[name="biaya_paket"]').val(hargaPerColly);
        });
    });
</script>
