<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasubbag extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
       $this->load->library('uuid'); // Memuat library UUID
    if($this->session->userdata('akses') <> 2){
        redirect(base_url('login'));
        }
  }
   function laporan_program_kegiatan_sub()
    {
        $data = array(
            'judul' => 'Data NPD',
           'program' => $this->m_umum->get_laporan_program()
      
            

        );
        $this->load->view('laporan/program_kegiatan_sub', $data);
    }
      function laporan_permintaan_anggaran()
    {
$id_bagian = $this->input->post('id_bagian');
$status_permintaan = $this->input->post('status_permintaan');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
 $data = array(
           'dt_permintaan_anggaran' => $this->m_umum->laporan_permintaan_anggaran($id_bagian,$id_jenis_npd,$status_permintaan,$dari,$sampai)

        );
 $this->load->view('laporan/permintaan_anggaran', $data);
    }

    function laporan_npd()
    {
$id_bagian = $this->input->post('id_bagian');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
 $data = array(
           'dt_permintaan_anggaran' => $this->m_umum->laporan_npd($id_bagian,$id_jenis_npd,$dari,$sampai)

        );
 $this->load->view('laporan/npd', $data);
    }
      function laporan_rekening()
    {
        $data = array(
            'judul' => 'Data NPD',
           'rekening' => $this->m_umum->get_laporan_rekening()
      
            

        );
        $this->load->view('laporan/rekening', $data);
    }
         function laporan_rincian_npd()
    {
$id_bagian = $this->input->post('id_bagian');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
 $data = array(
           'rincian_npd' => $this->m_umum->get_laporan_rincian_npd($id_bagian,$id_jenis_npd,$dari,$sampai)

        );
 $this->load->view('laporan/rincian_npd', $data);
    }
     function laporan_pencairan_program()
    {
$id_bagian = $this->input->post('id_bagian');
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');

 $this->load->view('laporan/pencairan_program');
    }
     function laporan_pencairan_bagian()
    {
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');

 $this->load->view('laporan/pencairan_bagian');
    }
      function laporan_pencairan_rekening()
    {
        $id_bagian = $this->input->post('id_bagian');
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
        $data = array(
            'judul' => 'Data NPD',
           'rekening' => $this->m_umum->get_laporan_rekening()
      
            

        );
        $this->load->view('laporan/pencairan_rekening', $data);
    }
    function laporan_pencairan_kegiatan()
    {
        $id_bagian = $this->input->post('id_bagian');
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
        $data = array(
            'judul' => 'Data NPD',
           'rekening' => $this->m_umum->get_laporan_kegiatan()
      
            

        );
        $this->load->view('laporan/pencairan_kegiatan', $data);
    }
     function ganti_password()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $password = $this->input->post('password');
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $this->db->query("UPDATE pegawai SET password=? WHERE id_pegawai=?", array($password_hash, $id_pegawai));
            $notif = "Ganti Password Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('kasubbag/index');
        
    }
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
           
            

        );
         
        $this->template->load('kasubbag/template', 'kasubbag/home', $data);
    }

        function npd()
    {
        $data = array(
            'judul' => 'Data NPD',
            'dt_npd' => $this->m_umum->get_npd(),
      
            

        );
        $this->template->load('kasubbag/template', 'kasubbag/npd', $data);
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
    function kirim_npd($id)
    {
$sql11 = "update permintaan_anggaran set status_npd=1, status_pptk=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "NPD berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('kasubbag/npd');
        }
     function rincian_npd($id)
    {

        $data = array(
            'judul' => 'Data Rincian NPD',
            'id' => $id,
            'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->ambil_data('permintaan_anggaran','id_permintaan_anggaran',$id),
        );
        $this->template->load('kasubbag/template', 'kasubbag/rincian_npd', $data);
    }
    function tambah_rincian_npd() { 
    
    $this->db->set('id_rincian_npd', 'UUID()', FALSE);
    $this->form_validation->set_rules('uraian','uraian','required');
    $id=$this->input->post('id_permintaan_anggaran');
    if($this->form_validation->run() === FALSE)
   redirect(base_url()."kasubbag/rincian_npd/".$id);
    else
    {
         
        $this->m_umum->set_data("rincian_npd");
        $total=$this->db->query("Select sum(pencairan) as total from rincian_npd where id_permintaan_anggaran='$id'")->row()->total;
      $sql11 = "update permintaan_anggaran set total=$total where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
        $notif = "Tambah Data Berhasil";
        $this->session->set_flashdata('success', $notif);
        redirect(base_url()."kasubbag/rincian_npd/".$id);
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
      'no_npd' => $this->input->post('no_npd'),
     
      'dokumen' => $dokumen,
   
    );
    $where = array('id_permintaan_anggaran' => $this->input->post('id_permintaan_anggaran'));
    $res = $this->m_umum->UpdateData('permintaan_anggaran', $data_update, $where);
     if ($res >= 1) {

      $notif = " Data berhasil diupdate";
      $this->session->set_flashdata('update', $notif);
   redirect(base_url()."kasubbag/rincian_npd/".$id);
    } else {
      echo "<h1>GAGAL</h1>";
    }
  }

function update_rincian_npd()
  {
        
    $this->form_validation->set_rules('id_rincian_npd','id_rincian_npd','required');
        $id=$this->input->post('id_permintaan_anggaran');
    if($this->form_validation->run() === FALSE)
        redirect(base_url()."kasubbag/rincian_npd/".$id);
    else
    {
      $total=$this->db->query("Select sum(pencairan) as total from rincian_npd where id_permintaan_anggaran='$id'")->row()->total;
      $sql11 = "update permintaan_anggaran set total=$total where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
      $this->m_umum->update_data("rincian_npd");
       $notif = " Data berhasil diupdate";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url()."kasubbag/rincian_npd/".$id);
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
        redirect(base_url()."kasubbag/rincian_npd/".$id_rek);
        
}
    function permintaan_anggaran()
    {
        $data = array(
            'judul' => 'Data Permintaan Anggaran',
            'dt_permintaan_anggaran' => $this->m_umum->get_permintaan_anggaran(),
            'dt_rek_05' => $this->m_umum->get_data('rek_05'),
            'dt_program' => $this->m_umum->get_data('program'),
            'dt_kegiatan' => $this->m_umum->get_data('kegiatan'),
            'dt_sub_kegiatan' => $this->m_umum->get_data('sub_kegiatan'),
            'dt_jenis_npd' => $this->m_umum->get_data('jenis_npd'),
            

        );
        $this->template->load('kasubbag/template', 'kasubbag/permintaan_anggaran', $data);
    }
    function tambah_permintaan_anggaran()
     {
$id=$this->session->userdata('ses_id');
$tahun=$this->session->userdata('tahun');
        $file = $this->uploadFile();
        $this->form_validation->set_rules('program', 'program', 'required');

        if ($this->form_validation->run() === FALSE)
            redirect('kasubbag/permintaan_anggaran');
        else {
  $this->db->set('id_permintaan_anggaran', 'UUID()', FALSE);
  $this->db->set('id_akun',$id);
  $this->db->set('tahun_anggaran',$tahun);
  $this->db->set('file',$file);
            $this->m_umum->set_data("permintaan_anggaran");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('kasubbag/permintaan_anggaran');
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
      redirect('kasubbag/permintaan_anggaran');
    } else {
      echo "<h1>GAGAL</h1>";
    }
  }
    function delete_permintaan_anggaran($id)
    {

        $this->m_umum->hapus('permintaan_anggaran', 'id_permintaan_anggaran', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('kasubbag/permintaan_anggaran');
    }
   public function get_rek_06() {
  $id_rek_05 = $this->input->post('id_rek_05');
  $rek_06 = $this->db->get_where('rek_06', ['id_rek_05' => $id_rek_05])->result();

  echo '<option value="">Pilih Rek 06</option>';
  foreach ($rek_06 as $k) {
    echo '<option value="'.$k->id_rek_06.'">'.$k->nama_rek_06.'</option>';
  }
}
  public function get_kegiatan() {
  $id_program = $this->input->post('id_program');
  $kegiatan = $this->db->get_where('kegiatan', ['id_program' => $id_program])->result();

  echo '<option value="">Pilih Kegiatan</option>';
  foreach ($kegiatan as $kg) {
    echo '<option value="'.$kg->id_kegiatan.'">'.$kg->kode_kegiatan.''.$kg->nama_kegiatan.'</option>';
  }
}
public function get_sub_kegiatan() {
  $id_kegiatan = $this->input->post('id_kegiatan');
  $sub_kegiatan = $this->db->get_where('sub_kegiatan', ['id_kegiatan' => $id_kegiatan])->result();

  echo '<option value="">Pilih Sub Kegiatan</option>';
  foreach ($sub_kegiatan as $sk) {
    echo '<option value="'.$sk->id_sub_kegiatan.'">'.$sk->kode_sub_kegiatan.''.$sk->nama_sub_kegiatan.'</option>';
  }
}
 function kirim_permintaan_anggaran($id)
    {
$sql11 = "update permintaan_anggaran set status_permintaan=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "Permintaan berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('kasubbag/permintaan_anggaran');
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



  }