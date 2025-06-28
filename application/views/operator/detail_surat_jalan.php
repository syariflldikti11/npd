
   <?php 

 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
 

?>       
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?= $judul; ?> <a class="btn btn-primary" href="<?= base_url('operator/tambah_detail_surat_jalan/'.$id);?>">Tambah Data</a></h4>
                     <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
          <?php if ($this->session->flashdata('warning')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('warning'); ?>
            </div>
        <?php endif; ?>
                    <div class="table-responsive">
                       <form method="post" action="<?php echo site_url('operator/update_multiple'); ?>">
                      <table id="example" class="table">
                        <thead>
                          <tr>
                             
                            <th>No</th>
                            <th>Opsi</th>
                            <th>Operator</th>
                            <th>No Surat Jalan</th>
                            <th>No BTTB</th>
                            <th>Tgl BTTB</th>
                            <th>Kota Asal</th>
                             <th>Pengirim</th>
                            <th>Kota Tujuan</th>
                            <th>Penerima</th>
                            <th>Jml Colly</th>
                            <th>Jml Dos</th>
                            <th>Berat KG</th>
                            <th>Biaya Paket</th>
                            <th>Isi Paket</th>
                           
                           
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                    $no=1;
                    foreach ($dt_detail_surat_jalan as $a):
                    ?> 
                      
                          <tr>
                             
                             <td><?= $no++; ?></td>
                    <td><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?= base_url('operator/delete_detail_surat_jalan/'.$a->id_detail_surat_jalan.'/'.$a->id_surat_jalan);?>" 
><i class="fa fa-trash fa-sm"></i></a>

</td>
  <td> <label class="badge badge-dark">Di input oleh : <?= $a->opr_input_detail; ?></label></td>
                    <td><?= $a->no_surat_jalan; ?></td>
                    <td><input type="checkbox" name="ids[]" value="<?= $a->id_detail_surat_jalan; ?>"> <?= $a->nobttb; ?></td>
                    <td><?=  $a->tgl_bttb; ?></td>
                    <td><?= $a->kota_asal; ?></td>
                    <td><?= $a->nama_pelanggan; ?></td>
                    <td><?= $a->kota_tujuan; ?></td>
                    <td><?= $a->nama_penerima; ?></td>
                    <td><?= $a->colly; ?></td>
                    <td><?= $a->dos; ?></td>
                    <td><?= $a->kg; ?></td>
                    <td><?= rupiah($a->biaya_paket); ?></td>
                    <td><?= $a->isi_barang; ?></td>
                  
                  
                   
                         
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                       
                 
                   <div class="form-group">
                        <select class="js-example-basic-single form-select" style="width:100%" id="category" name="id_surat_jalan" required>
                           <option value="">No Surat Jalan</option>
                           <?php 
                  
                    foreach ($dt_surat_jalan as $c):
                    ?> 

                       <option value="<?= $c->id_surat_jalan; ?>"><?= $c->no_surat_jalan; ?></option><?php endforeach; ?>
                        </select> 
                        <br /><button class="btn btn-primary" type="submit">Pindah BTTB</button>
                      </div>
<input type="hidden" name="id_sj" value="<?= $id ?>">
    </form>
                    </div>
                  </div>
                </div>
              </div>
              
              
            
            </div>
          <script>
        // Skrip untuk memilih semua checkbox
        document.getElementById('select_all').onclick = function() {
            var checkboxes = document.getElementsByName('ids[]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        }
    </script>