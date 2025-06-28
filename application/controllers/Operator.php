<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->library('uuid');
    if($this->session->userdata('akses') <> 2){
        redirect(base_url('login'));
        }
  }
    public function update_multiple() {
        // Ambil array ID yang dipilih dan data yang akan diperbarui
        $ids = $this->input->post('ids'); // 'ids' adalah array ID yang dipilih
        $id_sj = $this->input->post('id_sj'); // 'ids' adalah array ID yang dipilih
        $new_data = array(
            'id_surat_jalan' => $this->input->post('id_surat_jalan'), // Data baru yang ingin diperbarui
         
        );

        if (!empty($ids)) {
            // Panggil method model untuk melakukan update
            $this->m_umum->update_multiple($new_data, $ids);
            $this->session->set_flashdata('message', 'Pemindahan BTTB Berhasil');
             redirect(base_url() . "operator/detail_surat_jalan/".$id_sj);
        } else {
       $notif = "Tidak ada BTTB yang dipilih";
          $this->session->set_flashdata('warning', 'BTTB Belum dipilih');
           redirect(base_url() . "operator/detail_surat_jalan/".$id_sj);
        }

        
    }
    public function insert_multiple() {
        // Mengambil ID yang dipilih melalui form
$ses_id=$this->session->userdata('ses_id');
        $selected_ids = $this->input->post('selected_ids');
         $id_sj = $this->input->post('id_sj');
        
        if (!empty($selected_ids)) {
            // Ambil data email berdasarkan ID yang dipilih
            $id_bttb = $this->m_umum->get_id_bttb_by_ids($selected_ids);
            
            // Format data menjadi array yang siap untuk diinsert
            $data_to_insert = array();
           
            foreach ($id_bttb as $bttb) {
                        $uuid = $this->uuid->v4();
    $data_to_insert[] = array(
        'id_bttb' => $bttb->id_bttb,  // Menyisipkan id_bttb
        'id_detail_surat_jalan' => $uuid,         // Menyisipkan name
        'id_surat_jalan' => $id_sj,       // Menyisipkan email
        'opr_input_detail' => $ses_id        // Menyisipkan email
    );
}

            // Menyisipkan email yang dipilih ke dalam tabel tujuan
            if ($this->m_umum->insert_multiple_id_bttb($data_to_insert)) {
                $this->session->set_flashdata('message', 'BTTB berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('warning', 'Terjadi kesalahan saat menyimpan BTTB.');
            }
        } else {
            $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih.');
        }

        // Redirect ke halaman awal
         redirect(base_url() . "operator/detail_surat_jalan/".$id_sj);
    }
    public function index() {
       $data = array(
            'judul' => 'Dashboard',
            'pelanggan' => $this->m_umum->hitung('pelanggan'),
            'karyawan' => $this->m_umum->hitung('karyawan'),
            'bttb' => $this->m_umum->hitung_bttb(),
            'surat_jalan' => $this->m_umum->hitung_surat_jalan(),
          
        );
        foreach($this->m_umum->grafik_transaksi()->result_array() as $row)
        {
         $data['grafik_transaksi'][]=(float)$row['Januari'];
         $data['grafik_transaksi'][]=(float)$row['Februari'];
         $data['grafik_transaksi'][]=(float)$row['Maret'];
         $data['grafik_transaksi'][]=(float)$row['April'];
         $data['grafik_transaksi'][]=(float)$row['Mei'];
         $data['grafik_transaksi'][]=(float)$row['Juni'];
         $data['grafik_transaksi'][]=(float)$row['Juli'];
         $data['grafik_transaksi'][]=(float)$row['Agustus'];
         $data['grafik_transaksi'][]=(float)$row['September'];
         $data['grafik_transaksi'][]=(float)$row['Oktober'];
         $data['grafik_transaksi'][]=(float)$row['November'];
         $data['grafik_transaksi'][]=(float)$row['Desember'];
        }
          foreach($this->m_umum->grafik_bttb()->result_array() as $row)
        {
         $data['grafik_bttb'][]=(float)$row['Januari'];
         $data['grafik_bttb'][]=(float)$row['Februari'];
         $data['grafik_bttb'][]=(float)$row['Maret'];
         $data['grafik_bttb'][]=(float)$row['April'];
         $data['grafik_bttb'][]=(float)$row['Mei'];
         $data['grafik_bttb'][]=(float)$row['Juni'];
         $data['grafik_bttb'][]=(float)$row['Juli'];
         $data['grafik_bttb'][]=(float)$row['Agustus'];
         $data['grafik_bttb'][]=(float)$row['September'];
         $data['grafik_bttb'][]=(float)$row['Oktober'];
         $data['grafik_bttb'][]=(float)$row['November'];
         $data['grafik_bttb'][]=(float)$row['Desember'];
        }
          foreach($this->m_umum->grafik_surat_jalan()->result_array() as $row)
        {
         $data['grafik_surat_jalan'][]=(float)$row['Januari'];
         $data['grafik_surat_jalan'][]=(float)$row['Februari'];
         $data['grafik_surat_jalan'][]=(float)$row['Maret'];
         $data['grafik_surat_jalan'][]=(float)$row['April'];
         $data['grafik_surat_jalan'][]=(float)$row['Mei'];
         $data['grafik_surat_jalan'][]=(float)$row['Juni'];
         $data['grafik_surat_jalan'][]=(float)$row['Juli'];
         $data['grafik_surat_jalan'][]=(float)$row['Agustus'];
         $data['grafik_surat_jalan'][]=(float)$row['September'];
         $data['grafik_surat_jalan'][]=(float)$row['Oktober'];
         $data['grafik_surat_jalan'][]=(float)$row['November'];
         $data['grafik_surat_jalan'][]=(float)$row['Desember'];
        }
        $this->template->load('operator/template', 'operator/home', $data);
       
    

}
  function harga_umum()
    {
        $data = array(
            'judul' => 'Harga Umum',
            'dt_harga_umum' => $this->m_umum->get_data('harga_umum'),

        );
        $this->template->load('operator/template', 'operator/harga_umum', $data);
    }
    function tambah_harga_umum()
     {

        $this->db->set('id_harga_umum', 'UUID()', FALSE);
        $this->form_validation->set_rules('kota_tujuan', 'kota_tujuan', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/tambah_harga_umum');
        else {

            $this->m_umum->set_data("harga_umum");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/harga_umum');
        }
    }
    function update_harga_umum($id=NULL)
    {
         $data = array(
                'judul' => 'Update harga_umum',
            'd' => $this->m_umum->ambil_data('harga_umum','id_harga_umum',$id)

        );
        $this->form_validation->set_rules('id_harga_umum', 'id_harga_umum', 'required');
        $this->form_validation->set_rules('kota_tujuan', 'kota_tujuan', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_harga_umum',$data);
             
        else {
            $this->m_umum->update_data("harga_umum");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('operator/harga_umum');
        }
    }
    
function laporan()
    {
        $data = array(
            'judul' => 'Laporan',
            'dt_pelanggan' => $this->m_umum->get_data('pelanggan'),
            'dt_karyawan' => $this->m_umum->get_data('karyawan'),
            'dt_sopir' => $this->m_umum->get_sopir(),

        );
        $this->template->load('operator/template', 'operator/laporan', $data);
    }
    function laporan_transaksi_bttb()
    {
$id_pelanggan = $this->input->post('id_pelanggan');
$id_karyawan = $this->input->post('id_karyawan');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
if($id_pelanggan!='semua'){
        $data = array(
           'dt_bttb' => $this->m_umum->laporan_bttb($id_pelanggan,$dari,$sampai)

        );
    }
    else{
         $data = array(
           'dt_bttb' => $this->m_umum->laporan_bttb_semua($dari,$sampai)

        ); 
    }
         $this->load->view('laporan/laporan_transaksi_bttb',$data);
    }
     function laporan_transaksi_surat_jalan()
    {
$id_sopir = $this->input->post('id_sopir');
$id_karyawan = $this->input->post('id_karyawan');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
if($id_sopir!='semua'){
        $data = array(
           'dt_surat_jalan' => $this->m_umum->laporan_surat_jalan($id_sopir,$dari,$sampai)

        );
    }
    else{
         $data = array(
           'dt_surat_jalan' => $this->m_umum->laporan_surat_jalan_semua($dari,$sampai)

        ); 
    }
         $this->load->view('laporan/laporan_transaksi_surat_jalan',$data);
    }
  function pelanggan()
    {
        $data = array(
            'judul' => 'pelanggan',
            'dt_pelanggan' => $this->m_umum->get_data('pelanggan'),

        );
        $this->template->load('operator/template', 'operator/pelanggan', $data);
    }
    function tambah_pelanggan()
     {

        $this->db->set('id_pelanggan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/tambah_pelanggan');
        else {

            $this->m_umum->set_data("pelanggan");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/pelanggan');
        }
    }
    function update_pelanggan($id=NULL)
    {
         $data = array(
                'judul' => 'Update pelanggan',
            'd' => $this->m_umum->ambil_data('pelanggan','id_pelanggan',$id)

        );
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'required');
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_pelanggan',$data);
             
        else {
            $this->m_umum->update_data("pelanggan");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('operator/pelanggan');
        }
    }
    function delete_pelanggan($id)
    {

        $this->m_umum->hapus('pelanggan', 'id_pelanggan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('operator/pelanggan');
    }
     function jabatan()
    {
        $data = array(
            'judul' => 'jabatan',
            'dt_jabatan' => $this->m_umum->get_data('jabatan'),

        );
        $this->template->load('operator/template', 'operator/jabatan', $data);
    }
    function tambah_jabatan()
     {

        $this->db->set('id_jabatan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/tambah_jabatan');
        else {

            $this->m_umum->set_data("jabatan");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/jabatan');
        }
    }
    function update_jabatan($id=NULL)
    {
         $data = array(
                'judul' => 'Update jabatan',
            'd' => $this->m_umum->ambil_data('jabatan','id_jabatan',$id)

        );
        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_jabatan',$data);
             
        else {
            $this->m_umum->update_data("jabatan");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('operator/jabatan');
        }
    }
    function delete_jabatan($id)
    {

        $this->m_umum->hapus('jabatan', 'id_jabatan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('operator/jabatan');
    }
     function penerima()
    {
        $data = array(
            'judul' => 'penerima',
            'dt_penerima' => $this->m_umum->get_data('penerima'),

        );
        $this->template->load('operator/template', 'operator/penerima', $data);
    }
    function tambah_penerima()
     {

        $this->db->set('id_penerima', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_penerima', 'nama_penerima', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/tambah_penerima');
        else {

            $this->m_umum->set_data("penerima");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/penerima');
        }
    }
    function update_penerima($id=NULL)
    {
         $data = array(
                'judul' => 'Update penerima',
            'd' => $this->m_umum->ambil_data('penerima','id_penerima',$id)

        );
        $this->form_validation->set_rules('id_penerima', 'id_penerima', 'required');
        $this->form_validation->set_rules('nama_penerima', 'nama_penerima', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_penerima',$data);
             
        else {
            $this->m_umum->update_data("penerima");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('operator/penerima');
        }
    }
    function delete_penerima($id)
    {

        $this->m_umum->hapus('penerima', 'id_penerima', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('operator/penerima');
    }

     function karyawan()
    {
        $data = array(
            'judul' => 'karyawan',
            'dt_karyawan' => $this->m_umum->get_karyawan(),

        );
        $this->template->load('operator/template', 'operator/karyawan', $data);
    }
    function tambah_karyawan()
     {

 $data = array(
            'judul' => 'jabatan',
            'dt_jabatan' => $this->m_umum->get_data('jabatan')

        );
        $this->db->set('id_karyawan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/tambah_karyawan',$data);
        else {

            $this->m_umum->set_data("karyawan");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/karyawan');
        }
    }
    function update_karyawan($id=NULL)
    {
         $data = array(
                'judul' => 'Update karyawan',
            'd' => $this->m_umum->ambil_data('karyawan','id_karyawan',$id),
             'dt_jabatan' => $this->m_umum->get_data('jabatan'),

        );
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_karyawan',$data);
             
        else {
            $this->m_umum->update_data("karyawan");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('operator/karyawan');
        }
    }
    function delete_karyawan($id)
    {

        $this->m_umum->hapus('karyawan', 'id_karyawan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('operator/karyawan');
    }
    function bttb()
    {
        $data = array(
            'judul' => 'BTTB',
            'dt_bttb' => $this->m_umum->get_bttb(),

        );
        $this->template->load('operator/template', 'operator/bttb', $data);
    }
     function tambah_bttb_umum()
     {
      $ses_id=$this->session->userdata('ses_id'); 
$biaya_paket = $this->input->post('biaya_paket');
$biaya_tambahan = $this->input->post('biaya_tambahan');
$colly = $this->input->post('colly');
$total=($biaya_paket*$colly)+$biaya_tambahan;
 $data = array(
            'judul' => 'jabatan',
            'dt_pelanggan' => $this->m_umum->get_pelanggan_umum(),
            'dt_penerima' => $this->m_umum->get_data('penerima'),

            'dt_tujuan' => $this->m_umum->get_data('harga_umum')

        );
  
        $this->db->set('id_bttb', 'UUID()', FALSE);
        $this->db->set('opr_input', $ses_id);
        $this->db->set('total',$total);
         $this->db->set('jenis_bttb',1);
       
        $this->form_validation->set_rules('tgl_bttb', 'tgl_bttb', 'required');
        $this->form_validation->set_rules(
    'nobttb',  // field name
    'No BTTB',  // human-readable field name
    'required|is_unique[bttb.nobttb]',  // validation rule
    array(
        'is_unique' => 'No BTTB sudah ada !!' // custom error message for is_unique
    )
);

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->template->load('operator/template', 'operator/tambah_bttb_umum',$data);
        }
        else {

            $this->m_umum->set_data("bttb");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/bttb');
        }
    }
    function tambah_bttb()
     {
      $ses_id=$this->session->userdata('ses_id'); 
$biaya_paket = $this->input->post('biaya_paket');
$biaya_tambahan = $this->input->post('biaya_tambahan');
$colly = $this->input->post('colly');
$total=($biaya_paket*$colly)+$biaya_tambahan;
 $data = array(
            'judul' => 'jabatan',
                     'dt_pelanggan' => $this->m_umum->get_pelanggan_tetap(),
            'dt_penerima' => $this->m_umum->get_data('penerima')

        );
  
        $this->db->set('id_bttb', 'UUID()', FALSE);
        $this->db->set('opr_input', $ses_id);
        $this->db->set('total',$total);
       
        $this->form_validation->set_rules('tgl_bttb', 'tgl_bttb', 'required');
        $this->form_validation->set_rules(
    'nobttb',  // field name
    'No BTTB',  // human-readable field name
    'required|is_unique[bttb.nobttb]',  // validation rule
    array(
        'is_unique' => 'No BTTB sudah ada !!' // custom error message for is_unique
    )
);

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());

            $this->template->load('operator/template', 'operator/tambah_bttb',$data);
        }
        else {

            $this->m_umum->set_data("bttb");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/bttb');
        }
    }
    function get_sub_tarif_pelanggan(){
                $id_pelanggan = $this->input->post('id',TRUE);
                $data = $this->m_umum->get_sub_tarif_pelanggan($id_pelanggan)->result();
                echo json_encode($data);
        }
    function update_bttb($id=NULL)
    {
      $ses_id=$this->session->userdata('ses_id'); 
        $nobttb = $this->input->post('nobttb');
    $id_bttb = $this->input->post('id_bttb');
    $id_pelanggan = $this->input->post('id_pelanggan');
    $kota_tujuan = $this->input->post('kota_tujuan');
  if($id_pelanggan=='old'){
        $id_pelanggan = $this->input->post('old_id_pelanggan');
  }
  else{
    $id_pelanggan = $this->input->post('id_pelanggan');
  }
    if($kota_tujuan=='old'){
        $kota_tujuan = $this->input->post('old_kota_tujuan');
  }
  else{
    $kota_tujuan = $this->input->post('kota_tujuan');
  }
    $biaya_paket = $this->input->post('biaya_paket');
$biaya_tambahan = $this->input->post('biaya_tambahan');
$colly = $this->input->post('colly');
$total=($biaya_paket*$colly)+$biaya_tambahan;
    // Check if no_surat_jalan already exists in the database
    $this->db->where('nobttb', $nobttb);
    $this->db->where('id_bttb !=', $id_bttb); // Exclude the current record
    $query = $this->db->get('bttb');
         $data = array(
                'judul' => 'Update bttb',
            'd' => $this->m_umum->ambil_data('bttb','id_bttb',$id),
                        'dt_pelanggan' => $this->m_umum->get_pelanggan_tetap(),
            'dt_penerima' => $this->m_umum->get_data('penerima')

        );
         if ($query->num_rows() > 0) {
        // The no_surat_jalan already exists, send an error message or handle accordingly
        $this->session->set_flashdata('error', 'No BTTB sudah ada !!');
  redirect(base_url() . "operator/update_bttb/".$id_bttb);
    } else {
        $this->form_validation->set_rules('id_bttb', 'id_bttb', 'required');
        $this->form_validation->set_rules('tgl_bttb', 'tgl_bttb', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_bttb',$data);
             
        else {
               $data_update = array(
        'nobttb' => $nobttb,
        'opr_update' => $ses_id,
    'kota_asal' => $this->input->post('kota_asal'),
    'kota_tujuan' => $kota_tujuan,
    'id_pelanggan' => $id_pelanggan,
    'id_penerima' => $this->input->post('id_penerima'),
    'pembayaran' => $this->input->post('pembayaran'),
    'colly' => $this->input->post('colly'),
    'dos' => $this->input->post('dos'),
    'kg' => $this->input->post('kg'),
    'biaya_paket' => $this->input->post('biaya_paket'),
    'tgl_bttb' => $this->input->post('tgl_bttb'),
    'barang_diterima' => $this->input->post('barang_diterima'),
    'bttb_kembali' => $this->input->post('bttb_kembali'),
    'isi_barang' => $this->input->post('isi_barang'),
    'ket' => $this->input->post('ket'),
    'biaya_tambahan' => $this->input->post('biaya_tambahan'),
    'no_faktur' => $this->input->post('no_faktur'),
    'total' => $total,
      
    );
    $where = array('id_bttb' => $id_bttb);
    $res = $this->m_umum->UpdateData('bttb', $data_update, $where);
    if ($res >= 1) {

      $notif = " Data berhasil diupdate";
      $this->session->set_flashdata('update', $notif);
       redirect('operator/bttb');
    } else {
      echo "<h1>GAGAL</h1>";
    }
        }
    }
    }

      function update_bttb_umum($id=NULL)
    {
      $ses_id=$this->session->userdata('ses_id'); 
        $nobttb = $this->input->post('nobttb');
    $id_bttb = $this->input->post('id_bttb');
    $id_pelanggan = $this->input->post('id_pelanggan');
    $kota_tujuan = $this->input->post('kota_tujuan');

    $biaya_paket = $this->input->post('biaya_paket');
$biaya_tambahan = $this->input->post('biaya_tambahan');
$colly = $this->input->post('colly');
$total=($biaya_paket*$colly)+$biaya_tambahan;
    // Check if no_surat_jalan already exists in the database
    $this->db->where('nobttb', $nobttb);
    $this->db->where('id_bttb !=', $id_bttb); // Exclude the current record
    $query = $this->db->get('bttb');
         $data = array(
                'judul' => 'Update bttb',
            'd' => $this->m_umum->ambil_data('bttb','id_bttb',$id),
                        'dt_pelanggan' => $this->m_umum->get_pelanggan_umum(),
            'dt_penerima' => $this->m_umum->get_data('penerima'),
            
            'dt_tujuan' => $this->m_umum->get_data('harga_umum')

        );
         if ($query->num_rows() > 0) {
        // The no_surat_jalan already exists, send an error message or handle accordingly
        $this->session->set_flashdata('error', 'No BTTB sudah ada !!');
  redirect(base_url() . "operator/update_bttb_umum/".$id_bttb);
    } else {
        $this->form_validation->set_rules('id_bttb', 'id_bttb', 'required');
        $this->form_validation->set_rules('tgl_bttb', 'tgl_bttb', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_bttb_umum',$data);
             
        else {
               $data_update = array(
        'nobttb' => $nobttb,
        'opr_update' => $ses_id,
    'kota_asal' => $this->input->post('kota_asal'),
    'kota_tujuan' => $kota_tujuan,
    'id_pelanggan' => $id_pelanggan,
    'id_penerima' => $this->input->post('id_penerima'),
    'pembayaran' => $this->input->post('pembayaran'),
    'colly' => $this->input->post('colly'),
    'dos' => $this->input->post('dos'),
    'kg' => $this->input->post('kg'),
    'biaya_paket' => $this->input->post('biaya_paket'),
    'tgl_bttb' => $this->input->post('tgl_bttb'),
    'barang_diterima' => $this->input->post('barang_diterima'),
    'bttb_kembali' => $this->input->post('bttb_kembali'),
    'isi_barang' => $this->input->post('isi_barang'),
    'ket' => $this->input->post('ket'),
    'biaya_tambahan' => $this->input->post('biaya_tambahan'),
    'no_faktur' => $this->input->post('no_faktur'),
    'total' => $total,
      
    );
    $where = array('id_bttb' => $id_bttb);
    $res = $this->m_umum->UpdateData('bttb', $data_update, $where);
    if ($res >= 1) {

      $notif = " Data berhasil diupdate";
      $this->session->set_flashdata('update', $notif);
       redirect('operator/bttb');
    } else {
      echo "<h1>GAGAL</h1>";
    }
        }
    }
    }
    function delete_bttb($id)
    {

        $this->m_umum->hapus('bttb', 'id_bttb', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('operator/bttb');
    }
     function surat_jalan()
    {
        $data = array(
            'judul' => 'Surat Jalan',
            'dt_surat_jalan' => $this->m_umum->get_surat_jalan(),

        );
        $this->template->load('operator/template', 'operator/surat_jalan', $data);
    }
    function tambah_surat_jalan()
     {
 $ses_id=$this->session->userdata('ses_id'); 
 $data = array(
            'judul' => 'jabatan',
            'dt_karyawan' => $this->m_umum->get_sopir()

        );
  
        $this->db->set('id_surat_jalan', 'UUID()', FALSE);
        $this->db->set('opr_input',$ses_id);
       
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->template->load('operator/template', 'operator/tambah_surat_jalan',$data);
        }
        else {

            $this->m_umum->set_data("surat_jalan");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('operator/surat_jalan');
        }
    }
   function update_surat_jalan($id=NULL)
    {
    $ses_id=$this->session->userdata('ses_id'); 
    
         $data = array(
                'judul' => 'Update surat_jalan',
            'd' => $this->m_umum->ambil_data('surat_jalan','id_surat_jalan',$id),
              'dt_karyawan' => $this->m_umum->get_sopir()

        );

     $this->db->set('opr_update',$ses_id);

        $this->form_validation->set_rules('id_surat_jalan', 'id_surat_jalan', 'required');
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
       
       
        if ($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('error', validation_errors());
            $this->template->load('operator/template', 'operator/update_surat_jalan',$data);
             }
        else {
            $this->m_umum->update_data("surat_jalan");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('operator/surat_jalan');
        }
    
    
    }
    function delete_surat_jalan($id)
    {

        $this->m_umum->hapus('surat_jalan', 'id_surat_jalan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('operator/surat_jalan');
    }

     function detail_surat_jalan($id)
    {
        $data = array(
            'judul' => 'Detail Surat Jalan',
            'dt_detail_surat_jalan' => $this->m_umum->get_detail_surat_jalan($id),
             'dt_surat_jalan' => $this->m_umum->get_data('surat_jalan'),
            'id' => $id,

        );
        $this->template->load('operator/template', 'operator/detail_surat_jalan', $data);
    }
     function cetak_surat_jalan($id)
    {

        $data = array(
            'dt_detail_surat_jalan' => $this->m_umum->get_detail_surat_jalan($id),
            'd' => $this->m_umum->get_surat_jalan_cetak($id),

        );
         $this->load->view('laporan/cetak_surat_jalan',$data);
    }
    function tambah_detail_surat_jalan($id=NULL)
     {
      $ses_id=$this->session->userdata('ses_id'); 
$id_surat_jalan = $this->input->post('id_surat_jalan');
 $data = array(
            'judul' => 'jabatan',
            'dt_bttb' => $this->m_umum->get_bttb_kirim(),
 'id' => $id
        );
  
        $this->db->set('id_detail_surat_jalan', 'UUID()', FALSE);
        $this->db->set('opr_input_detail',$ses_id);
        $this->form_validation->set_rules('id_bttb', 'id_bttb', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/tambah_detail_surat_jalan',$data);
        else {

            $this->m_umum->set_data("detail_surat_jalan");
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
             redirect(base_url() . "operator/detail_surat_jalan/".$id_surat_jalan);
        }
    }
    function delete_detail_surat_jalan($id,$id_detail_surat_jalan)
    {

        $this->m_umum->hapus('detail_surat_jalan', 'id_detail_surat_jalan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
      redirect(base_url() . "operator/detail_surat_jalan/".$id_detail_surat_jalan);
    }

     function tarif_pelanggan($id)
    {
        $data = array(
            'judul' => 'Tarif Pelanggan',
            'dt_tarif_pelanggan' => $this->m_umum->get_tarif_pelanggan($id),
            'id' => $id,

        );
        $this->template->load('operator/template', 'operator/tarif_pelanggan', $data);
    }
    
    function tambah_tarif_pelanggan($id=NULL)
     {
$id_pelanggan = $this->input->post('id_pelanggan');
 $data = array(
            'judul' => 'jabatan',
           
 'id' => $id
        );
  
        $this->db->set('id_tarif_pelanggan', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/tambah_tarif_pelanggan',$data);
        else {

            $this->m_umum->set_data("tarif_pelanggan");
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
             redirect(base_url() . "operator/tarif_pelanggan/".$id_pelanggan);
        }
    }
    function update_tarif_pelanggan($id=NULL)
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
         $data = array(
                'judul' => 'Update tarif_pelanggan',
            'd' => $this->m_umum->ambil_data('tarif_pelanggan','id_tarif_pelanggan',$id),
           

        );
        $this->form_validation->set_rules('id_tarif_pelanggan', 'id_tarif_pelanggan', 'required');
        $this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('operator/template', 'operator/update_tarif_pelanggan',$data);
             
        else {
            $this->m_umum->update_data("tarif_pelanggan");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
             redirect(base_url() . "operator/tarif_pelanggan/".$id_pelanggan);
        }
    }
    function delete_tarif_pelanggan($id,$id_tarif_pelanggan)
    {

        $this->m_umum->hapus('tarif_pelanggan', 'id_tarif_pelanggan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
      redirect(base_url() . "operator/tarif_pelanggan/".$id_tarif_pelanggan);
    }
 
 
}
