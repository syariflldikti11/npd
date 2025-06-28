 <div class="container-fluid">
   <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Sistem Informasi Nota Pencairan Dana</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><?= $judul; ?>  <button
                        class="btn btn-primary btn-round ms-auto"
                   data-toggle="modal" data-target="#add" 
                      >
                        <i class="fa fa-plus"></i>
                        Tambah
                      </button></h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                  <table id="example" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Nama Bagian</th>
                <th>Akses</th>
                <th>Tahun</th>
               
               
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_akun as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->nip; ?></td>
                <td><?= $d->nama_pegawai; ?></td>
                <td><?= $d->nama_bagian; ?></td>
                <td><?= $d->nama_role; ?></td>
                <td><?= $d->tahun_akun; ?></td>
             
                <td><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_akun/'.$d->id_akun);?>" 
> <i class="fa fa-trash"></i></a> <a class="btn  btn-primary btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Edit" href="javascript:;"
      data-toggle="modal" data-target="#modaledit<?= $d->id_akun ?>"
         
          > 
 <i class="fa fa-edit"></i></a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
       
    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
               </div>

               <div class="modal fade" id="add" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Tambah Akun</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/tambah_akun'); ?>

<!-- Modal body -->
<div class="modal-body">
  <div class="mb-3">

    <label for="exampleInputEmail1">pegawai</label>
   <select class="form-control" name="id_pegawai" required>
                           <option value="">Pilih Pegawai</option>
                           <?php 
                  
                    foreach ($dt_pegawai as $a):
                    ?> 
                       <option value="<?= $a->id_pegawai; ?>"><?= $a->nama_pegawai; ?> <?= $a->nama_bagian; ?></option>
                  <?php endforeach; ?>
                        </select>
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Akses</label>
   <select class="form-control" name="id_role" required>
                           <option value="">Pilih Akses</option>
                           <?php 
                  
                    foreach ($dt_role as $h):
                    ?> 
                       <option value="<?= $h->id_role; ?>"><?= $h->nama_role; ?></option>
                  <?php endforeach; ?>
                        </select>
    
  </div>
<div class="mb-3">

    <label for="exampleInputEmail1">Tahun Akun</label>
    <input type="text" class="form-control"  name="tahun_akun"  required >
    
  </div>
  
  
 
  
</div>

<!-- Modal footer -->
<div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">

</div>
</form>
</div>
</div>
</div>


   <?php
                
                foreach ($dt_akun as $f): ?>

<div class="modal" id="modaledit<?= $f->id_akun; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit akun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open('admin/update_akun'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" class="form-control" value="<?= $f->id_akun; ?>" name="id_akun" required >
    
     
                     
                      <div class="mb-3">
                        <label for="exampleInputEmail1">Pegawai</label>
                     
                       <select class="form-control"  name="id_pegawai">
                       
                          <option>--Pilih pegawai--</option>
                        <?php foreach ($dt_pegawai as $u) :?>
                          <option value="<?= $u->id_pegawai; ?>" <?php if($u->id_pegawai == $f->id_pegawai) { echo 'selected'; } ?>><?= $u->nama_pegawai; ?> <?= $u->nama_bagian; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1">Akses</label>
                     
                       <select class="form-control"  name="id_role">
                       
                          <option>--Pilih Akses--</option>
                        <?php foreach ($dt_role as $o) :?>
                          <option value="<?= $o->id_role; ?>" <?php if($o->id_role == $f->id_role) { echo 'selected'; } ?>><?= $o->nama_role; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                        <div class="mb-3">
                        <label for="exampleInputEmail1">Tahun Akun</label>
                        <input type="number" class="form-control" value="<?= $f->tahun_akun; ?>" name="tahun_akun" required >
                        
                      </div>
                      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Update">

      </div>
</form>
    </div>
  </div>
</div>
<?php endforeach; ?>