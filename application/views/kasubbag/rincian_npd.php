  <?php 

 
function rupiah($angka){
  
  $hasil_rupiah = "" . number_format($angka,0,',','.');
  return $hasil_rupiah;
 
}
 

?>
 <div class="container-fluid">
   <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Sistem Informasi Nota Pencairan Dana (<?= $this->session->userdata('ses_bag'); ?> <?= $this->session->userdata('tahun'); ?>)</h2>
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
                                <?php  
echo validation_errors();                       
echo form_open_multipart('kasubbag/update_potongan'); ?>
 <input type="hidden" class="form-control"  name="id_permintaan_anggaran" value="<?= $id; ?>"  required >
  <div class="mb-3">

    <label for="exampleInputEmail1">No NPD</label>
    <input type="text" class="form-control" value="<?= $y->no_npd; ?>"  name="no_npd"  required >
    
  </div>
                                <div class="mb-3">

    <label for="exampleInputEmail1">Persentasi PPN</label>
    <input type="text" class="form-control" value="<?= $y->ppn; ?>"  name="ppn"  required >
    
  </div>
   <div class="mb-3">

    <label for="exampleInputEmail1">Persentasi Pajak Daerah</label>
    <input type="text" class="form-control"  name="pajak_daerah" value="<?= $y->pajak_daerah; ?>"  required >
    
  </div>
   <div class="mb-3">

    <label for="exampleInputEmail1">Dokumen Pendukung</label> <?php if($y->dokumen!='') :?> <a class="btn btn-dark"  target="_blank" href="<?= base_url();?>upload/<?= $y->dokumen; ?>">Lihat</a> <?php endif; ?>
    <input type="file" class="form-control"  name="dokumen" >
    <input type="hidden" class="form-control" value="<?= $y->dokumen; ?>"  name="old_dokumen" >
    
  </div>
  
   <div class="card-action">
                     <button type="submit" name="submit" class="btn btn-primary me-2">Update</button>
                   
                  </div>
                </form>
                                 <div class="table-responsive-sm">
                                 
                                  <table id="example" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Uraian</th>
                <th>Anggaran</th>
                <th>RAK Tersedia</th>
                <th>Akumulasi Pencairan Sebelumnya</th>
                <th>Pengajuan Pencairan</th>
                  <th>Akumulasi Pencairan sd Saat ini</th>
                  <th>Sisa</th>
               
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_rincian_npd as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->uraian; ?></td>
                <td><?= rupiah($d->anggaran); ?></td>
                <td><?= rupiah($d->rak_tersedia); ?></td>
                <td><?= rupiah($d->akum_before); ?></td>
                <td><?= rupiah($d->pencairan); ?></td>
                <td><?= rupiah($d->akum_after); ?></td>
                <td><?= rupiah($d->sisa); ?></td>
               
                <td><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('kasubbag/delete_rincian_npd/'.$d->id_rincian_npd.'/'.$id);?>" 
> <i class="fa fa-trash"></i></a> <a class="btn  btn-primary btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Edit" href="javascript:;"
       data-toggle="modal" data-target="#edit"   
          data-id="<?= $d->id_rincian_npd ?>"
          data-uraian="<?= $d->uraian ?>"
          data-anggaran="<?= $d->anggaran ?>"
          data-rak_tersedia="<?= $d->rak_tersedia ?>"
          data-akum_before="<?= $d->akum_before ?>"
          data-pencairan="<?= $d->pencairan ?>"
          data-akum_after="<?= $d->akum_after ?>"
          data-sisa="<?= $d->sisa ?>"
         
          > 
 <i class="fa fa-edit"></i></a> </td>
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
echo form_open('kasubbag/tambah_rincian_npd'); ?>

<!-- Modal body -->
<div class="modal-body">
  <input type="hidden" class="form-control"  name="id_permintaan_anggaran" value="<?= $id; ?>"  required >
<div class="mb-3">

    <label for="exampleInputEmail1">Uraian</label>
    <input type="text" class="form-control"  name="uraian"  required >
    
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Anggaran</label>
    <input type="number" class="form-control"  name="anggaran"  >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">RAK Tersedia</label>
    <input type="number" class="form-control"  name="rak_tersedia"  >
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Akumulasi Pencairan Sebelumnya</label>
    <input type="number" class="form-control"  name="akum_before"  >
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Pengajuan Pencairan</label>
    <input type="number" class="form-control"  name="pencairan"  >
    
  </div>
   <div class="mb-3">

    <label for="exampleInputEmail1">Akumulasi Pencairan sd Saat ini</label>
    <input type="number" class="form-control"  name="akum_after"  >
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Sisa</label>
    <input type="number" class="form-control"  name="sisa"  >
    
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
<h4 class="modal-title">Update Rincian NPD</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('kasubbag/update_rincian_npd'); ?>

<!-- Modal body -->
<div class="modal-body">

<input type="hidden" class="form-control"  name="id_rincian_npd" id="id" required >
   
     <input type="hidden" class="form-control"  name="id_permintaan_anggaran" value="<?= $id; ?>"  required >
  
 <div class="mb-3">

    <label for="exampleInputEmail1">Uraian</label>
    <input type="text" class="form-control"  name="uraian" id="uraian"  required >
    
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Anggaran</label>
    <input type="number" class="form-control"  name="anggaran" id="anggaran"  >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">RAK Tersedia</label>
    <input type="number" class="form-control"  name="rak_tersedia" id="rak_tersedia"  >
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Akumulasi Pencairan Sebelumnya</label>
    <input type="number" class="form-control"  name="akum_before" id="akum_before"  >
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Pengajuan Pencairan</label>
    <input type="number" class="form-control"  name="pencairan" id="pencairan"  >
    
  </div>
   <div class="mb-3">

    <label for="exampleInputEmail1">Akumulasi Pencairan sd Saat ini</label>
    <input type="number" class="form-control"  name="akum_after" id="akum_after"  >
    
  </div>
    <div class="mb-3">

    <label for="exampleInputEmail1">Sisa</label>
    <input type="number" class="form-control"  name="sisa" id="sisa"  >
    
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
modal.find('#uraian').attr("value",div.data('uraian'));
modal.find('#anggaran').attr("value",div.data('anggaran'));
modal.find('#akum_after').attr("value",div.data('akum_after'));
modal.find('#pencairan').attr("value",div.data('pencairan'));
modal.find('#akum_before').attr("value",div.data('akum_before'));
modal.find('#sisa').attr("value",div.data('sisa'));
modal.find('#rak_tersedia').attr("value",div.data('rak_tersedia'));


});
});
</script>