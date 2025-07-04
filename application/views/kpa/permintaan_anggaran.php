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
                        
                       <?php if($d->status_permintaan==1) :?><span class="badge badge-danger"> Belum Diperiksa</span><?php endif; ?>
                       <?php if($d->status_permintaan==2) :?><span class="badge badge-warning">Dikembalikan</span> <?= $d->catatan; ?><?php endif; ?>
                       <?php if($d->status_permintaan==3) :?><span class="badge badge-danger">Di Tolak</span>  <?= $d->catatan; ?><?php endif; ?>
                     <?php if($d->status_permintaan==4) :?><span class="badge badge-success">Valid</span><?php endif; ?></td>
                <td><?= $d->nama_jenis_npd; ?></td>
                <td><?= $d->tgl_permintaan_anggaran; ?></td>
                <td><?= $d->program; ?></td>
                <td><?= $d->kegiatan; ?></td>
                <td><?= $d->sub_kegiatan; ?></td>
                
                <td><?= $d->no_dpa; ?></td>
                <td><?= $d->tahun_anggaran; ?></td>
                <td><?= $d->no_rek_05; ?> | <?= $d->nama_rek_05; ?></td>
                <td><?= $d->no_rek_06; ?> | <?= $d->nama_rek_06; ?></td>
          <td>  <a  target="_blank" href="<?= base_url();?>upload/<?= $d->file; ?>"><i class="fa fa-file"></i></a> </td>
             
                <td>
                <?php if($d->status_permintaan==1) :?><a class="btn  btn-success btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Validasi" href="javascript:;"
       data-toggle="modal" data-target="#edit"   
          data-id="<?= $d->id_permintaan_anggaran ?>"

         
          > 
 <i class="fa fa-check"></i></a> <?php endif; ?></td>
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


  

               <div class="modal fade" id="search" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Status</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>


<!-- Modal body -->
<div class="modal-body">
PPTK :  <?php if($d->status_pptk==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_pptk==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?> <br />
KPA : <?php if($d->status_kpa==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_kpa==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>  <br />
PPKEU : <?php if($d->status_ppkeu==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_ppkeu==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>  <br />
BENDAHARA : <?php if($d->status_bend==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($d->status_bend==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?> <br />

<!-- Modal footer -->
<div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">

</div>

</div>
</div>
</div>

</div>

   <div class="modal fade" id="edit" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Validasi Permintaan Anggaran</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('pptk/validasi_permintaan_anggaran'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
<input type="hidden" class="form-control"  name="id_permintaan_anggaran" id="id" required >
    <label for="exampleInputEmail1">Status</label>
<select class="form-control" name="status">
  <option value="4">Setuju</option>
  <option value="2">Kembalikan</option>
  <option value="3">Tolak</option>
</select>
    
  </div>
 <div class="mb-3">

    <label for="exampleInputEmail1">Catatan</label>
    <input type="text" class="form-control"  name="catatan"  placeholder="Hanya diisi jika dikembalikan/ditolak" >
    
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


});
});
</script>