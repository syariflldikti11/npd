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
                <th>Opsi</th>
                <th>No NPD</th>
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
             
               
               
        
            </tr>
        </thead>
        <tbody>
           <?php 
                    $no=1;
                    foreach ($dt_npd as $d):
                    ?> 
            <tr>
                <td><?= $no++; ?></td>
                 <td>
                   <?php if($d->status_npd==0 or $d->status_npd==2 ) :?> <a  class="btn  btn-success btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Kirim" 
onclick="return confirm('ajukan NPD ? data tidak bisa dirubah lagi')"
href="<?php echo base_url('kasubbag/kirim_npd/'.$d->id_permintaan_anggaran);?>" 
> <i class="fa fa-paper-plane-o"></i></a> <a  class="btn  btn-info btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Detail NPD" 

href="<?php echo base_url('kasubbag/rincian_npd/'.$d->id_permintaan_anggaran);?>" 
> <i class="fa fa-list"></i></a> <?php endif; ?>
                     <a class="btn  btn-dark btn-sm"  data-tooltip="tooltip"
  data-placement="top"
  title="Tracking" href="javascript:;"
       data-toggle="modal" data-target="#search<?= $d->id_permintaan_anggaran ?>"
         
          > 
 <i class="fa fa-search"></i></a>
<?php if($d->status_kpa==2) :?><a  class="btn  btn-danger btn-sm" data-tooltip="tooltip"
  data-placement="top"
  title="Cetak NPD" 

href="<?php echo base_url('kasubbag/cetak_npd/'.$d->id_permintaan_anggaran);?>" 
> <i class="fa fa-print"></i></a><?php endif; ?> </td>
                <td><?= $d->no_npd; ?></td>
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


  
<?php
                
                foreach ($dt_npd as $f): ?>
               <div class="modal fade" id="search<?= $f->id_permintaan_anggaran; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Status</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>


<!-- Modal body -->
<div class="modal-body">
PPTK :  <?php if($f->status_pptk==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($f->status_pptk==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>  <?php if($f->status_pptk==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $f->catatan_npd; ?> <?php endif; ?> <br />
KPA : <?php if($f->status_kpa==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($f->status_kpa==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>
                        <?php if($f->status_kpa==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $f->catatan_npd; ?>  <?php endif; ?>  <br />
PPKEU : <?php if($f->status_ppkeu==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($f->status_ppkeu==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>
                       <?php if($f->status_ppkeu==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $f->catatan_npd; ?>  <?php endif; ?>
                         <br />
BENDAHARA : <?php if($f->status_bend==1) :?><span class="badge badge-primary"> Diperiksa</span><?php endif; ?>
                       <?php if($f->status_bend==2) :?><span class="badge badge-success">Valid</span> <?php endif; ?>
                       <?php if($f->status_bend==3) :?><span class="badge badge-danger">Dikembalikan</span> <?= $f->catatan_npd; ?>  <?php endif; ?>
                        <br />

<!-- Modal footer -->
<div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">

</div>

</div>
</div>
</div>
</div>

<?php endforeach; ?>