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
                <th>Kegiatan</th>
                <th>Kode Sub Kegiatan</th>
                <th>Nama Sub Kegiatan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_sub_kegiatan as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->kode_kegiatan; ?> <?= $d->nama_kegiatan; ?></td>
                <td><?= $d->kode_sub_kegiatan; ?></td>
                <td><?= $d->nama_sub_kegiatan; ?></td>
               
                <td><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_sub_kegiatan/'.$d->id_sub_kegiatan);?>" 
> <i class="fa fa-trash"></i></a>  <a class="btn  btn-primary btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Edit" href="javascript:;"
      data-toggle="modal" data-target="#modaledit<?= $d->id_sub_kegiatan ?>"
         
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
<h4 class="modal-title">Tambah Sub Kegiatan</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/tambah_sub_kegiatan'); ?>

<!-- Modal body -->
<div class="modal-body">
   <div class="mb-3">

    <label for="exampleInputEmail1">Kegiatan</label>
   <select class="form-control" name="id_kegiatan" required>
                           <option value="">Pilih Kegiatan</option>
                           <?php 
                  
                    foreach ($dt_kegiatan as $a):
                    ?> 
                       <option value="<?= $a->id_kegiatan; ?>"><?= $a->kode_kegiatan; ?> <?= $a->nama_kegiatan; ?></option>
                  <?php endforeach; ?>
                        </select>
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Kode Sub Kegiatan</label>
    <input type="text" class="form-control"  name="kode_sub_kegiatan"  required >
    
  </div>
<div class="mb-3">

    <label for="exampleInputEmail1">Nama Sub Kegiatan</label>
    <input type="text" class="form-control"  name="nama_sub_kegiatan"  required >
    
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
                
                foreach ($dt_sub_kegiatan as $f): ?>

<div class="modal" id="modaledit<?= $f->id_sub_kegiatan; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Sub Kegiatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open('admin/update_sub_kegiatan'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" class="form-control" value="<?= $f->id_sub_kegiatan; ?>" name="id_sub_kegiatan" required >
    <div class="mb-3">
                        <label for="exampleInputEmail1">Kegiatan</label>
                     
                       <select class="form-control"  name="id_kegiatan">
                       
                          <option>--Pilih Kegiatan--</option>
                        <?php foreach ($dt_kegiatan as $u) :?>
                          <option value="<?= $u->id_kegiatan; ?>" <?php if($u->id_kegiatan == $f->id_kegiatan) { echo 'selected'; } ?>><?= $u->kode_kegiatan; ?> <?= $u->nama_kegiatan; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
      <div class="mb-3">
                        <label for="exampleInputEmail1">Kode Sub Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $f->kode_sub_kegiatan; ?>" name="kode_sub_kegiatan" required >
                        
                      </div>
       <div class="mb-3">
                        <label for="exampleInputEmail1">Nama Sub Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $f->nama_sub_kegiatan; ?>" name="nama_sub_kegiatan" required >
                        
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