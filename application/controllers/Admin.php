<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
       $this->load->library('uuid'); // Memuat library UUID
    if($this->session->userdata('akses') <> 1){
        redirect(base_url('login'));
        }
  }
    function ganti_password()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $password = $this->input->post('password');
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $this->db->query("UPDATE pegawai SET password=? WHERE id_pegawai=?", array($password_hash, $id_pegawai));
            $notif = "Ganti Password Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/index');
        
    }
   function cetak_npd($id)
    {
        $data = array(
            'judul' => 'Data NPD',
           'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
            't' => $this->m_umum->get_ttd_kpa(),
            'r' => $this->m_umum->get_ttd_pptk(),
      
            

        );
        $this->load->view('laporan/cetak_npd', $data);
    }
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
           'jml_pegawai'=>$this->m_umum->hitung('pegawai'),
            

        );
         
        $this->template->load('admin/template', 'admin/home', $data);
    }
   function pegawai()
    {
        $data = array(
            'judul' => 'Data Pegawai',
            'dt_pegawai' => $this->m_umum->get_pegawai(),
            'dt_bagian' => $this->m_umum->get_data('bagian'),

        );
        $this->template->load('admin/template', 'admin/pegawai', $data);
    }
    function tambah_pegawai()
     {


        $this->form_validation->set_rules(
        'nip',
        'nip',
        'required|is_unique[pegawai.nip]',
        array('is_unique' => 'NIP sudah ada !!')
    );
        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'required');

        if ($this->form_validation->run() === FALSE){
             $this->session->set_flashdata('error', validation_errors());
             redirect('admin/pegawai');
         }
        else {
              $nip = $this->input->post('nip', TRUE);
        $password_hash = password_hash($nip, PASSWORD_DEFAULT);
                    $this->db->set('id_pegawai', 'UUID()', FALSE);
 $this->db->set('password', $password_hash);
            $this->m_umum->set_data("pegawai");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/pegawai');
        }
    }
     function update_pegawai($id = NULL)
{
    $id_pegawai = $this->input->post('id_pegawai');
    // Cek jika data ada
   $pegawai_lama = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row();

    if (!$pegawai_lama) {
        show_404(); // Jika tidak ditemukan
    }

    // Cek apakah nip diganti
    $nip_lama = $pegawai_lama->nip;
    $nip_baru = $this->input->post('nip');
    $rule_nip = 'required';
    if ($nip_baru != $nip_lama) {
        $rule_nip .= '|is_unique[pegawai.nip]';
    }

    // Validasi
    $this->form_validation->set_rules('nip', 'NIP', $rule_nip, [
        'required' => 'NIP wajib diisi!',
        'is_unique' => 'NIP Tidak Boleh Sama !!'
    ]);
    $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', [
        'required' => 'Nama pegawai wajib diisi!'
    ]);

    $data = [
        'judul' => 'Update pegawai',
        'd' => $pegawai
    ];

    if ($this->form_validation->run() === FALSE) {
        $this->session->set_flashdata('error', validation_errors());
       redirect('admin/pegawai');
    } else {

        $this->m_umum->update_data('pegawai');
        $this->session->set_flashdata('update', 'Update data berhasil');
        redirect('admin/pegawai');
    }
}

    function delete_pegawai($id)
    {

        $this->m_umum->hapus('pegawai', 'id_pegawai', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pegawai');
    }
     function akun()
    {
        $data = array(
            'judul' => 'Data Akun',
            'dt_akun' => $this->m_umum->get_akun(),
            'dt_pegawai' => $this->m_umum->get_pegawai(),
            'dt_role' => $this->m_umum->get_data('role'),

        );
        $this->template->load('admin/template', 'admin/akun', $data);
    }
    function tambah_akun()
     {

        $this->db->set('id_akun', 'UUID()', FALSE);
        $this->form_validation->set_rules('tahun_akun', 'tahun_akun', 'required');

        if ($this->form_validation->run() === FALSE)
            redirect('admin/akun');
        else {

            $this->m_umum->set_data("akun");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/akun');
        }
    }
    function update_akun($id=NULL)
    {
         $data = array(
                'judul' => 'Update akun',
            'd' => $this->m_umum->ambil_data('akun','id_akun',$id)

        );
        $this->form_validation->set_rules('id_akun', 'id_akun', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_akun',$data);
             
        else {
            $this->m_umum->update_data("akun");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/akun');
        }
    }
    function delete_akun($id)
    {

        $this->m_umum->hapus('akun', 'id_akun', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/akun');
    }

 
      function role()
    {
        $data = array(
            'judul' => 'Data Role',
            'dt_role' => $this->m_umum->get_data('role'),

        );
        $this->template->load('admin/template', 'admin/role', $data);
    }
    function tambah_role()
     {

      
        $this->form_validation->set_rules('nama_role', 'nama_role', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_role');
        else {

            $this->m_umum->set_data("role");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/role');
        }
    }
    function update_role($id=NULL)
    {
         $data = array(
                'judul' => 'Update role',
            'd' => $this->m_umum->ambil_data('role','id_role',$id)

        );
        $this->form_validation->set_rules('id_role', 'id_role', 'required');
        $this->form_validation->set_rules('nama_role', 'nama_role', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_role',$data);
             
        else {
            $this->m_umum->update_data("role");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/role');
        }
    }
    function delete_role($id)
    {

        $this->m_umum->hapus('role', 'id_role', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/role');
    }
     function program()
    {
        $data = array(
            'judul' => 'Data Program',
            'dt_program' => $this->m_umum->get_data('program'),

        );
        $this->template->load('admin/template', 'admin/program', $data);
    }
    function tambah_program()
     {
    $this->db->set('id_program', 'UUID()', FALSE);
      
        $this->form_validation->set_rules('nama_program', 'nama_program', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_program');
        else {

            $this->m_umum->set_data("program");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/program');
        }
    }
    function update_program($id=NULL)
    {
         $data = array(
                'judul' => 'Update program',

        );
        $this->form_validation->set_rules('id_program', 'id_program', 'required');
        $this->form_validation->set_rules('nama_program', 'nama_program', 'required');
       
        if ($this->form_validation->run() === FALSE)
              redirect('admin/program');
             
        else {
            $this->m_umum->update_data("program");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/program');
        }
    }
    function delete_program($id)
    {

        $this->m_umum->hapus('program', 'id_program', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/program');
    }
     function kegiatan()
    {
        $data = array(
            'judul' => 'Data kegiatan',
            'dt_kegiatan' => $this->m_umum->get_kegiatan(),
            'dt_program' => $this->m_umum->get_data('program'),

        );
        $this->template->load('admin/template', 'admin/kegiatan', $data);
    }
    function tambah_kegiatan()
     {
    $this->db->set('id_kegiatan', 'UUID()', FALSE);
      
        $this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_kegiatan');
        else {

            $this->m_umum->set_data("kegiatan");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/kegiatan');
        }
    }
    function update_kegiatan($id=NULL)
    {
         $data = array(
                'judul' => 'Update kegiatan',

        );
        $this->form_validation->set_rules('id_kegiatan', 'id_kegiatan', 'required');
        $this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required');
       
        if ($this->form_validation->run() === FALSE)
              redirect('admin/kegiatan');
             
        else {
            $this->m_umum->update_data("kegiatan");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/kegiatan');
        }
    }
    function delete_kegiatan($id)
    {

        $this->m_umum->hapus('kegiatan', 'id_kegiatan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/kegiatan');
    }
    function sub_kegiatan()
    {
        $data = array(
            'judul' => 'Data Sub Kegiatan',
            'dt_sub_kegiatan' => $this->m_umum->get_sub_kegiatan(),
            'dt_kegiatan' => $this->m_umum->get_data('kegiatan'),

        );
        $this->template->load('admin/template', 'admin/sub_kegiatan', $data);
    }
    function tambah_sub_kegiatan()
     {
    $this->db->set('id_sub_kegiatan', 'UUID()', FALSE);
      
        $this->form_validation->set_rules('nama_sub_kegiatan', 'nama_sub_kegiatan', 'required');

        if ($this->form_validation->run() === FALSE)
          redirect('admin/sub_kegiatan');
        else {

            $this->m_umum->set_data("sub_kegiatan");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/sub_kegiatan');
        }
    }
    function update_sub_kegiatan($id=NULL)
    {
         $data = array(
                'judul' => 'Update sub_kegiatan',

        );
        $this->form_validation->set_rules('id_sub_kegiatan', 'id_sub_kegiatan', 'required');
        $this->form_validation->set_rules('nama_sub_kegiatan', 'nama_sub_kegiatan', 'required');
       
        if ($this->form_validation->run() === FALSE)
              redirect('admin/sub_kegiatan');
             
        else {
            $this->m_umum->update_data("sub_kegiatan");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/sub_kegiatan');
        }
    }
    function delete_sub_kegiatan($id)
    {

        $this->m_umum->hapus('sub_kegiatan', 'id_sub_kegiatan', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/sub_kegiatan');
    }
    function jenis_npd()
    {
        $data = array(
            'judul' => 'Data Jenis NPD',
            'dt_jenis_npd' => $this->m_umum->get_data('jenis_npd'),

        );
        $this->template->load('admin/template', 'admin/jenis_npd', $data);
    }
    function tambah_jenis_npd()
     {

      $this->db->set('id_jenis_npd', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_jenis_npd', 'nama_jenis_npd', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_jenis_npd');
        else {

            $this->m_umum->set_data("jenis_npd");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/jenis_npd');
        }
    }
    function update_jenis_npd($id=NULL)
    {
         $data = array(
                'judul' => 'Update Jenis NPD',
            

        );
        $this->form_validation->set_rules('id_jenis_npd', 'id_jenis_npd', 'required');
        $this->form_validation->set_rules('nama_jenis_npd', 'nama_jenis_npd', 'required');
       
        if ($this->form_validation->run() === FALSE)
           redirect('admin/jenis_npd');
             
        else {
            $this->m_umum->update_data("jenis_npd");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/jenis_npd');
        }
    }
    function delete_jenis_npd($id)
    {

        $this->m_umum->hapus('jenis_npd', 'id_jenis_npd', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/jenis_npd');
    }
    function rek_05()
    {
        $data = array(
            'judul' => 'Data Rek 05',
            'dt_rek_05' => $this->m_umum->get_data('rek_05'),

        );
        $this->template->load('admin/template', 'admin/rek_05', $data);
    }
    function tambah_rek_05()
     {

        $this->db->set('id_rek_05', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_rek_05', 'nama_rek_05', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_rek_05');
        else {

            $this->m_umum->set_data("rek_05");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/rek_05');
        }
    }
    function update_rek_05($id=NULL)
    {
         $data = array(
                'judul' => 'Update rek_05',
            'd' => $this->m_umum->ambil_data('rek_05','id_rek_05',$id)

        );
        $this->form_validation->set_rules('id_rek_05', 'id_rek_05', 'required');
        $this->form_validation->set_rules('nama_rek_05', 'nama_rek_05', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_rek_05',$data);
             
        else {
            $this->m_umum->update_data("rek_05");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/rek_05');
        }
    }
    function delete_rek_05($id)
    {

        $this->m_umum->hapus('rek_05', 'id_rek_05', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/rek_05');
    }
     function rek_06($id)
    {

        $data = array(
            'judul' => 'Data Rek 06',
            'id' => $id,
            'dt_rek_06' => $this->m_umum->get_rek_06($id),
             'a' => $this->m_umum->ambil_data('rek_05','id_rek_05',$id),
        );
        $this->template->load('admin/template', 'admin/rek_06', $data);
    }
    function tambah_rek_06() { 
    
    $this->db->set('id_rek_06', 'UUID()', FALSE);
    $this->form_validation->set_rules('nama_rek_06','nama_rek_06','required');
    $id=$this->input->post('id_rek_05');
    if($this->form_validation->run() === FALSE)
   redirect(base_url()."admin/rek_06/".$id);
    else
    {
        
        $this->m_umum->set_data("rek_06");
        $notif = "Tambah Data Berhasil";
        $this->session->set_flashdata('success', $notif);
        redirect(base_url()."admin/rek_06/".$id);
    }
  
}

function update_rek_06()
  {
        
    $this->form_validation->set_rules('id_rek_06','id_rek_06','required');
        $id=$this->input->post('id_rek_05');
    if($this->form_validation->run() === FALSE)
        redirect(base_url()."admin/rek_06/".$id);
    else
    {
      $this->m_umum->update_data("rek_06");
       $notif = " Data berhasil diupdate";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url()."admin/rek_06/".$id);
    }
    
  }

function delete_rek_06($id=NULL,$id_rek)
{
  
    $this->m_umum->hapus('rek_06','id_rek_06',$id);
     $notif = " Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url()."admin/rek_06/".$id_rek);
        
}
 
     function bagian()
    {
        $data = array(
            'judul' => 'Data Bagian',
            'dt_bagian' => $this->m_umum->get_data('bagian'),

        );
        $this->template->load('admin/template', 'admin/bagian', $data);
    }
    function tambah_bagian()
     {

        $this->db->set('id_bagian', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_bagian', 'nama_bagian', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_bagian');
        else {

            $this->m_umum->set_data("bagian");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/bagian');
        }
    }
    function update_bagian($id=NULL)
    {
         $data = array(
                'judul' => 'Update bagian',
            'd' => $this->m_umum->ambil_data('bagian','id_bagian',$id)

        );
        $this->form_validation->set_rules('id_bagian', 'id_bagian', 'required');
        $this->form_validation->set_rules('nama_bagian', 'nama_bagian', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_bagian',$data);
             
        else {
            $this->m_umum->update_data("bagian");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/bagian');
        }
    }
    function delete_bagian($id)
    {

        $this->m_umum->hapus('bagian', 'id_bagian', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/bagian');
    }
    
  function permintaan_anggaran()
    {
        $data = array(
            'judul' => 'Data Permintaan Anggaran',
            'dt_permintaan_anggaran' => $this->m_umum->get_permintaan_anggaran_admin(),
            'dt_rek_05' => $this->m_umum->get_data('rek_05'),
            'dt_jenis_npd' => $this->m_umum->get_data('jenis_npd'),
            

        );
        $this->template->load('admin/template', 'admin/permintaan_anggaran', $data);
    }
    function tambah_permintaan_anggaran()
     {
$id=$this->session->userdata('ses_id');
$tahun=$this->session->userdata('tahun');
        $file = $this->uploadFile();
        $this->form_validation->set_rules('program', 'program', 'required');

        if ($this->form_validation->run() === FALSE)
            redirect('admin/permintaan_anggaran');
        else {
  $this->db->set('id_permintaan_anggaran', 'UUID()', FALSE);
  $this->db->set('id_akun',$id);
  $this->db->set('tahun_anggaran',$tahun);
  $this->db->set('file',$file);
            $this->m_umum->set_data("permintaan_anggaran");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/permintaan_anggaran');
        }
    }

    
    function update_permintaan_anggaran()
  {
     $id_rek_05=$this->input->post('id_rek_05');
     $id_rek_06=$this->input->post('id_rek_06');

    if (!empty($_FILES["file"]["name"])) {
      $file = $this->uploadFile();
     
    } else {
      $file = $this->input->post('old_file');
    }
        if($id_rek_05=='old'){
        $id_rek_05 = $this->input->post('old_id_rek_05');
  }
  else{
    $id_rek_05 = $this->input->post('id_rek_05');
  }
   if($id_rek_06=='old'){
        $id_rek_06 = $this->input->post('old_id_rek_06');
  }
  else{
    $id_rek_06 = $this->input->post('id_rek_06');
  }
    $data_update = array(
      'tgl_permintaan_anggaran' => $this->input->post('tgl_permintaan_anggaran'),
      'program' => $this->input->post('program'),
      'kegiatan' => $this->input->post('kegiatan'),
      'sub_kegiatan' => $this->input->post('sub_kegiatan'),
      'id_jenis_npd' => $this->input->post('id_jenis_npd'),
      'file' => $file,
      'id_rek_05' => $id_rek_05,
      'id_rek_06' => $id_rek_06,
    );
    $where = array('id_permintaan_anggaran' => $this->input->post('id_permintaan_anggaran'));
    $res = $this->m_umum->UpdateData('permintaan_anggaran', $data_update, $where);
    if ($res >= 1) {

      $notif = " Data berhasil diupdate";
      $this->session->set_flashdata('update', $notif);
      redirect('admin/permintaan_anggaran');
    } else {
      echo "<h1>GAGAL</h1>";
    }
  }
    function delete_permintaan_anggaran($id)
    {

        $this->m_umum->hapus('permintaan_anggaran', 'id_permintaan_anggaran', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/permintaan_anggaran');
    }
   public function get_rek_06() {
  $id_rek_05 = $this->input->post('id_rek_05');
  $rek_06 = $this->db->get_where('rek_06', ['id_rek_05' => $id_rek_05])->result();

  echo '<option value="">Pilih Rek 06</option>';
  foreach ($rek_06 as $k) {
    echo '<option value="'.$k->id_rek_06.'">'.$k->nama_rek_06.'</option>';
  }
}
 function kirim_permintaan_anggaran($id)
    {
$sql11 = "update permintaan_anggaran set status_permintaan=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "Permintaan berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/permintaan_anggaran');
        }
        public function uploadFile()
  {
    $config['upload_path'] = 'upload';
    $config['allowed_types'] = 'pdf';
    $config['overwrite'] = false;
    $config['max_size'] = 5000; // 1MB
    $config['encrypt_name'] = TRUE;


    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('file')) {
      return $this->upload->data("file_name");
    }
    $error = $this->upload->display_errors();
    echo $error;
    exit;
    // return "default.jpg";
  }
  public function uploadDokumen()
  {
    $config['upload_path'] = 'upload';
    $config['allowed_types'] = 'pdf';
    $config['overwrite'] = false;
    $config['max_size'] = 5000; // 1MB
    $config['encrypt_name'] = TRUE;


    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('dokumen')) {
      return $this->upload->data("file_name");
    }
    $error = $this->upload->display_errors();
    echo $error;
    exit;
    // return "default.jpg";
  }
 function npd()
    {
        $data = array(
            'judul' => 'Data NPD',
            'dt_npd' => $this->m_umum->get_npd_admin(),
      
            

        );
        $this->template->load('admin/template', 'admin/npd', $data);
    }
    function kirim_npd($id)
    {
$sql11 = "update permintaan_anggaran set status_npd=1, status_pptk=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "NPD berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/npd');
        }
     function rincian_npd($id)
    {

        $data = array(
            'judul' => 'Data Rincian NPD',
            'id' => $id,
            'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->ambil_data('permintaan_anggaran','id_permintaan_anggaran',$id),
        );
        $this->template->load('admin/template', 'admin/rincian_npd', $data);
    }
    function tambah_rincian_npd() { 
    
    $this->db->set('id_rincian_npd', 'UUID()', FALSE);
    $this->form_validation->set_rules('uraian','uraian','required');
    $id=$this->input->post('id_permintaan_anggaran');
    if($this->form_validation->run() === FALSE)
   redirect(base_url()."admin/rincian_npd/".$id);
    else
    {
         
        $this->m_umum->set_data("rincian_npd");
        $total=$this->db->query("Select sum(pencairan) as total from rincian_npd where id_permintaan_anggaran='$id'")->row()->total;
      $sql11 = "update permintaan_anggaran set total=$total where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
        $notif = "Tambah Data Berhasil";
        $this->session->set_flashdata('success', $notif);
        redirect(base_url()."admin/rincian_npd/".$id);
    }
  
}
    function update_potongan()
  {
           $id=$this->input->post('id_permintaan_anggaran');
    if (!empty($_FILES["dokumen"]["name"])) {
      $dokumen = $this->uploadDokumen();
     
    }
    else {
        $dokumen = $this->input->post('old_dokumen');
    }
       $data_update = array(
      'ppn' => $this->input->post('ppn'),
      'pajak_daerah' => $this->input->post('pajak_daerah'),
     
      'dokumen' => $dokumen,
   
    );
    $where = array('id_permintaan_anggaran' => $this->input->post('id_permintaan_anggaran'));
    $res = $this->m_umum->UpdateData('permintaan_anggaran', $data_update, $where);
     if ($res >= 1) {

      $notif = " Data berhasil diupdate";
      $this->session->set_flashdata('update', $notif);
   redirect(base_url()."admin/rincian_npd/".$id);
    } else {
      echo "<h1>GAGAL</h1>";
    }
  }

function update_rincian_npd()
  {
        
    $this->form_validation->set_rules('id_rincian_npd','id_rincian_npd','required');
        $id=$this->input->post('id_permintaan_anggaran');
    if($this->form_validation->run() === FALSE)
        redirect(base_url()."admin/rincian_npd/".$id);
    else
    {
      $total=$this->db->query("Select sum(pencairan) as total from rincian_npd where id_permintaan_anggaran='$id'")->row()->total;
      $sql11 = "update permintaan_anggaran set total=$total where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
      $this->m_umum->update_data("rincian_npd");
       $notif = " Data berhasil diupdate";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url()."admin/rincian_npd/".$id);
    }
    
  }

function delete_rincian_npd($id=NULL,$id_rek)
{
  
    $this->m_umum->hapus('rincian_npd','id_rincian_npd',$id);
      $total=$this->db->query("Select sum(pencairan) as total from rincian_npd where id_permintaan_anggaran='$id_rek'")->row()->total;
      $sql11 = "update permintaan_anggaran set total=$total where id_permintaan_anggaran='$id_rek'";
    $this->db->query($sql11);
     $notif = " Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url()."admin/rincian_npd/".$id_rek);
        
}
}
