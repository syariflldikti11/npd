<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kpa extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
       $this->load->library('uuid'); // Memuat library UUID
    if($this->session->userdata('akses') <> 3){
        redirect(base_url('login'));
        }
  }
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
           
            

        );
         
        $this->template->load('kpa/template', 'kpa/home', $data);
    }
 function permintaan_anggaran()
    {
        $data = array(
            'judul' => 'Data permintaan_anggaran',
            'dt_permintaan_anggaran' => $this->m_umum->get_permintaan_anggaran_pptk(),
      
            

        );
        $this->template->load('kpa/template', 'kpa/permintaan_anggaran', $data);
    }

        function npd()
    {
        $data = array(
            'judul' => 'Data NPD',
            'dt_npd' => $this->m_umum->get_npd_pptk(),
      
            

        );
        $this->template->load('kpa/template', 'kpa/npd', $data);
    }
    function kirim_npd($id)
    {
$sql11 = "update permintaan_anggaran set status_npd=1, status_pptk=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "NPD berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('kpa/npd');
        }
          function validasi_npd()
    {
         $id_permintaan_anggaran=$this->input->post('id_permintaan_anggaran');
         $status=$this->input->post('status');
                $catatan_npd=$this->input->post('catatan_npd');
         if($status==1){
         $sql11 = "update permintaan_anggaran set status_kpa=2, status_ppkeu=1 where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11);        }
         else{
              $sql11 = "update permintaan_anggaran set status_kpa=3, status_npd=0,status_pptk=0, catatan_npd='$catatan_npd' where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11); 
         }       
            $notif = "NPD berhasil divalidasi";
            $this->session->set_flashdata('update', $notif);
            redirect('kpa/npd');
        }
               function validasi_permintaan_anggaran()
    {
         $id_permintaan_anggaran=$this->input->post('id_permintaan_anggaran');
         $status=$this->input->post('status');
         $catatan=$this->input->post('catatan');
         
         $sql11 = "update permintaan_anggaran set status_permintaan=$status, catatan='$catatan' where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11);       
        
        
             
            $notif = "Permintaan Anggaran berhasil divalidasi";
            $this->session->set_flashdata('update', $notif);
            redirect('kpa/permintaan_anggaran');
        }
     function rincian_npd($id)
    {

        $data = array(
            'judul' => 'Data Rincian NPD',
            'id' => $id,
            'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
        );
        $this->template->load('kpa/template', 'kpa/rincian_npd', $data);
    }
  



  }