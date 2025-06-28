
            <div class="row">
         <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update BTTB Pelanggan Umum</h4>
                    <?php                        
    echo form_open('operator/update_bttb_umum','class="form-sample"'); ?>
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
                               <input type="hidden" class="form-control" name="id_bttb" value="<?= $d->id_bttb; ?>"> 
                            
                              <input type="number" required class="form-control" name="nobttb" value="<?= $d->nobttb; ?>"  />
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jml Colly</label>
                            <div class="col-sm-9">
                              <input type="number" name="colly" class="form-control" value="<?= $d->colly; ?>" />
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal BTTB</label>
                            <div class="col-sm-9">
                              
                              <input type="date" class="form-control" required name="tgl_bttb" value="<?= date('Y-m-d'); ?>" />
                            </div>
                          </div>
                        </div>
                          
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jml Dus</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?= $d->dos; ?>" name="dos" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota Asal</label>
                            <div class="col-sm-9">
                             
                        <input type="text" name="kota_asal" value="<?= $d->kota_asal; ?>" class="form-control" />
                            </div>
                          </div>
                        </div>
                           <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Berat KG</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="kg" value="<?= $d->kg; ?>" />
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pengirim</label>
                            <div class="col-sm-9">
                            <select class="js-example-basic-single form-select" style="width:100%" id="pelanggan" name="id_pelanggan">
                          <option value="old">Pilih Pelanggan</option>
                           <?php 
                  
                    foreach ($dt_pelanggan as $a):
                    ?> 
                       <option value="<?= $a->id_pelanggan; ?>" <?php if($d->id_pelanggan==$a->id_pelanggan) { echo 'selected'; } ?>><?= $a->nama_pelanggan; ?></option>
                  <?php endforeach; ?>
                        </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Biaya Per Colly</label>
                            <div class="col-sm-9">
                              <input type="number" id="harga" class="form-control" name="biaya_paket" value="<?= $d->biaya_paket; ?>" readonly required  />
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota Tujuan</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGesndeadrr" name="kota_tujuan" required>
    <option value="">Pilih</option>
    <?php foreach ($dt_tujuan as $h): ?> 
        <option value="<?= $h->kota_tujuan; ?>" data-harga="<?= $h->harga_per_colly; ?>" <?php if($d->kota_tujuan==$h->kota_tujuan) { echo 'selected'; } ?>>
            <?= $h->kota_tujuan; ?> 
        </option>
    <?php endforeach; ?>
</select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Biaya Tambahan (jika ada)</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="biaya_tambahan" value="<?= $d->biaya_tambahan; ?>" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Penerima</label>
                            <div class="col-sm-9">
                              <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGenderr" name="id_penerima">
                         
                           <?php 
                  
                    foreach ($dt_penerima as $c):
                    ?> 
                       <option value="<?= $c->id_penerima; ?>" <?php if($d->id_penerima==$c->id_penerima) { echo 'selected'; } ?>><?= $c->nama_penerima; ?> - <?= $c->alamat_penerima; ?></option>
                  <?php endforeach; ?>
                        </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                              <input type="text" name="ket" value="<?= $d->ket; ?>" class="form-control" />
                            </div>
                          </div>
                        </div>


                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Isi Paket</label>
                            <div class="col-sm-9">
                              <input type="text" name="isi_barang" value="<?= $d->isi_barang; ?>" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Barang diterima</label>
                            <div class="col-sm-9">
                              <input type="date" name="barang_diterima" value="<?= $d->barang_diterima; ?>" class="form-control" />
                            </div>
                          </div>
                        </div>
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pembayaran</label>
                            <div class="col-sm-9">
                              <select class="form-select" name="pembayaran">
                                <option value="Lunas"  <?php if($d->pembayaran=='Lunas') { echo 'selected'; } ?>>Lunas</option>
                                <option value="Bayar Tujuan"  <?php if($d->pembayaran=='Bayar Tujuan') { echo 'selected'; } ?>>Bayar Tujuan</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>

                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">BTTB Kembali</label>
                            <div class="col-sm-9">
                              <input type="date" name="bttb_kembali" value="<?= $d->barang_diterima; ?>" class="form-control" />
                            </div>
                          </div>
                        </div>
<div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Faktur (gunakan pemisah <code>&lt;br&gt;</code> jika lebih dari satu)</label>
                            <div class="col-sm-9">
                             <textarea class="form-control" name="no_faktur" rows="4"><?= $d->no_faktur; ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                         <button type="submit" name="submit" class="btn btn-primary me-2">Update</button>
                    </form>
                  </div>
                </div>
              </div>
          
            </div>
        <script type="text/javascript">
   $(document).ready(function() {
    $('#exampleSelectGesndeadrr').change(function() {
        var selectedOption = $(this).find('option:selected');
        var hargaPerColly = selectedOption.data('harga'); // Get the harga_per_colly from the selected option
        $('#harga').val(hargaPerColly); // Set the harga input field value
    });
});

  </script>