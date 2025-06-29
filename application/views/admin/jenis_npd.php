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
                <th>Nama Jenis NPD</th>
               
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_jenis_npd as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->nama_jenis_npd; ?></td>
               
                <td><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_jenis_npd/'.$d->id_jenis_npd);?>" 
> <i class="fa fa-trash"></i></a> <a class="btn  btn-primary btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Edit" href="javascript:;"
       data-toggle="modal" data-target="#edit"   
          data-id="<?= $d->id_jenis_npd ?>"
          data-nama_jenis_npd="<?= $d->nama_jenis_npd ?>"
         
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
<h4 class="modal-title">Tambah Jenis NPD</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/tambah_jenis_npd'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">

    <label for="exampleInputEmail1">Nama Jenis NPD</label>
    <input type="text" class="form-control"  name="nama_jenis_npd"  required >
    
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


   <div class="modal fade" id="edit" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Update Jenis NPD</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/update_jenis_npd'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
<input type="hidden" class="form-control"  name="id_jenis_npd" id="id" required >
    <label for="exampleInputEmail1">Nama Jenis NPD</label>
    <input type="text" class="form-control"  name="nama_jenis_npd" id="nama_jenis_npd" required >
    
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

<script>
$(document).ready(function() {

$('#edit').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)
var modal   = $(this)
modal.find('#id').attr("value",div.data('id'));
modal.find('#nama_jenis_npd').attr("value",div.data('nama_jenis_npd'));


});
});
</script>