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
                                   <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
                                  <table id="example" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama pegawai</th>
                <th>Nama Bagian</th>
               
               
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_pegawai as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->nip; ?></td>
                <td><?= $d->nama_pegawai; ?></td>
                <td><?= $d->nama_bagian; ?></td>
             
                <td><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_pegawai/'.$d->id_pegawai);?>" 
> <i class="fa fa-trash"></i></a> <a class="btn  btn-primary btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Edit" href="javascript:;"
      data-toggle="modal" data-target="#modaledit<?= $d->id_pegawai ?>"
         
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
<h4 class="modal-title">Tambah Pegawai</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/tambah_pegawai'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">

    <label for="exampleInputEmail1">NIP</label>
    <input type="number" class="form-control"  name="nip"  required >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Nama pegawai</label>
    <input type="text" class="form-control"  name="nama_pegawai"  required >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Bagian</label>
   <select class="form-control" name="id_bagian" required>
                           <option value="">Pilih Bagian</option>
                           <?php 
                  
                    foreach ($dt_bagian as $a):
                    ?> 
                       <option value="<?= $a->id_bagian; ?>"><?= $a->nama_bagian; ?></option>
                  <?php endforeach; ?>
                        </select>
    
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
                
                foreach ($dt_pegawai as $f): ?>

<div class="modal" id="modaledit<?= $f->id_pegawai; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open('admin/update_pegawai'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" class="form-control" value="<?= $f->id_pegawai; ?>" name="id_pegawai" required >
      <div class="mb-3">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="number" class="form-control" value="<?= $f->nip; ?>" name="nip" required >
                        
                      </div>
       <div class="mb-3">
                        <label for="exampleInputEmail1">Nama Pegawai</label>
                        <input type="text" class="form-control" value="<?= $f->nama_pegawai; ?>" name="nama_pegawai" required >
                        
                      </div>
                     
                      <div class="mb-3">
                        <label for="exampleInputEmail1">Bagian</label>
                     
                       <select class="form-control"  name="id_bagian">
                       
                          <option>--Pilih Bagian--</option>
                        <?php foreach ($dt_bagian as $u) :?>
                          <option value="<?= $u->id_bagian; ?>" <?php if($u->id_bagian == $f->id_bagian) { echo 'selected'; } ?>><?= $u->nama_bagian; ?></option>
                          <?php endforeach;?>
                          </select>
                        
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