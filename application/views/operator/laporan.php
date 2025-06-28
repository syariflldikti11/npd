<style>


/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: blue;
  color:white;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
          
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?= $judul; ?> </h4>
                     <p>Pilih tab di bawah</p>
                <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Transaksi BTTB</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Transaksi Surat Jalan</button>
<!--   <button class="tablinks" onclick="openCity(event, 'Tokyo')">Transaksi Detail Surat Jalan</button> -->
</div>

<div id="London" class="tabcontent">

    <?php  
             echo validation_errors();                       
    echo form_open('operator/laporan_transaksi_bttb'); ?>
  <div class="form-group">
                        <label for="exampleSelectGender">Pelanggan</label>
                      <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGender" name="id_pelanggan">
                         <option value="semua">Semua Pelanggan</option>
                           <?php 
                  
                    foreach ($dt_pelanggan as $a):
                    ?> 
                       <option value="<?= $a->id_pelanggan; ?>"><?= $a->nama_pelanggan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Dari tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="dari">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Sampai tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="sampai">
                      </div>
                        <div class="form-group">
                        <label for="exampleSelectGender">Pembuat Laporan</label>
                      <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGenderr" name="id_karyawan">
                        
                           <?php 
                  
                    foreach ($dt_karyawan as $h):
                    ?> 
                       <option value="<?= $h->nama_karyawan; ?>"><?= $h->nama_karyawan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                       <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                     </form>
</div>

<div id="Paris" class="tabcontent">
  <?php  
             echo validation_errors();                       
    echo form_open('operator/laporan_transaksi_surat_jalan'); ?>
  <div class="form-group">
                        <label for="exampleSelectGender">Sopir</label>
                      <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectsopir" name="id_sopir">
                         <option value="semua">Semua Sopir</option>
                           <?php 
                  
                    foreach ($dt_sopir as $sp):
                    ?> 
                       <option value="<?= $sp->id_karyawan; ?>"><?= $sp->nama_karyawan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Dari tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="dari">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Sampai tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="sampai">
                      </div>
                        <div class="form-group">
                        <label for="exampleSelectGender">Pembuat Laporan</label>
                      <select class="js-example-basic-single form-select" style="width:100%" id="exampleSelectGenderrs" name="id_karyawan">
                        
                           <?php 
                  
                    foreach ($dt_karyawan as $hs):
                    ?> 
                       <option value="<?= $hs->nama_karyawan; ?>"><?= $hs->nama_karyawan; ?></option>
                  <?php endforeach; ?>
                        </select>
                      </div>
                       <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                     </form>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
         

         <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>