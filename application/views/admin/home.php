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
                                    <h2><?= $judul; ?>  </h2>
                                 </div>
                              </div>
  <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                         Selamat Datand di Sistem Informasi Nota Pencairan Dana (NPD) Sekretariat Daerah Kabupaten Banjar
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
              
                   <div class="col-md-4">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Pencairan Tahun <?= $tahun=$this->session->userdata('tahun'); ?></div>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    
                    <div id="chart"></div>
                  </div>
                </div>
              </div>

                <div class="col-md-4">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Pencairan Berdasarkan Jenis <?= $tahun=$this->session->userdata('tahun'); ?></div>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    
                    <div id="pc_jenis"></div>
                  </div>
                </div>
              </div>
                <div class="col-md-4">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Pencairan Berdasarkan Bagian <?= $tahun=$this->session->userdata('tahun'); ?></div>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    
                    <div id="pc_bagian"></div>
                  </div>
                </div>
              </div>
                 
                  </div>
                  
               </div>

   