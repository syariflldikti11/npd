<?php

class M_umum extends CI_model
{
function hitung($tabel){
    $query=$this->db->get($tabel);
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else{
      return 0;
    }
  }
    public function update_multiple($data, $ids) {
        // Loop untuk memperbarui setiap item berdasarkan ID
        foreach ($ids as $id) {
            $this->db->where('id_detail_surat_jalan', $id);
            $this->db->update('detail_surat_jalan', $data); // 'items' adalah nama tabel
        }
    }
      public function get_id_bttb_by_ids($ids) {
        $this->db->select('id_bttb');  // Hanya memilih field 'email'
        $this->db->where_in('id_bttb', $ids);  // Ambil data berdasarkan ID yang dipilih
        return $this->db->get('bttb')->result();  // Gantilah 'data_table' dengan nama tabel Anda
    }

    // Fungsi untuk melakukan insert batch untuk email
    public function insert_multiple_id_bttb($data) {
        return $this->db->insert_batch('detail_surat_jalan', $data);  // Gantilah 'emails_table' dengan nama tabel Anda
    }
 
  function hitung_data($tabel, $kolom = FALSE, $id = FALSE)
  {
      
    $q = $this->db->get_where($tabel, array($kolom => $id)); //ambil satu baris data dengan $kolom=$id
    
    if($q->num_rows()>0)
    {
      return $q->num_rows();
    }
    else{
      return 0;
    }     //kembalikan
  }
  function get_data($tabel)
  {
    $query = $this->db->get($tabel);
    return $query->result();
  }
 
  function ambil_data($tabel, $kolom = FALSE, $id = FALSE)
  {
    if ($id === FALSE) {
      $q = $this->db->get($tabel);  //ambil seluruh data tabel
      return $q->result();    //kembalikan
    }
    $q = $this->db->get_where($tabel, array($kolom => $id)); //ambil satu baris data dengan $kolom=$id
    return $q->row();       //kembalikan
  }

  function hapus($tabel, $kolom, $id)
  {
    $this->db->delete($tabel, array($kolom => $id));
  }
  function set_data($tabel)
  {
    $data = $this->input->post(null, TRUE);
    array_pop($data);
    return $this->db->insert($tabel, $data);
  }
  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }
  function UpdateData($tabelName, $data, $where)
  {
    $res = $this->db->update($tabelName, $data, $where);
    return $res;
  }
  function update_data($tabel)
  {
    $data = $this->input->post(null, TRUE);
    $primary = array_slice($data, 0, 1);
    array_shift($data);
    array_pop($data);
    $this->db->where($primary);
    $this->db->update($tabel, $data);
  }

  function hapus_data($tabel, $kolom, $id)
  {
    $this->db->delete($tabel, array($kolom => $id));
    if (!$this->db->affected_rows())
      return (FALSE);
    else
      return (TRUE);
  }
  function get_akun()
  {   
     
    $this->db->select('*');
      $this->db->from('akun a');
    $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
    $this->db->join('role c','a.id_role=c.id_role','left');
     $this->db->join('bagian d','b.id_bagian=d.id_bagian','left');
      
     $query = $this->db->get();
     return $query->result(); 
    }
    function get_permintaan_anggaran()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.id_akun',$id);
        $this->db->where('a.tahun_anggaran',$tahun);
    $this->db->order_by('a.tgl_input desc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_permintaan_anggaran_admin()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.tahun_anggaran',$tahun);
    $this->db->order_by('a.tgl_input desc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_npd_cetak($id)
  {   

    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
      $this->db->join('pegawai f','f.id_pegawai=b.id_pegawai','left');
    $this->db->join('bagian g','f.id_bagian=g.id_bagian','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.id_permintaan_anggaran',$id);
      
      
     $query = $this->db->get();
     return $query->row(); 
    }
    function get_npd()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.id_akun',$id);
        $this->db->where('a.tahun_anggaran',$tahun);
        $this->db->where('a.status_permintaan',4);
    $this->db->order_by('a.tgl_input desc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
    function get_npd_admin()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
 
        $this->db->where('a.tahun_anggaran',$tahun);
        $this->db->where('a.status_permintaan',4);
    $this->db->order_by('a.tgl_input desc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_permintaan_anggaran_pptk()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $tahun_akun=$this->session->userdata('tahun_akun');
    $id_bagian=$this->session->userdata('ses_id_bag');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('pegawai f','f.id_pegawai=b.id_pegawai','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.tahun_anggaran',$tahun_akun);
        $this->db->where('f.id_bagian',$id_bagian);
        $this->db->where('a.status_permintaan between 1 and 4');
    $this->db->order_by('a.status_permintaan asc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
    function get_npd_pptk()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $tahun_akun=$this->session->userdata('tahun_akun');
    $id_bagian=$this->session->userdata('ses_id_bag');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('pegawai f','f.id_pegawai=b.id_pegawai','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.tahun_anggaran',$tahun_akun);
        $this->db->where('f.id_bagian',$id_bagian);
        $this->db->where('a.status_pptk between 1 and 2');
    $this->db->order_by('a.status_pptk asc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_npd_bendahara()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $tahun_akun=$this->session->userdata('tahun_akun');
    $id_bagian=$this->session->userdata('ses_id_bag');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('pegawai f','f.id_pegawai=b.id_pegawai','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.tahun_anggaran',$tahun_akun);
        $this->db->where('f.id_bagian',$id_bagian);
        $this->db->where('a.status_bend between 1 and 2');
    $this->db->order_by('a.status_bend asc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
      function get_npd_kpa()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $tahun_akun=$this->session->userdata('tahun_akun');
    $id_bagian=$this->session->userdata('ses_id_bag');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('pegawai f','f.id_pegawai=b.id_pegawai','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.tahun_anggaran',$tahun_akun);
        $this->db->where('f.id_bagian',$id_bagian);
        $this->db->where('a.status_kpa between 1 and 2');
    $this->db->order_by('a.status_kpa asc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
      function get_npd_ppkeu()
  {   
    $id=$this->session->userdata('ses_id');
    $tahun=$this->session->userdata('tahun');
    $tahun_akun=$this->session->userdata('tahun_akun');
    $id_bagian=$this->session->userdata('ses_id_bag');
    $this->db->select('*');
      $this->db->from('permintaan_anggaran a');
    $this->db->join('jenis_npd e','a.id_jenis_npd=e.id_jenis_npd','left');
    $this->db->join('akun b','a.id_akun=b.id_akun','left');
    $this->db->join('pegawai f','f.id_pegawai=b.id_pegawai','left');
    $this->db->join('bagian g','f.id_bagian=g.id_bagian','left');
    $this->db->join('rek_05 d','a.id_rek_05=d.id_rek_05','left');
    $this->db->join('rek_06 c','a.id_rek_06=c.id_rek_06','left');
        $this->db->where('a.status_ppkeu between 1 and 2');
    $this->db->order_by('a.status_ppkeu asc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
  function get_pegawai()
  {   
     
    $this->db->select('*');
      $this->db->from('pegawai a');
    $this->db->join('bagian b','a.id_bagian=b.id_bagian','left');
    $this->db->order_by('b.nama_bagian asc');
      
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_rek_06($id)
  {   
     
    $this->db->select('*');
      $this->db->from('rek_06 a');
    $this->db->join('rek_05 b','a.id_rek_05=b.id_rek_05','left');
          $this->db->where('a.id_rek_05',$id);
     $query = $this->db->get();
     return $query->result(); 
    }
       function get_rincian_npd($id)
  {   
     
    $this->db->select('*');
      $this->db->from('rincian_npd a');
    $this->db->join('permintaan_anggaran b','a.id_permintaan_anggaran=b.id_permintaan_anggaran','left');
          $this->db->where('a.id_permintaan_anggaran',$id);
     $query = $this->db->get();
     return $query->result(); 
    }
   function get_pelanggan_tetap(){
                 $this->db->select('*');
      $this->db->from('pelanggan a');
    $this->db->where('a.jenis_pelanggan',0);
      $query = $this->db->get();
                  return $query->result();
        }
        function get_pelanggan_umum(){
                 $this->db->select('*');
      $this->db->from('pelanggan a');
    $this->db->where('a.jenis_pelanggan',1);
      $query = $this->db->get();
                  return $query->result();
        }
 
        function get_sub_tarif_pelanggan($id_pelanggan){
                $query = $this->db->get_where('tarif_pelanggan', array('id_pelanggan' => $id_pelanggan));
                  return $query;
        }
  function get_karyawan()
  {   
     
    $this->db->select('*');
      $this->db->from('karyawan a');
    $this->db->join('jabatan b','a.id_jabatan=b.id_jabatan','left');
      
     $query = $this->db->get();
     return $query->result(); 
    }
    function laporan_bttb_semua($dari,$sampai)
  {   
     $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('bttb a');
    $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan','left');
    $this->db->join('penerima c','a.id_penerima=c.id_penerima','left');
      $this->db->where('a.tgl_bttb between "'.$dari.'" and "'.$sampai.'"');    
         $this->db->order_by('a.tgl_input_bttb asc');
     $query = $this->db->get();
     return $query->result(); 
    }
     function laporan_bttb($id_pelanggan,$dari,$sampai)
  {   
     $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('bttb a');
    $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan','left');
    $this->db->join('penerima c','a.id_penerima=c.id_penerima','left');
      $this->db->where('a.tgl_bttb between "'.$dari.'" and "'.$sampai.'"'); 
       $this->db->where('a.id_pelanggan',$id_pelanggan);   
         $this->db->order_by('a.tgl_input_bttb asc');
     $query = $this->db->get();
     return $query->result(); 
    }
       function laporan_surat_jalan_semua($dari,$sampai)
  {   
      $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('surat_jalan a');
    $this->db->join('karyawan b','a.id_karyawan=b.id_karyawan','left');
      $this->db->where('a.tgl_surat_jalan between "'.$dari.'" and "'.$sampai.'"');    
         $this->db->order_by('a.tgl_input_surat_jalan asc');
     $query = $this->db->get();
     return $query->result(); 
    }
    function laporan_surat_jalan($id_sopir,$dari,$sampai)
  {   
      $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('surat_jalan a');
    $this->db->join('karyawan b','a.id_karyawan=b.id_karyawan','left');
      $this->db->where('a.tgl_surat_jalan between "'.$dari.'" and "'.$sampai.'"');  
       $this->db->where('a.id_karyawan',$id_sopir);   
         $this->db->order_by('a.tgl_input_surat_jalan asc');
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_tarif_pelanggan($id)
  {   
     $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('tarif_pelanggan a');
    $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan','left');
      $this->db->where('a.id_pelanggan',$id);
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_bttb()
  {   
     $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('bttb a');
    $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan','left');
    $this->db->join('penerima c','a.id_penerima=c.id_penerima','left');
      $this->db->where('year(a.tgl_bttb)',$tahun);
         $this->db->order_by('a.tgl_input_bttb desc');
     $query = $this->db->get();
     return $query->result(); 
    }
    function get_bttb_kirim()
  {   
      
    $this->db->select('*');
      $this->db->from('bttb a');
    $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan','left');
    $this->db->join('penerima c','a.id_penerima=c.id_penerima','left');
      
      $this->db->where('a.status_barang',0);
         $this->db->order_by('a.tgl_input_bttb desc');
     $query = $this->db->get();
     return $query->result(); 
    }
     function get_surat_jalan()
  {   
      $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('surat_jalan a');
    $this->db->join('karyawan b','a.id_karyawan=b.id_karyawan','left');
        $this->db->where('year(a.tgl_surat_jalan)',$tahun);
         $this->db->order_by('a.tgl_input_surat_jalan desc');
     $query = $this->db->get();
     return $query->result(); 
    }
    function get_surat_jalan_cetak($id)
  {   
      $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
      $this->db->from('surat_jalan a');
    $this->db->join('karyawan b','a.id_karyawan=b.id_karyawan','left');
        $this->db->where('a.id_surat_jalan',$id);
     $query = $this->db->get();
     return $query->row(); 
    }
    function get_detail_surat_jalan($id)
  {   
     
    $this->db->select('*');
      $this->db->from('detail_surat_jalan a');
    $this->db->join('surat_jalan b','a.id_surat_jalan=b.id_surat_jalan','left');
    $this->db->join('bttb c','a.id_bttb=c.id_bttb','left');
    $this->db->join('pelanggan d','c.id_pelanggan=d.id_pelanggan','left');
    $this->db->join('penerima e','c.id_penerima=e.id_penerima','left');
    $this->db->where('a.id_surat_jalan',$id);
      
     $query = $this->db->get();
     return $query->result(); 
    }
    function get_sopir()
     {
    $this->db->select('*');
      $this->db->from('karyawan a');
    $this->db->join('jabatan b','a.id_jabatan=b.id_jabatan','left');
    $this->db->where("b.nama_jabatan='sopir'");
      
     $query = $this->db->get();
     return $query->result(); 
    }
    function hitung_bttb()
{   
   $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
    $this->db->from('bttb a');
    $this->db->where('year(a.tgl_bttb)',$tahun);
   
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
function hitung_surat_jalan()
{   
   $tahun=$this->session->userdata('tahun'); 
    $this->db->select('*');
    $this->db->from('surat_jalan a');
    $this->db->where('year(a.tgl_surat_jalan)',$tahun);
   
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
function grafik_transaksi()
  {
  $tgl=$this->session->userdata('tahun');
   $sql= $this->db->query("
   
   select distinct
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=1) and (YEAR(tgl_bttb)='$tgl'))),0) AS 'Januari',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=2) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Februari',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=3) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Maret',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=4) and (YEAR(tgl_bttb)=$tgl))),0) AS 'April',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=5) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Mei',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=6) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Juni',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=7) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Juli',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=8) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Agustus',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=9) and (YEAR(tgl_bttb)=$tgl))),0) AS 'September',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=10) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Oktober',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=11) and (YEAR(tgl_bttb)=$tgl))),0) AS 'November',
   ifnull((SELECT sum(total) FROM (bttb)  WHERE((Month(tgl_bttb)=12) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Desember'
  from bttb GROUP BY YEAR(tgl_bttb) 
   
   ");
   
   return $sql;
   
  }
  function grafik_bttb()
  {
  $tgl=$this->session->userdata('tahun');
   $sql= $this->db->query("
   
   select distinct
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=1) and (YEAR(tgl_bttb)='$tgl'))),0) AS 'Januari',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=2) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Februari',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=3) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Maret',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=4) and (YEAR(tgl_bttb)=$tgl))),0) AS 'April',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=5) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Mei',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=6) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Juni',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=7) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Juli',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=8) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Agustus',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=9) and (YEAR(tgl_bttb)=$tgl))),0) AS 'September',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=10) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Oktober',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=11) and (YEAR(tgl_bttb)=$tgl))),0) AS 'November',
   ifnull((SELECT count(id_bttb) FROM (bttb)  WHERE((Month(tgl_bttb)=12) and (YEAR(tgl_bttb)=$tgl))),0) AS 'Desember'
  from bttb GROUP BY YEAR(tgl_bttb) 
   
   ");
   
   return $sql;
   
  }
  function grafik_surat_jalan()
  {
  $tgl=$this->session->userdata('tahun');
   $sql= $this->db->query("
   
   select distinct
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=1) and (YEAR(tgl_surat_jalan)='$tgl'))),0) AS 'Januari',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=2) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Februari',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=3) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Maret',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=4) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'April',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=5) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Mei',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=6) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Juni',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=7) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Juli',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=8) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Agustus',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=9) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'September',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=10) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Oktober',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=11) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'November',
   ifnull((SELECT count(id_surat_jalan) FROM (surat_jalan)  WHERE((Month(tgl_surat_jalan)=12) and (YEAR(tgl_surat_jalan)=$tgl))),0) AS 'Desember'
  from surat_jalan GROUP BY YEAR(tgl_surat_jalan) 
   
   ");
   
   return $sql;
   
  }
}
