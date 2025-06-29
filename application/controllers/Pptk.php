<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pptk extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
       $this->load->library('uuid'); // Memuat library UUID
    if($this->session->userdata('akses') <> 6){
        redirect(base_url('login'));
        }
  }
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
           
            

        );
         
        $this->template->load('pptk/template', 'pptk/home', $data);
    }

        function npd()
    {
        $data = array(
            'judul' => 'Data NPD',
            'dt_npd' => $this->m_umum->get_npd_pptk(),
      
            

        );
        $this->template->load('pptk/template', 'pptk/npd', $data);
    }
    function kirim_npd($id)
    {
$sql11 = "update permintaan_anggaran set status_npd=1, status_pptk=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "NPD berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('pptk/npd');
        }
     function rincian_npd($id)
    {

        $data = array(
            'judul' => 'Data Rincian NPD',
            'id' => $id,
            'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
        );
        $this->template->load('pptk/template', 'pptk/rincian_npd', $data);
    }
  



  }