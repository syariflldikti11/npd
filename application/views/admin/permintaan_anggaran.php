 <div class="container-fluid">
   <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Sistem Informasi Nota Pencairan Dana (<?= $this->session->userdata('tahun'); ?>)</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><?= $judul; ?></h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                  <table id="example" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th>Jenis NPD</th>
                <th>Tanggal</th>
                  <th>Program</th>
                <th>Kegiatan</th>
                <th>Sub Kegiatan</th>
              
                <th>No DPA</th>
                <th>Tahun Anggaran</th>
                <th>Rek 05</th>
                <th>Rek 06</th>
                <th>RAB</th>
             
               
               
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_permintaan_anggaran as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                 <td>
                        <?php if($d->status_permintaan==0) :?><span class="badge badge-dark">Belum Dikirim</span><?php endif; ?>
                       <?php if($d->status_permintaan==1) :?><span class="badge badge-primary"> Dikirim</span><?php endif; ?>
                       <?php if($d->status_permintaan==2) :?><span class="badge badge-warning">Dikembalikan</span> <?= $d->catatan; ?><?php endif; ?>
                       <?php if($d->status_permintaan==3) :?><span class="badge badge-danger">Di Tolak</span>  <?= $d->catatan; ?> <?php endif; ?>
                     <?php if($d->status_permintaan==4) :?><span class="badge badge-success">Di Setujui</span><?php endif; ?></td>
                <td><?= $d->nama_jenis_npd; ?></td>
                <td><?= $d->tgl_permintaan_anggaran; ?></td>
                <td><?= $d->program; ?></td>
                <td><?= $d->kegiatan; ?></td>
                <td><?= $d->sub_kegiatan; ?></td>
                
                <td><?= $d->no_dpa; ?></td>
                <td><?= $d->tahun_anggaran; ?></td>
                <td><?= $d->no_rek_05; ?> | <?= $d->nama_rek_05; ?></td>
                <td><?= $d->no_rek_06; ?> | <?= $d->nama_rek_06; ?></td>
          <td> <a  target="_blank" href="<?= base_url();?>upload/<?= $d->file; ?>"><i class="fa fa-file"></i></a> </td>
             
                <td>
                   <?php if($d->status_permintaan==0 or $d->status_permintaan==2) :?><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_permintaan_anggaran/'.$d->id_permintaan_anggaran);?>" 
> <i class="fa fa-trash"></i></a> <a class="btn  btn-primary btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Edit" href="javascript:;"
      data-toggle="modal" data-target="#modaledit<?= $d->id_permintaan_anggaran ?>"
         
          > 
 <i class="fa fa-edit"></i></a> <a  class="btn  btn-success btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Kirim" 
onclick="return confirm('ajukan permintaan ? data tidak bisa dirubah lagi')"
href="<?php echo base_url('admin/kirim_permintaan_anggaran/'.$d->id_permintaan_anggaran);?>" 
> <i class="fa fa-paper-plane-o"></i></a><?php endif; ?></td>
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
<h4 class="modal-title">Tambah Permintaan Anggaran</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open_multipart('admin/tambah_permintaan_anggaran'); ?>

<!-- Modal body -->
<div class="modal-body">
  <div class="mb-3">

    <label for="exampleInputEmail1">Jenis NPD</label>
   <select class="form-control" name="id_jenis_npd"  required>
                           <option value="">Pilih Jenis NPD</option>
                           <?php 
                  
                    foreach ($dt_jenis_npd as $k):
                    ?> 
                       <option value="<?= $k->id_jenis_npd; ?>"><?= $k->nama_jenis_npd; ?></option>
                  <?php endforeach; ?>
                        </select>
    
  </div>
<div class="mb-3">

    <label for="exampleInputEmail1">Tanggal</label>
    <input type="date" class="form-control"  name="tgl_permintaan_anggaran" value="<?= date('Y-m-d'); ?>"  required >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Program</label>
    <input type="text" class="form-control"  name="program" required >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Kegiatan</label>
    <input type="text" class="form-control"  name="kegiatan" required >
    
  </div>

  <div class="mb-3">

    <label for="exampleInputEmail1">Sub Kegiatan</label>
    <input type="text" class="form-control"  name="sub_kegiatan" required >
    
  </div>
   
   <div class="mb-3">

    <label for="exampleInputEmail1">No DPA</label>
    <input type="text" class="form-control"  name="no_dpa" required >
    
  </div>
   <div class="mb-3">

    <label for="exampleInputEmail1">Rek 05</label>
   <select class="form-control" name="id_rek_05" id="rek_05" required>
                           <option value="">Pilih Rek 05</option>
                           <?php 
                  
                    foreach ($dt_rek_05 as $a):
                    ?> 
                       <option value="<?= $a->id_rek_05; ?>"><?= $a->no_rek_05; ?> <?= $a->nama_rek_05; ?></option>
                  <?php endforeach; ?>
                        </select>
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Rek 06</label>
   <select class="form-control" name="id_rek_06" id="rek_06" required>
                           <option value="">Pilih Rek 06</option>
          </select>                
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">File</label>
    <input type="file" class="form-control" name="file" required >
    
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
                
                foreach ($dt_permintaan_anggaran as $f): ?>

<div class="modal" id="modaledit<?= $f->id_permintaan_anggaran; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit permintaan_anggaran</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open_multipart('admin/update_permintaan_anggaran'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" class="form-control" value="<?= $f->id_permintaan_anggaran; ?>" name="id_permintaan_anggaran" required >
       <input type="hidden" class="form-control" name="old_id_rek_05" value="<?= $f->id_rek_05; ?>">
        <input type="hidden" class="form-control" name="old_id_rek_06" value="<?= $f->id_rek_06; ?>">
         <input type="hidden" class="form-control" name="old_file" value="<?= $f->file; ?>">
      <div class="mb-3">

    <label for="exampleInputEmail1">Jenis NPD</label>
   <select class="form-control" name="id_jenis_npd"  required>
                           <option value="">Pilih Jenis NPD</option>
                           <?php 
                  
                    foreach ($dt_jenis_npd as $k):
                    ?> 
                       <option value="<?= $k->id_jenis_npd; ?>" <?php if($k->id_jenis_npd == $f->id_jenis_npd) { echo 'selected'; } ?>><?= $k->nama_jenis_npd; ?></option>
                  <?php endforeach; ?>
                        </select>
    
  </div>
      <div class="mb-3">
                        <label for="exampleInputEmail1">Tanggal</label>
                        <input type="date" class="form-control" value="<?= $f->tgl_permintaan_anggaran; ?>" name="tgl_permintaan_anggaran" required >
                        
                      </div>
       <div class="mb-3">
                        <label for="exampleInputEmail1">Program</label>
                        <input type="text" class="form-control" value="<?= $f->program; ?>" name="program" required >
                        
                      </div>

                         <div class="mb-3">
                        <label for="exampleInputEmail1">Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $f->kegiatan; ?>" name="kegiatan" required >
                        
                      </div>

                       <div class="mb-3">
                        <label for="exampleInputEmail1">Sub Kegiatan</label>
                        <input type="text" class="form-control" value="<?= $f->sub_kegiatan; ?>" name="sub_kegiatan" required >
                        
                      </div>
                     
                   <div class="mb-3">

    <label for="exampleInputEmail1">Rek 05</label>
   <select class="form-control" name="id_rek_05" id="rek_005" required>
                           <option value="old">Pilih Rek 05</option>
                           <?php 
                  
                    foreach ($dt_rek_05 as $n):
                    ?> 
                       <option value="<?= $n->id_rek_05; ?>"><?= $n->no_rek_05; ?> <?= $n->nama_rek_05; ?></option>
                  <?php endforeach; ?>
                        </select>
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Rek 06</label>
   <select class="form-control" name="id_rek_06" id="rek_006" required>
                           <option value="old">Pilih Rek 06</option>
          </select>                
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">File</label>
    <input type="file" class="form-control" name="file" >
    
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


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function(){
  $('#rek_05').change(function(){
    var id_rek_05 = $(this).val();
    $.ajax({
      url: "<?= base_url('admin/get_rek_06'); ?>",
      method: "POST",
      data: {id_rek_05: id_rek_05},
      success: function(data){
        $('#rek_06').html(data); // data berupa HTML <option>
      },
      error: function(xhr, status, error){
        alert("AJAX Error: " + status + " - " + error);
      }
    });
  });
});
</script>

<script>
$(document).ready(function(){
  $('#rek_005').change(function(){
    var id_rek_05 = $(this).val();
    $.ajax({
      url: "<?= base_url('admin/get_rek_06'); ?>",
      method: "POST",
      data: {id_rek_05: id_rek_05},
      success: function(data){
        $('#rek_006').html(data); // data berupa HTML <option>
      },
      error: function(xhr, status, error){
        alert("AJAX Error: " + status + " - " + error);
      }
    });
  });
});
</script>
