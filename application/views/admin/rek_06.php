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
                                   <h3><?= $a->no_rek_05; ?> <?= $a->nama_rek_05; ?></h3>
                                  <table id="example" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Rek 06</th>
                <th>No Rek 06</th>
               
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_rek_06 as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->nama_rek_06; ?></td>
                <td><?= $d->no_rek_06; ?></td>
               
                <td><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_rek_06/'.$d->id_rek_06.'/'.$id);?>" 
> <i class="fa fa-trash"></i></a> <a class="btn  btn-primary btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Edit" href="javascript:;"
       data-toggle="modal" data-target="#edit"   
          data-id="<?= $d->id_rek_06 ?>"
          data-nama_rek_06="<?= $d->nama_rek_06 ?>"
          data-no_rek_06="<?= $d->no_rek_06 ?>"
         
          > 
 <i class="fa fa-edit"></i></a> <a  class="btn  btn-dark btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Rek 06" 

href="<?php echo base_url('admin/rek_06/'.$d->id_rek_06);?>" 
> <i class="fa fa-list"></i></a></td>
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
<h4 class="modal-title">Tambah Rek 06</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/tambah_rek_06'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">

    <label for="exampleInputEmail1">Nama Rek 06</label>
    <input type="text" class="form-control"  name="nama_rek_06"  required >
    <input type="hidden" class="form-control"  name="id_rek_05" value="<?= $id; ?>"  required >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">No Rek 06</label>
    <input type="text" class="form-control"  name="no_rek_06"  required >
    
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
<h4 class="modal-title">Update Rek 06</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/update_rek_06'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
<input type="hidden" class="form-control"  name="id_rek_06" id="id" required >
    <label for="exampleInputEmail1">Nama rek_06</label>
    <input type="text" class="form-control"  name="nama_rek_06" id="nama_rek_06" required >
     <input type="hidden" class="form-control"  name="id_rek_05" value="<?= $id; ?>"  required >
  </div>
 <div class="mb-3">

    <label for="exampleInputEmail1">No Rek 06</label>
    <input type="text" class="form-control"  name="no_rek_06" id="no_rek_06"  required >
    
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
modal.find('#nama_rek_06').attr("value",div.data('nama_rek_06'));
modal.find('#no_rek_06').attr("value",div.data('no_rek_06'));


});
});
</script>