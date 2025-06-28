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
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
           
            

        );
         
        $this->template->load('kasubbag/template', 'kasubbag/home', $data);
    }
    function permintaan_anggaran()
    {
        $data = array(
            'judul' => 'Data Permintaan Anggaran',
            'dt_permintaan_anggaran' => $this->m_umum->get_permintaan_anggaran(),
            'dt_rek_05' => $this->m_umum->get_data('rek_05'),
            

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



  }